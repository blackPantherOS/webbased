<?php
function ErrorImage ($text) {
	global $maxw;
	$len = strlen ($text);
	if ($maxw < 154) $errw = 154;
	$errh = 30;
	$chrlen = intval (5.9 * $len);
	$offset = intval (($errw - $chrlen) / 2);
	$im = imagecreate ($errw, $errh);    	/* Create a blank image */
	$bgc = imagecolorallocate ($im, 153, 63, 63);
	$tc = imagecolorallocate ($im, 255, 255, 255);
	imagefilledrectangle ($im, 0, 0, $errw, $errh, $bgc);
	imagestring ($im, 2, $offset, 7, $text, $tc);
	header ("Content-type: image/jpeg");
	imagejpeg ($im);
	imagedestroy ($im);
	exit;
}
 function thumbnail ($gdver, $src, $maxw=190) {
	$gdarr = array (1,2);
	for ($i=0; $i<count($gdarr); $i++) {
		if ($gdver != $gdarr[$i]) $test.="|";
	}
	$exp = explode ("|", $test);
	if (count ($exp) == 4) {
		ErrorImage ("Incorrect GD version!");
	}
	if (!function_exists ("imagecreate") || !function_exists ("imagecreatetruecolor")) {
		ErrorImage ("No image create functions!");
	}
	$size = @getimagesize ($src);

	if (!$size) {
		ErrorImage ("Play");	
 
	} else {
			if ($size[0] > $maxw) {
			$newx = intval ($maxw);
			$newy = intval ($size[1] * ($maxw / $size[0]));
		} else {
			$newx = $size[0];
			$newy = $size[1];
		}
		if ($gdver == 1) {
			$destimg = imagecreate ($newx, $newy );
		} else {
			$destimg = @imagecreatetruecolor ($newx, $newy ) or die (ErrorImage ("Cannot use GD2 here!"));
		}
			if ($size[2] == 1) {
			if (!function_exists ("imagecreatefromgif")) {
				ErrorImage ("Cannot Handle GIF Format!");
			} else {
				$sourceimg = imagecreatefromgif ($src);

				if ($gdver == 1)
					imagecopyresized ($destimg, $sourceimg, 0,0,0,0, $newx, $newy, $size[0], $size[1]);
				else
					@imagecopyresampled ($destimg, $sourceimg, 0,0,0,0, $newx, $newy, $size[0], $size[1]) or die (ErrorImage ("Cannot use GD2 here!"));
				header ("Content-type: image/gif");
				imagegif ($destimg);
			}
		}
		elseif ($size[2]==2) {
			$sourceimg = imagecreatefromjpeg ($src);
			if ($gdver == 1)
				imagecopyresized ($destimg, $sourceimg, 0,0,0,0, $newx, $newy, $size[0], $size[1]);
			else
				@imagecopyresampled ($destimg, $sourceimg, 0,0,0,0, $newx, $newy, $size[0], $size[1]) or die (ErrorImage ("Cannot use GD2 here!"));
			header ("Content-type: image/jpeg");
			imagejpeg ($destimg,"",70);
		}
		elseif ($size[2] == 3) {
			$sourceimg = imagecreatefrompng ($src);
			if ($gdver == 1)
				imagecopyresized ($destimg, $sourceimg, 0,0,0,0, $newx, $newy, $size[0], $size[1]);
			else
				@imagecopyresampled ($destimg, $sourceimg, 0,0,0,0, $newx, $newy, $size[0], $size[1]) or die (ErrorImage ("Cannot use GD2 here!"));
			header ("content-type: image/png");
			imagepng ($destimg);
		}
		else {
			ErrorImage ("Image Type Not Handled!");
		}
	}
	imagedestroy ($destimg);
	imagedestroy ($sourceimg);
}
thumbnail ($_GET["gd"], $_GET["src"], $_GET["maxw"]);

?>
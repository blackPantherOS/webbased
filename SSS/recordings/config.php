<?php// these settings only take effect on the main page
$homepage = "";
// your homepage link
$homepage_title = "<a href=\"../index.php\"><img src=\"../pics/undo.jpg\" border=\"1\" width=\"20\"> Kezd�lap</a> | - Felv�telek b�ng�sz�se... -";
$width = 100; //width of thumbnails on index page
//oldalank�nti kisk�pek sz�ma
$maxi = 26;
// you shoulnd't have to change anything below this line
$index_columns = 6;
//oldalank�nti oszlopok sz�ma
$oszlop = 9;
$dir = getcwd();
if ($handle = opendir($dir)) {
   while (false !== ($file = readdir($handle))) {
          if (is_dir($file) && $file != "." && $file != ".." && $file != ID_images) {
	         	if (is_dir($handle."/".$file));
					$galleries[] = $file;
     }
 }
 closedir($handle);
	}
	sort($galleries);
	$directories = $galleries;
?>

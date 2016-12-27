<?php
function fType($file) {
    $varFileType = filetype($file);
    if($varFileType != "dir") {
        $curdir = $_GET[gal]; 
        $pInfo = pathinfo("$curdir/$file");
//        $varFileType = $pInfo["extension"];
        $varFileType = $pInfo["jpg"];
    }
    return $varFileType;
}
chdir("$_GET[gal]");
    $handle=opendir(".");
    $content = "";
//        while (false!=($file = readdir($handle))) {
     while ($file = readdir($handle)) {
            $filetype = fType($file);
            if($filetype == "dir") {
                $dirtext[] = "$file";
            } else {
                $context[] = "$file";
				$path[] = getcwd();
            }
        }
	sort($context);
	$array_keys = array_keys($context);
	$prev = $array_keys[--$_GET[image_number]];
	$next = $array_keys[++$_GET[image_number]];
	$prev_image = $context[$prev];
	$next_image = $context[++$next];
	$count = count($context);
?>	
<html>
<head>
<link rel="stylesheet" type="text/css" href="gallery.css">
</head>
<body>
<div class="container-wrapper"> 
  <div class="container"> 
    <div class="script"> 
      <?php         	
		$imgsize=getimagesize ("$_GET[image_name]");
		if ($imgsize[0]>600){
		$new_width= "600";
		}else{
		$new_width = "$imgsize[0]";
		}
		$height = $imgsize[1] - 26; 
		echo "<table border=\"0\" align=\"center\" width=\"200\"><tr>";
		if ($_GET[image_number]==0) {
		echo "<td align=\"left\" width=\"%33\">&nbsp;</td>";
		}else{
		$y = ($_GET[image_number]-1);
		echo "<td align=\"left\" width=\"%33\"><a href=\"$PHP_SELF?gal=$_GET[gal]&page=$_GET[page]&image_name=" . $prev_image . "&image_number=$y\"><img src=\"ID_images/previous.png\" border=\"0\"></a></td>";
		}
		echo "<td align=\"center\" width=\"%33\"><a href=\"index_script.php?gal=$_GET[gal]&page=$_GET[page]\">back</a></td>";
		if ($next==$count) {
		echo "<td align=\"right\" width=\"%33\">&nbsp;</td>";
		}else{
		$y = ($_GET[image_number]+1);
		echo "<td align=\"right\" width=\"%33\"><a href=\"$PHP_SELF?gal=$_GET[gal]&page=$_GET[page]&image_name=" . $next_image . "&image_number=$y\"><img src=\"ID_images/next.png\" border=\"0\"></a></td>";
		}
		echo "</tr></table><br><table border=\"0\" align=\"center\" width=\"$new_width\">
		<tr>
        <td class=\"image-shadow\"><img src=\"thumb.php?gd=2&src=$_GET[gal]/$_GET[image_name]&maxw=$new_width\" border=\"0\"></td>
		</tr></table>"; ?><br>
      <u>Kép/Fájl Neve</u> : <?php echo "$_GET[image_name]"; ?> <br>
      <u>Létrehozási idõ</u> : 
      <?php $lastmod = date ("F d Y", filemtime("$_GET[image_name]")); echo "$lastmod"; ?>
	  <br><br>
	  <a href="<?php echo "$_GET[gal]/$_GET[image_name]"; ?>"><img src="ID_images/download.png" border="0"></a>
      </div>
  </div>
</div>
</div>
</body>
</html>

<?php
include "config.php";
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="gallery.css">
</head>
<body>
<div class="container-wrapper"> 
  <div class="container"> 
     <table>
        <tr> 
	    <td> <div class="script-row"> 
		              <?php
function getRandomImage($dir,$type='random')
			      {
global $errors,$seed;

  if (is_dir($dir)) {  
			      
			        $fd = opendir($dir);  
  
				$images = array();

				      while (($part = @readdir($fd)) == true) {  

				                if ( eregi("(gif|jpg|png|jpeg)$",$part) ) {
						              $images[] = $part;
							                }
									      }

  // adding this in case you want to return the image array
    
									      if ($type == 'all') return $images;

									          if ($seed !== true) {
										        mt_srand ((double) microtime() * 1000000);
											     $seed = true;
											    }
												
												$key = mt_rand (0,sizeof($images)-1);

    return $images[$key];

  } else {
      $errors[] = $dir.' is not a directory';
      return false;
  }
}
echo "<div class=\"nav\"><a href=\"../index.php\"><img src=\"../pics/undo.jpg\" border=\"1\" width=\"20\"> Kezdõlap</a> -  <a href=\"medias.php\">| Kamera mappák |</a> - <a href=\"index_script.php?gal=$_GET[gal]&page=$_GET[page]\">$_GET[gal]</a>  $_GET[subgal]</div>";

$directory="$gal";
function fType($file) {
    $varFileType = filetype($file);
    if($varFileType != "dir") {
        $curdir = $gal; 
        $pInfo = pathinfo("$curdir/$file");
        $varFileType = $pInfo["extension"];
//        $varFileType = $pInfo["jpg"];
    }
    return $varFileType;
}

chdir("$_GET[gal]/$_GET[subgal]");
function dirGather() {
        $handle=opendir(".");
    $content = "";
        //while (false!=($file = readdir($handle))) {
     while ($file = readdir($handle)) {
	                 if(($file != ".DS_store") && ($file != "error_log") && ($file != ".") && ($file != "..") && ($file != "Thumbs.db") && ($file != "thumbs.db")) {
            $filetype = fType($file);
            if($filetype == "dir") {
                $dirtext[] = "$file";
			} else {
                $context[] = "$file";
				$path[] = getcwd();
            }
        }
		}
$limit = 44;
$mywidth = 60; //  width
$dir_count = count($dirtext);
$columns = $oszlop; // # of columns
if(empty($_GET[page])) {
$page = 1;
$start = $page * $limit - ($limit);
$stop = $page * $limit;
}else{
$page="$_GET[page]";
$start = ($page * $limit - ($limit)) + ($page - 1);
$stop = ($page * $limit) + ($page - 1); 
if (is_null($dirtext)){
}else{
echo "Subdirectories<br>";
echo "<ul class=\"script-row\">"; //begin list
$i=0; 
    for ($x=$start; $x <=$stop; $x++){ // start output
	echo "<li class=\"subgal\">";
	    if ($dirtext[$x]){ 
	sort($dirtext);
	$image = getRandomImage($dirtext[$x]);
	
	$lastmod = date ("F d Y", filemtime($dirtext[$x] . "/" . $image));
	$current_image = $image;
	$prev_image = $dirtext[$x-1];
	$next_image = $dirtext[$x+1];
        $imgsize=getimagesize ($dirtext[$x]	. "/" . $image);
        $imgheight=($imgsize[1]+25);
        $imgwidth=($imgsize[0]+20);
		$ratio = $imgsize[0]/$mywidth;
		$width = $mywidth - 26;
		$heightfloat = $imgsize[1] /= $ratio;
		$height = floor($heightfloat) - 26;

		echo "<a href=\"index_script.php?gal=$_GET[gal]&subgal=$dirtext[$x]&page=$_GET[page]&image_name=$image&origWidth=$imgsize[0]&image_number=$x\"><img src=\"ID_images/folder.png\" border=\"0\"></a><br>$dirtext[$x]";
		}
		echo "</li>";
    ++$i; // end output
        if($i == $columns) { // end row
        print "</ul><ul class=\"script-row\">\n"; 
        $i = 0; 
        }
    }
echo "</ul>"; // end list";
}
$count = count($context);
}
echo "<ul class=\"script-row\">"; //begin list
$i=0; 
    for ($x=$start; $x <=$stop; $x++){ // start output
	echo "<li class=\"img-shadow\">";
	    if ($context[$x]){ 
	sort($context);
	$lastmod = date ("F d Y", filemtime($context[$x]));
	$current_image = $context[$x];
	$prev_image = $context[$x-1];
	$next_image = $context[$x+1];
        $imgsize=getimagesize ("$context[$x]");
        $imgheight=($imgsize[1]+25);
        $imgwidth=($imgsize[0]+20);
		$ratio = $imgsize[0]/$mywidth;
		$width = $mywidth - 26;
//avi filter
	if($file == ".avi")
		$heightfloat = $imgsize[1] /= $ratio;
	else
		$height = floor($heightfloat) - 26;
		echo "<a href=\"image.php?gal=$_GET[gal]&subgal=$_GET[subgal]&page=$_GET[page]&image_name=$context[$x]&origWidth=$imgsize[0]&image_number=$x\"><img src=\"thumbnail.php?gd=2&src=$path[$x]/$context[$x]&maxw=$mywidth\"></a>";
		}
		echo "</li>";
    ++$i; // end output
        if($i == $columns) { // end row
        print "</ul><ul class=\"script-row\">\n"; 
        $i = 0; 
        }
    }
echo "</ul>"; // end list
echo "<div class=\"prevnext\">Page: ";
// NEXT
$count = count($context);
$numofpages = $count / ($limit + 1);
for($i = 1; $i < $numofpages; $i++){
if($i == $_GET[page])
echo("<div class=\"prevnextcurrent\">$i</div>");
else
echo("<div class=\"prevnext\"><a href=\"$PHP_SELF?page=$i&gal=$_GET[gal]\">$i</a></div>");
} // This ends the for loop

if(($count % $limit) != 0){
if($i == $_GET[page])
echo("<div class=\"prevnextcurrent\">$i</div>");
else
echo("<div class=\"prevnext\"><a href=\"$PHP_SELF?page=$i&gal=$_GET[gal]\">$i</a></div>");
}
}
print dirGather();
?>
        </td>
      </tr>
    </table>
  </div>
</div>
<?php 
if ($_GET[gal]==uploaded) {
echo "<div class=\"footer\"><a href=\"upload.php\">Upload your Photos!</a></div>";
}
?>
<br>
 </body>
</html>

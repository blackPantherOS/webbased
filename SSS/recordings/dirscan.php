<?php
function dirscan ($dir) {
if ($handle = opendir($dir)) {
   while (false !== ($file = readdir($handle))) {
//       if ($file != "*.jpg" && $file != "..") {
       if ($file != "." && $file != "..") {
          $countfiles = count($handle);
	  echo "$countfiles";
       }
   }
   closedir($handle);
}
}
?>

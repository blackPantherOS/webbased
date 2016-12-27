<?php
include "config.php";
$dir_count = count($directories)-1;
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="gallery.css">
</head>
<body>
<div class="container-wrapper" > 
  <div class="container"> 
    <table class="tables">
      <tr align="left"> 
        <td width="780px">
	<div class="nav">
	. <a href="<?php echo"$homepage"; ?>"><?php echo"$homepage_title"; ?></a>
	</div>
	</td>
      <tr align="center">
        <td><table>
            <?php 
	
	echo "<tr class=\"index-row\">";
	$i=0; 
	  for ($x=0; $x <=$dir_count; $x++){
	  if ($directories[$x]){  
	  echo "
        <td align=\"center\"><table><tr><td class=\"subgal\"><a href=\"index_script.php?gal=$directories[$x]&page=1\"><img src=\"ID_images/folder.png\" border=\"0\"></a></td></tr><tr><td align=\"center\">$directories[$x]</td></tr></table></td>\n";
		}
	++$i;
	    if($i == $index_columns) { // end row
        print "</tr><tr class=\"index-row\">\n"; 
        $i = 0; 
        }
}
echo "</tr>";
	?>
          </table></td>
      </tr></td></tr>
    </table>
  </div>
</div>
<br>
</body>
</html>
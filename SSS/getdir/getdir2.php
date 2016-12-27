<?php
 include ('../setup.inc');
?>
<head>
 <title>Camera 2</title>
 <link rel=stylesheet type="text/css" href="/~<?php echo "$user_dir";?>/styles/gen_styles.css">
 <META HTTP-EQUIV="refresh" CONTENT="60">
</head>
<body>
<center><h4>Recordings</h4></center>
<?
$the_array = Array();
$handle = opendir('../recordings/Kamera-2/.');
while (false !== ($file = readdir($handle))) {
   if ($file != "." && $file != "..") {
   $the_array[] = $file;
   }
}
closedir($handle);
sort ($the_array);
reset ($the_array);
while (list ($key, $val) = each ($the_array)) {
   echo "<a href=/~$user_dir/recordings/Kamera-2/$num/$val target=view>$val</a><br>";
}
?>
</body>

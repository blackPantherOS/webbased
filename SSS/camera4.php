<?php
 include ('./setup.inc');
?>
<html>
<head>
 <title><?php echo "$title";?></title>
 <link rel=stylesheet type="text/css" href="/~<?php echo "$user_dir";?>/styles/gen_styles.css"> 
</head>
<frameset border="0" cols="175px,70%">
 <frame src="/~<?php echo "$user_dir";?>/getdir/getdir4.php" name="files"/>
 <frame src="/~<?php echo "$user_dir";?>/live/camera4.php" name="view"/>
</frameset>
</html>

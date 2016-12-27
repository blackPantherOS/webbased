<?php
 include ('./setup.inc');
?>
<html>
<head>
 <title><?php echo "$title";?></title>
 <link rel=stylesheet type="text/css" href="/~<?php echo "$user_dir";?>/styles/gen_styles.css">
</head>
<frameset border="0" cols="175px,500px,20%">
 <frame src="/~<?php echo "$user_dir";?>/getdir/getdir1.php" name="files"/>
 <frame src="/~<?php echo "$user_dir";?>/live/options.php" name="view"/>
 <frame src="/~<?php echo "$user_dir";?>/api/api0.php" name="api"/>
</frameset>
</html>

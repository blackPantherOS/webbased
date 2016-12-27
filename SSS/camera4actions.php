<?php
 include ('./setup.inc');
?>
<html>
<head>
 <title><?php echo "$title";?></title>
 <link rel=stylesheet type="text/css" href="/~<?php echo "$user_dir";?>/styles/gen_styles.css">
</head>
<frameset border="0" cols="170px,60%,20%">
 <frame src="/~<?php echo "$user_dir";?>/getdir/getdir4.php" name="files"/>
 <frame src="/~<?php echo "$user_dir";?>/live/camera4actions.php" name="view"/>
 <frame src="/~<?php echo "$user_dir";?>/api/api4actions.php" name="api"/>
</frameset>
</html>

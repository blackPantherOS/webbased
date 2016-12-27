<?php
 include ('./setup.inc');
?>
<html>
<head>
 <title><?php echo "$title";?></title>
 <link rel=stylesheet type="text/css" href="/~<?php echo "$user_dir";?>/styles/gen_styles.css">
</head>
<frameset border="1" cols="0%,60%,0%,0%">
 <frame src="/~<?php echo "$user_dir";?>/blank.php" name="files"/>
 <frame src="/~<?php echo "$user_dir";?>/live/quad.php" name="view"/>
 <frame src="/~<?php echo "$user_dir";?>/api/api0.php" name="api"/>
 <frame src="/~<?php echo "$user_dir";?>/blank.php" name="null"/>
</frameset>
</html>

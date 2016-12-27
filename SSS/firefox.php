<?php
 include ('./setup.inc');
?>
<html>
<head>
 <title><?php echo "$title";?></title>
 <link rel=stylesheet type="text/css" href="/~<?php echo "$user_dir";?>/styles/gen_styles.css">
</head>
 
<frameset border="1" rows="20%,80%">
 <frame src="/~<?php echo "$user_dir";?>/control/control.php" name="control"/>
 <frame src="/~<?php echo "$user_dir";?>/blank.php" name="main"/>
</frameset>

</html>

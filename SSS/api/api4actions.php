<?php
 include ('../setup.inc');
?>
<html>
<head>
 <title>M�veletek</title>
 <link rel=stylesheet type="text/css" href="/~<?php echo "$user_dir";?>/styles/gen_styles.css">
</head>
<body>
<h4>M�veletek</h4>
 <a href="<?php echo "$motion_web"; ?>index.php"><img src="../pics/undo.jpg" border="0" ><br>Kezd�lap</a><br><br>
 <a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/0/action/makemovie " target="null">
 <img src="../pics/makemovie.jpg" border="0" ><br>Mozi K�sz�t�se</a><br><br>
 <a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/0/action/snapshot" target="null">
 <img src="../pics/makepics.jpg" border="0"><br>Fot� K�sz�t�se</a>
</body>
</html>

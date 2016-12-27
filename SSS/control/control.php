<?php
 include ('../setup.inc');
?>
<html>
<head>
 <title><?php echo "$title";?></title>
 <link rel=stylesheet type="text/css" href="/~<?php echo "$user_dir";?>/styles/gen_styles.css">
</head>
<body>
 <table border cellspacing="0" cellpadding="1">
 <tr><td rowspan="4"align="center"><a href="<?php echo "$motion_web"; ?>" target="main"><img src="/~<?php echo "$user_dir";?>/pics/logo.png"></a></td>
  <td colspan="2" align="center"><h4>Vezérlés</td>
  <td rowspan="4"align="center"><a href="<?php echo "$your_web";?>start.php" target="_main"><h2><?php echo "$title";?></h2></a>
 </tr><tr>
 <td align="center"><a href="/~<?php echo "$user_dir";?>/camera1.php" target="main">1</a></td>
 <td align="center"><a href="/~<?php echo "$user_dir";?>/camera2.php" target="main">2</a></td>
 </tr><tr>
 <td align="center"><a href="/~<?php echo "$user_dir";?>/camera3.php" target="main">3</a></td>
 <td align="center"><a href="/~<?php echo "$user_dir";?>/camera4.php" target="main">4</a></td>
 </tr><tr>
 <td colspan="2"align="center"><a href="/~<?php echo "$user_dir";?>/quad.php" target="main">Quad</a>|<a href="/~<?php echo "$user_dir";?>/dual.php" target="main">Dual</a></td>
 </tr>
 </table>
</body>
</html>

<?php
 include ('../setup.inc');
?>
<html>
<head>
 <title>Options</title>
 <link rel=stylesheet type="text/css" href="/~<?php echo "$user_dir";?>/styles/gen_styles.css">
</head>
<body>
<a href="../index.php"><img src="../pics/undo.jpg" border="0" width="20"> Kezd�lap</a>
<h4>Options</h4>
 <li><a href="/~<?php echo "$user_dir";?>/live/camera2.php" target="view">Refresh Video</a></li>
 <li><a href="/~<?php echo "$user_dir";?>/getdir/getdir2.php" target="files">Refresh Recordings</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/2/config/list "  target="view">List Configuration</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/2/config/get " target="view">Get Configuration</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/2/config/set " target="view">Set Configuration</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/2/config/write " target="view">Write Configuration</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/2/action/restart " target="view">Restart</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/2/action/quit " target="view">Quit</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/2/detection/status " target="view">Detection Status</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/2/detection/start " target="view">Start Detection</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/2/detection/pause " target="view">Pause Detection</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/2/track/auto  " target="view">Auto Tracking Set</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/2/track/set " target="view">Tracking Set</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/2/track/pan " target="view">Tracking Pan</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/2/track/tilt " target="view">Tracking Tilt</a></li>
</body>
</html>

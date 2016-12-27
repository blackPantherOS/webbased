<?php
 include ('../setup.inc');
?>
<html>
<head>
 <title>Options</title>
 <link rel=stylesheet type="text/css" href="/~<?php echo "$user_dir";?>/styles/gen_styles.css">
</head>
<body>
<h4>Options</h4>
 <li><a href="/~<?php echo "$user_dir";?>/live/camera4.php" target="view">Refresh Video</a></li>
 <li><a href="/~<?php echo "$user_dir";?>/getdir/getdir4.php" target="files">Refresh Recordings</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/4/config/list "  target="view">List Configuration</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/4/config/get " target="view">Get Configuration</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/4/config/set " target="view">Set Configuration</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/4/config/write " target="view">Write Configuration</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/4/action/restart " target="view">Restart</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/4/action/quit " target="view"">Quit</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/4/detection/status " target="view">Detection Status</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/4/detection/start " target="view">Start Detection</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/4/detection/pause " target="view">Pause Detection</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/4/track/auto  " target="view">Auto Tracking Set</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/4/track/set " target="view">Tracking Set</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/4/track/pan " target="view">Tracking Pan</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/4/track/tilt " target="view">Tracking Tilt</a></li>
</body>
</html>

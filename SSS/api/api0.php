<?php
 include ('../setup.inc');
?>
<html>
<head>
 <title>Options</title>
 <link rel=stylesheet type="text/css" href="/~<?php echo "$user_dir";?>/styles/gen_styles.css">
</head>
<body>
<a href="../index.php"><img src="../pics/undo.jpg" border="0" width="20"> Kezd�lap</a><h4>Options</h4>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/0/config/list "  target="view">List Configuration</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/0/config/get " target="view">Get Configuration</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/0/config/set " target="view">Set Configuration</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/0/config/write " target="view">Write Configuration</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/0/action/makemovie " target="null">Make movie</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/0/action/snapshot " target="null">Snapshot</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/0/action/restart " target="null">Restart</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/0/action/quit " target="view">Quit</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/0/detection/status " target="view">Detection Status</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/0/detection/start " target="view">Start Detection</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/0/detection/pause " target="view">Pause Detection</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/0/track/auto  " target="view">Auto Tracking Set</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/0/track/set " target="view">Tracking Set</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/0/track/pan " target="view">Tracking Pan</a></li>
 <li><a href="http://<?php echo $addr; ?>:<?php echo "$control";?>/0/track/tilt " target="view">Tracking Tilt</a></li>
</body>
</html>

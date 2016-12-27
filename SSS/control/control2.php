<?php
 include ('../setup.inc');
?>
<html>
<head>
 <title><?php echo "$title";?></title>
 <link rel=stylesheet type="text/css" href="/~<?php echo "$user_dir";?>/styles/control.css">
</head>
<body>
<script>
function hidestatus(){
window.status=''
return true
}

if (document.layers)
document.captureEvents(Event.MOUSEOVER | Event.MOUSEOUT)

document.onmouseover=hidestatus
document.onmouseout=hidestatus
</script>		
<table class="header" style="text-align: center;  width: 55px;" border="0">
    <tr>
      <td><img style="width: 250px; height: 90px;" alt="Startpage"
 title="Kezdõoldal" src="../pics/hleft.jpg"><br>
      </td>
      <td><a href="/~<?php echo "$user_dir";?>/camera1.php" target="mframe"><img style="width: 64px; height: 64px;" border="0" alt="Kamera 1"
 title="(1.) Kamera megjelen&iacute;t&eacute;se" src="../pics/camera.jpg"><br>Kamera<br></a>
      </td>
      <td><a href="/~<?php echo "$user_dir";?>/camera2.php" target="mframe"><img style="width: 64px; height: 64px;" border="0" alt="Kamera 1"
 title="(2.) Kamera megjelen&iacute;t&eacute;se" src="../pics/camera.jpg"><br>
Kamera</a><br>
      </td>
      <td><a href="/~<?php echo "$user_dir";?>/camera3.php" target="mframe"><img style="width: 64px; height: 64px;" border="0" alt="Kamera 1"
 title="(3.) Kamera megjelen&iacute;t&eacute;se" src="../pics/camera.jpg">
 Kamera</a><br>
      </td>
      <td><a href="/~<?php echo "$user_dir";?>/camera4.php" target="mframe"><img style="width: 64px; height: 64px;" border="0" alt="Kamera 1"
 title="(4.) Kamera megjelen&iacute;t&eacute;se" src="../pics/camera.jpg">
 Kamera</a><br>
      </td>
      <td><a href="/~<?php echo "$user_dir";?>/quad.php" target="mframe"><img style="width: 64px; height: 64px;" border="0" alt="All Kamera"
 title="Minden Kamera megjelen&iacute;t&eacute;se" src="../pics/cameras.jpg"><br>
 Quad</a>|
 <a href="/~<?php echo "$user_dir";?>/dual.php" target="mframe">
 Dual</a><br>
      </td>
      <td><img style="width: 64px; height: 64px;" alt="Lemezter&uuml;let"
 title="Merevlemez kapac&iacute;t&aacute;s" border="0" src="../pics/hdd.jpg"><br>
      </td>
      <td><a href="/~<?php echo "$user_dir";?>/options.php" target="mframe">
<img style="width: 64px; height: 64px;" alt="settings"
 title="Beállítások" border="0" src="../pics/configuration.jpg"></a><br>
      </td>
      <td class="hside"><br>
      </td>
      <td><img style="width: 44px; height: 90px;" alt=""
 src="../pics/hright.jpg"><br>
      </td>
    </tr>
</table>
</body>
</center>
</html>

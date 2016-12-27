<?php
 include ('../setup.inc');
$ip = $addr;
?>
<html>
<head>
 <title>Camera 1</title>
 <link rel=stylesheet type="text/css" href="/~<?php echo "$user_dir";?>/styles/gen_styles.css">
</head>
<body>
<a href="../index.php"><img src="../pics/undo.jpg" border="0" width="20"> Kezdõlap</a> | III. Kamera / Zóna
<br>
<table class="center" style="text-align: center; width: 600px; height: 363px;">
    <tr>
      <td colspan="1" rowspan="2"><br>
I.<br>
      </td>
<td class="applet" nowrap><applet code=com.charliemouse.cambozola.Viewer
	archive=/~motion/java/cambozola1.jar <? echo "$view_size" ?>>
	<param name=url value="http://<? echo "$ip" ?>:8083" />
	<param name="failureimage" value="../pics/offline.jpg" />
	<param name="accessories" value="ChangeStream,ZoomIn,ZoomOut,Pan"/>
</applet></td>
    </tr>
    <tr>
      <td class="center" >Zoom(+)/Zoom(-)
      <a href="/~<?php echo "$user_dir";?>/live/camera1.php" target="view">Ablak újratöltése</a>
<a href="/~<?php echo "$user_dir";?>/camera1actions.php" target="_parent">Mûveletek</a>
>
      </td>
    </tr>
  </tbody>
</table>
</body>
</html>

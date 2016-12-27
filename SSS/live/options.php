<?php
 include ('../setup.inc');
?>
<html>
<head>
 <title>Kamerák beállításai, kérem válasszon..</title>
 <link rel=stylesheet type="text/css" href="/~<?php echo "$user_dir";?>/styles/gen_styles.css">
 <META HTTP-EQUIV="refresh" CONTENT="300">
</head>
<body>
Kamerák beállításai, kérem válasszon..
<table class="center" style="text-align: center; width: 100%; height: 90%;">
<tr>
<td border=1 nowrap><applet code=com.charliemouse.cambozola.Viewer
	archive=/~motion/java/cambozola1.jar width=150 height=123>
        <param name=url value="http://<? echo "$ip" ?>:8081">
	<param name="failureimage" value="../pics/offline.jpg" />
	<param name="accessories" value="none"/>
</applet> <br>1.)<a href="../camera1options.php" target="mframe" >Kiválaszt</a>
</td>
<td border=1 nowrap><applet code=com.charliemouse.cambozola.Viewer
	archive=/~motion/java/cambozola2.jar width=150 height=123>
        <param name=url value="http://<? echo "$ip" ?>:8082">
	<param name="failureimage" value="../pics/offline.jpg" />
	<param name="accessories" value="none"/>
</applet><br>2.)<a href="../camera2options.php" target="mframe">Kiválaszt</a>
</td>
</tr>
<tr> 
<td border=1 nowrap><applet code=com.charliemouse.cambozola.Viewer
	archive=/~motion/java/cambozola3.jar width=150 height=123>
        <param name=url value="http://<? echo "$ip" ?>:8083">
	<param name="failureimage" value="../pics/offline.jpg" />
	<param name="accessories" value="none"/>
</applet><br>3.)<a href="../camera3options.php" target="mframe">Kiválaszt</a>
</td> 
<td class="applet" nowrap><applet code=com.charliemouse.cambozola.Viewer
	archive=/~motion/java/cambozola4.jar width=150 height=123>
	<param name=url value="http://<? echo "$ip" ?>:8084" />
	<param name="failureimage" value="../pics/offline.jpg" />
	<param name="accessories" value="none"/>
</applet><br>4.)<a href="../camera4options.php" target="mframe">Kiválaszt</a></td>
</tr>
    <tr>
      <td colspan="2" rowspan="1" class="center">Zoom(+)/Zoom(-)
<a href="/~<?php echo "$user_dir";?>/live/camera1.php" target="view">Refresh Video</a>
<a href="/~<?php echo "$user_dir";?>/camera1.php" target="_parent">Hide Options</a>
      </td>
    </tr>
  </tbody>
</table>
<br>
</body>
</html>
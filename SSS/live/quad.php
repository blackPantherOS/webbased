<?php
 include ('../setup.inc');
$ip = $addr;
//$ip = '127.0.0.1';

function getLoad()
{
	$uptime = shell_exec( 'uptime' );
	$load = '';
	if ( preg_match( '/load average: ([\d.]+)/', $uptime, $matches ) )
		$load = $matches[1];
	return( $load );
}

function getDiskPercent()
{
	$df = shell_exec( 'df ' );
	$space = -1;
	if ( preg_match( '/\s(\d+)%/ms', $df, $matches ) )
		$space = $matches[1];
	return( $space );
}

function getDiskBlocks()
{
	$df = shell_exec( 'df ');
	$space = -1;
	if ( preg_match( '/\s(\d+)\s+\d+\s+\d+%/ms', $df, $matches ) )
		$space = $matches[1];
	return( $space );
}


?>
<html>
<head>
  <title>Security Systems Black BOX</title>
 <link rel=stylesheet type="text/css" href="/~<?php echo "$user_dir";?>/styles/blank.css">
</head>
<body>
<table class="frame" style="width: 790px; height: 398px;">
  <tbody>
    <tr>
      <td class="blankleft" colspan="1" rowspan="2"><br>
      <br><img src=../pics/process.gif>
      <br>Pontos idõ:   <?= date( "H:i" ) ?>
      <br>Blokkok:   <?= getDiskBlocks() ?>
      <br>Lemezterület:  <?= getDiskPercent() ?>%
      <br>Betöltés:   <?= getLoad() ?>
      </td>
<td border=1 nowrap><applet code=com.charliemouse.cambozola.Viewer
	archive=/~motion/java/cambozola1.jar width=315 height=235>
        <param name=url value="http://<? echo "$ip" ?>:8081">
	<param name="failureimage" value="../pics/offline.jpg" />
	<param name="accessories" value="ChangeStream,ZoomIn,ZoomOut,Pan"/>
</applet></td> 
<td border=1 nowrap><applet code=com.charliemouse.cambozola.Viewer
	archive=/~motion/java/cambozola2.jar width=315 height=235>
        <param name=url value="http://<? echo "$ip" ?>:8082">
	<param name="failureimage" value="../pics/offline.jpg" />
	<param name="accessories" value="ChangeStream,ZoomIn,ZoomOut,Pan"/>
</applet></td>
</tr><tr> 
<td border=1 nowrap><applet code=com.charliemouse.cambozola.Viewer
	archive=/~motion/java/cambozola3.jar width=315 height=235>
        <param name=url value="http://<? echo "$ip" ?>:8083">
	<param name="failureimage" value="../pics/offline.jpg" />
	<param name="accessories" value="ChangeStream,ZoomIn,ZoomOut,Pan"/>
</applet></td> 
<td class="applet" nowrap><applet code=com.charliemouse.cambozola.Viewer
	archive=/~motion/java/cambozola4.jar width=315 height=235>
	<param name=url value="http://<? echo "$ip" ?>:8084" />
	<param name="failureimage" value="../pics/offline.jpg" />
	<param name="accessories" value="ChangeStream,ZoomIn,ZoomOut,Pan"/>
</applet></td></tr> 
    <tr>
      <td class="lfooter"><br>
      </td>
      <td colspan="2" rowspan="1" class="footer" border="1">
      &copy; blackPanther OS Magyarország Kft.<br>
      </td>
    </tr>
      </tbody>
</table>
</body>
</html>

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
    <tr>
      <td class="blankleft" colspan="1" rowspan="4"><br>
      <br>
      <br><img src=../pics/process.gif>
      <br>Pontos idõ:   <?= date( "H:i" ) ?>
      <br>Blokkok:   <?= getDiskBlocks() ?>
      <br>Lemezterület:  <?= getDiskPercent() ?>%
      <br>Betöltés:   <?= getLoad() ?>
      </td>
<td border=1 nowrap><applet code=com.charliemouse.cambozola.Viewer
	archive=/~motion/java/cambozola3.jar width=315 height=235>
        <param name=url value="http://<? echo "$ip" ?>:8083">
	<param name="failureimage" value="../pics/offline.jpg" />
	<param name="accessories" value="ChangeStream,ZoomIn,ZoomOut,Pan"/>
</applet></td> 
<td border=1 nowrap><applet code=com.charliemouse.cambozola.Viewer
	archive=/~motion/java/cambozola4.jar width=315 height=235>
        <param name=url value="http://<? echo "$ip" ?>:8084">
	<param name="failureimage" value="../pics/offline.jpg" />
	<param name="accessories" value="ChangeStream,ZoomIn,ZoomOut,Pan"/>
	</applet><br>
      </td>
    </tr>
    <tr>
    </tr>
    <tr>
      <td align="right" rowspan="1" colspan="2"><a href="../index.php"><img src="../pics/undo.jpg" border="0" width="20">Kezdõlap</a> | <<a href="dual.php">Vissza</a><br>
      </td>
    </tr>
    <tr>
    </tr>
    <tr>
      <td><br>
      </td>
      <td class="footer" colspan="2" rowspan="1">&copy; blackPanther OS Magyarorsz&aacute;g Kft.</td>
    </tr>
</table>
</body>
</html>

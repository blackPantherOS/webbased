<?php
include ('../setup.inc');

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
<table class="frame" style="width: 785px; height: 398px;">
  <tbody>
    <tr>
      <td class="blankleft" colspan="1" rowspan="2"><br>
      <br><img src=../pics/process.gif>
      <br>Pontos idõ:   <?= date( "H:i" ) ?>
      <br>Blokkok:   <?= getDiskBlocks() ?>
      <br>Lemezterület:  <?= getDiskPercent() ?>%
      <br>Betöltés:   <?= getLoad() ?>
      </td>
      <td class="cdrec" valign="top"><br>
      <font size="4">Az CD-író alkalmazás indításához kattintson a "Start"<br>
       gombra, egyéb mûveletekhez használja<br>a navigációs pultot.</font>  
      <br><br><br>
      <table class="center2" style="width: 100%; text-align: right; vertical-align: middle;" border="0" cellpadding="2" cellspacing="2">
    <tr><br><br>
      <td align="right">
      <applet alt="Your browser understands the &lt;APPLET&gt; tag but isn't running the applet, for some reason."
	archive="../java/webCDcreator.jar" code="CDcreator.class" height="50" width="200">
	<param name="country" value="hu">
        <param name="language" value="hu">
	<param name="port" value="12411">
	<!-- <param name="server" value="127.0.0.1"> -->Your browser is completely ignoring the &lt;APPLET&gt; tag!
      </applet></p>
      </td>
    </tr><br><br>
    ...................................................
      </table>
      </td>
    </tr>
    <tr>
    </tr>
    <tr>
      <td class="lfooter"><br>
      </td>
      <td class="footer">&copy; blackPanther OS Magyarország Kft.<br>
      </td>
    </tr>
  </tbody>
</table>
</body>
</html>

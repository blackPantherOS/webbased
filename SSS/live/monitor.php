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
<script language="JavaScript">
function new_window(url) {
link = window.open(url,"Link","toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=0,resizable=0,width=230,height=250,left=80,top=180");
}
</script>
</head>
<body>
<table class="frame" style="width: 790px; height: 398px;">
    <tr>
      <td class="blankleft" colspan="1" rowspan="2"><br>
      <br><img src=../pics/process.gif>
      <br>Pontos idõ:   <?= date( "H:i" ) ?>
      <br>Blokkok:   <?= getDiskBlocks() ?>
      <br>Lemezterület:  <?= getDiskPercent() ?>%
      <br>Betöltés:   <?= getLoad() ?>
      </td>
<td border=1 border="1" style="white-space: nowrap; text-align: center;">
<img src=../pics/monitor.jpg><br>
<a HREF="javascript:new_window('http://<?= $addr ?>:8081')">1.Kam-Monitor</a>.</font><font
    FACE="ARIEL,HELVETICA" SIZE="-1"> <!--insert live code here--> </font></td>
</td> 
<td border="1" style="white-space: nowrap; text-align: center;">
<img src=../pics/monitor.jpg><br>
<a HREF="javascript:new_window('http://<?= $addr ?>:8082')">2.Kam-Monitor</a>.</font><font
    FACE="ARIEL,HELVETICA" SIZE="-1"> <!--insert live code here--> </font></td>
</td>
</tr><tr> 
<td border="1" style="white-space: nowrap; text-align: center;">
<img src=../pics/monitor.jpg><br>
<a HREF="javascript:new_window('http://<?= $addr ?>:8083')">3.Kam-Monitor</a>.</font><font
    FACE="ARIEL,HELVETICA" SIZE="-1"> <!--insert live code here--> </font></td>
</td> 
<td border="1" style="white-space: nowrap; text-align: center;">
<img src=../pics/monitor.jpg><br>
<a HREF="javascript:new_window('http://<?= $addr ?>:8084')">4.Kam-Monitor</a>.</font><font
    FACE="ARIEL,HELVETICA" SIZE="-1"> <!--insert live code here--> </font></td>
</td></tr> 
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

<?php
include ('./setup.inc');

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
<SCRIPT LANGUAGE="JavaScript">
<!--

IMAGE01 = "on.gif"
IMAGE02 = "off.gif"

function imgover(imgname){
     imgname.src = on.gif
}

function imgout(imgname){
     imgname.src = off.gif
}
//-->
</SCRIPT>

</head>
<body>
<table class="frame" style="width: 785px; height: 398px;">
  <tbody>
    <tr>
      <td class="blankleft" colspan="1" rowspan="2"><br>
      <br><img src=pics/process.gif>
      <br>Pontos idõ:   <?= date( "H:i" ) ?>
      <br>Blokkok:   <?= getDiskBlocks() ?>
      <br>Lemezterület:  <?= getDiskPercent() ?>%
      <br>Betöltés:   <?= getLoad() ?>
      </td>
      <td class="center" valign="top"><br>
    <font size="4">  Kérem válasszon az alábbi lehetõségek közül<br> vagy használja a navigációs pultot.</font>  
      <br><br><br>
      <table class="center2" style="width: 100%; text-align: right; vertical-align: middle;" border="0"
 cellpadding="2" cellspacing="2">
          <tr>
            <td><br><IMG NAME="IMAGE01" SRC="off.gif" WIDTH=10 HEIGHT=10 BORDER=0> 
	   <A HREF="recordings/medias.php" onMouseOver="imgover(IMAGE01)" onMouseOut="imgout(IMAGE01)">
	    Rögzített képek/videók megtekintése.</A>
	    <a href="recordings/medias.php" target="mframe">
	    <img src="pics/megnez.jpg" border="0"></a>
            </td>
          </tr>
          <tr>
            <td><IMG NAME="IMAGE02" SRC="off.gif" WIDTH=10 HEIGHT=10 BORDER=0> 
	   <A HREF="live/cdrecord.php" onMouseOver="imgover(IMAGE01)" onMouseOut="imgout(IMAGE01)">
	   Képek/Videók archíválása cd lemezre.</A>
	    <a href="live/cdrecord.php" target="mframe">
	    <img src="pics/cdr.jpg" border="0"></a>
            </td>
          </tr>
          <tr>
            <td><IMG NAME="IMAGE03" SRC="off.gif" WIDTH=10 HEIGHT=10 BORDER=0> 
	   <A HREF="live/monitor.php" onMouseOver="imgover(IMAGE01)" onMouseOut="imgout(IMAGE01)">
	    Egy kamera monitorozó módba helyezése.</A>
	    <a href="live/monitor.php" target="mframe">
	    <img src="pics/spy.jpg" border="0"></a>
            </td>
          </tr>
          <tr>
            <td><IMG NAME="IMAGE04" SRC="off.gif" WIDTH=10 HEIGHT=10 BORDER=0> 
	   <A HREF="recordings/medias.php" onMouseOver="imgover(IMAGE01)" onMouseOut="imgout(IMAGE01)">
	    Egyéb speciális funkciók.</A><img src="pics/other.jpg">
            </td>
          </tr>
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

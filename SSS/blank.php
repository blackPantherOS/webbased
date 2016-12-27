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
 <link rel=stylesheet type="text/css" href="/~<?php echo "$user_dir";?>/styles/gen_styles.css">
</head>
<body bgcolor="#ffffff">
<p align="center"><?= date( "H:i" ) ?> - <?= getLoad() ?> / <?= getDiskPercent() ?>% / <?= getDiskBlocks() ?></p>
<center>
<br><br><br><br><br><br>
�n most bel�pett a rendszerbe, <br>a fels� men�b�l v�lassza ki a megfelel� opci�t a k�v�nt n�zethez..
</center>
</body>
</html>

<?php
/*
    MediaRent
    v1.0
    Copyright (c) blackPanther Europe - www.blackpanther.hu
    First Code by Phanatic
*/

include('includes/header.inc.php');

if (mr_auth() === false) {
    header("Location: login.php");
    exit;
}

mr_html_header($lang['index']['title']);

?>
<table width="100%">
    <tr>
	<td width="20%" align="center">
	    <a href="members.php"><img src="images/members.gif" alt="<?php echo $lang['members']['title']; ?>" /></a><br />
	    <a href="members.php"><?php echo $lang['members']['title']; ?></a>
	</td>
	<td width="20%" align="center">
	    <a href="movies.php"><img src="images/movies.gif" alt="<?php echo $lang['movies']['title']; ?>" /></a><br />
	    <a href="movies.php"><?php echo $lang['movies']['title']; ?></a>
	</td>
	<td width="20%" align="center">
	    <a href="rents.php"><img src="images/rents.gif" alt="<?php echo $lang['rents']['title']; ?>" /></a><br />
	    <a href="rents.php"><?php echo $lang['rents']['title']; ?></a><br />
	</td>
	<td width="20%" align="center">
	    <a href="feecats.php"><img src="images/feecats.gif" alt="<?php echo $lang['feecats']['title']; ?>" /></a><br />
	    <a href="feecats.php"><?php echo $lang['feecats']['title']; ?></a><br />
	</td>
	<td width="20%" align="center">
	    <a href="chpass.php"><img src="images/password.gif" alt="<?php echo $lang['chpass']; ?>" /></a><br />
	    <a href="chpass.php"><?php echo $lang['chpass']['title']; ?></a>
	</td>
    </tr>
    <tr>
	<td align="center">
	    <a href="login.php?op=logout"><img src="images/logout.gif" alt="<?php echo $lang['logout']; ?>" /></a><br />
	    <a href="login.php?op=logout"><?php echo $lang['logout']; ?></a>
	</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
    </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php

include('includes/footer.inc.php');

?>
<?php
/*
    MediaRent
    v1.0
    Copyright (c) 2004 blackPanther Europe - www.blackpanther.hu
*/

include('includes/header.inc.php');

if (mr_auth() === false) {
    header("Location: login.php");
    exit;
}

switch ($_REQUEST['op']) {
    case 'ok':
	// change password - process
	if (empty($_POST['oldpass']) || empty($_POST['newpass']) || empty($_POST['newpass2'])) {
	    $msg = $lang['error']['forgot'];
	} elseif ($_POST['newpass'] != $_POST['newpass2']) {
	    $msg = $lang['chpass']['nomatch'];
	} else {
	    $qid = mysql_query("SELECT admin_jelszo FROM adminisztratorok WHERE admin_id = '".$_COOKIE['mr_admin']."'");
	    $admin = mysql_fetch_array($qid);
	    if ($admin['admin_jelszo'] != md5($_POST['oldpass'])) {
		$msg = $lang['chpass']['oldfailed'];
	    } else {
		mysql_query("UPDATE adminisztratorok SET admin_jelszo = '".md5($_POST['newpass'])."' WHERE admin_id = '".$_COOKIE['mr_admin']."'");
		$msg = $lang['chpass']['success'];
	    }
	}
	break;
}

mr_html_header($lang['chpass']['title']);

?>
<h2><img src="images/password.gif" align="absmiddle" alt="" /><?php echo $lang['chpass']['title']; ?></h2>
<p>
    <a href="index.php"><img src="images/back.gif" align="absmiddle" alt="" /></a> <a href="index.php"><?php echo $lang['back']; ?></a>
</p><b><font color=#ff0000>A jelszÃ³ mevÃ¡ltoztatÃ¡sa demo mÃ³dban nem lehetsÃ©ges, Ã©s csak aktuÃ¡lis fiÃ³kra vonatkozik.</font></b>
<hr />
<?php if (!empty($msg)) echo "<strong>".$msg."</strong>\n<hr />\n"; ?>
<form method="post" action="chpass.php">
<table>
    <tr>
	<th scope="row"><?php echo $lang['chpass']['oldpass']; ?></th>
	<td><input type="password" name="oldpass" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['chpass']['newpass']; ?></th>
	<td><input type="password" name="newpass" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['chpass']['newpass2']; ?></th>
	<td><input type="password" name="newpass2" /></td>
    </tr>
    <tr>
	<th scope="row"><input type="hidden" name="op" value="!oke!" /></th>
	<td><input type="submit" name="submit" value="OK" class="button" /></td> 
    </tr>
</table>
</form>
<?php

include('includes/footer.inc.php');

?>
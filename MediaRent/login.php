<?php
/*
    MediaRent
    v1.0
    Copyright (c) 2004 blackPanther Europe - www.blackpanther.hu
    
*/

include('includes/header.inc.php');

if (mr_auth() === true && $_REQUEST['op'] != 'logout') {
    header("Location: index.php");
    exit;
}

switch ($_REQUEST['op']) {
    case 'logout':
	mr_logout();
	$msg = $lang['login']['loggedout'];
	break;
    case 'login':
	if (mr_login($_POST['username'], $_POST['password']) === true) {
	    header("Location: index.php");
	    exit;
	} else {
	    $msg = $lang['login']['failed'];
	}
	break;
}

mr_html_header($lang['login']['title']);

?>
<h2><?php echo $lang['login']['title']; ?></h2>
<?php if (isset($msg)) echo "<strong>".$msg."</strong>\n<hr />\n"; ?>
<form method="post" action="login.php">
<table>
    <tr>
	<th scope="row"><?php echo $lang['login']['username']; ?></th>
	<td><input type="text" name="username" maxlength="20" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['login']['password']; ?></th>
	<td><input type="password" name="password" /></td>
    </tr>
    <tr>
	<th scope="row"><input type="hidden" name="op" value="login" /></th>
	<td><input type="submit" name="submit" value="<?php echo $lang['login']['button']; ?>" class="button" /> <input type="button" name="close" value="<?php echo $lang['close']; ?>" class="button" onClick="window.close();" />
	<br/>
	<br/>
	<?php echo $lang['support']['infomail']; ?></td>
    </tr>
</table>
</form>


<?php

include('includes/footer.inc.php');

?>
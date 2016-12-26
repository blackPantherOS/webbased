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
    case 'edit':
	// edit member
	if (empty($_GET['id'])) {
	    $msg = $lang['error']['id_member'];
	} else {
	    $qid = mysql_query("SELECT * FROM tagok WHERE tag_id = '".$_GET['id']."'");
	    $member = mysql_fetch_array($qid);
	    mr_html_header($lang['members']['title']." &rsaquo; ".$lang['edit']);

?>
<h2><img src="images/members.gif" align="absmiddle" alt="" /><?php echo $lang['members']['edit']; ?></h2>
<p>
<a href="members.php"><img src="images/back.gif" align="absmiddle" alt="" /></a> <a href="members.php"><?php echo $lang['back']; ?></a>
</p>
<hr />
<form method="post" action="members.php">
<table>
    <tr>
	<th scope="row"><?php echo $lang['name']; ?></th>
	<td><input type="text" name="tag_nev" maxlength="100" value="<?php echo $member['tag_nev']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['address']; ?></th>
	<td><input type="text" name="tag_lakcim" maxlength="255" value="<?php echo $member['tag_lakcim']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['phone']; ?></th>
	<td><input type="text" name="tag_telefon" maxlength="20" value="<?php echo $member['tag_telefon']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['vip']; ?></th>
	<td><input type="checkbox" name="tag_vip" value="1"<?php if ($member['tag_vip'] == '1') echo ' checked="checked"'; ?> /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['expire']; ?></th>
	<td><?php echo date("Y. m. d.", $member['tag_lejarat']); ?></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['extend']; ?></th>
	<td><input type="text" name="tag_lejarat" maxlength="2" /> <?php echo $lang['extend_month']; ?></td>
    </tr>
    <tr>
	<th scope="row"><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" /><input type="hidden" name="op" value="edit2" /></th>
	<td><input type="submit" name="submit" value="OK" class="button" /></td>
    </tr>
</table>
</form>
<?php

	    include('includes/footer.inc.php');
	    exit;
	}
	break;
    case 'edit2':
	// edit member - process
	if (empty($_POST['id']) || empty($_POST['tag_nev']) || empty($_POST['tag_lakcim']) || empty($_POST['tag_telefon'])) {
	    $msg = $lang['error']['forgot'];
	} else {
	    $expire = time() + ($_POST['tag_lejarat']*60*60*24*30);
	    if (empty($_POST['tag_vip'])) $vip = '0'; else $vip = '1';
	    mysql_query("UPDATE tagok SET tag_nev = '".$_POST['tag_nev']."' WHERE tag_id = '".$_POST['id']."'");
	    mysql_query("UPDATE tagok SET tag_lakcim = '".$_POST['tag_lakcim']."' WHERE tag_id = '".$_POST['id']."'");
	    mysql_query("UPDATE tagok SET tag_telefon = '".$_POST['tag_telefon']."' WHERE tag_id = '".$_POST['id']."'");
	    if (!empty($_POST['tag_lejarat'])) mysql_query("UPDATE tagok SET tag_lejarat = '".$expire."' WHERE tag_id = '".$_POST['id']."'");
	    mysql_query("UPDATE tagok SET tag_vip = '".$vip."' WHERE tag_id = '".$_POST['id']."'");
	    $msg = $lang['members']['editsuccess'];
	}
	break;
    case 'add':
	// add member
	mr_html_header($lang['members']['title']." &rsaquo; ".$lang['add']);

?>
<h2><img src="images/members.gif" align="absmiddle" alt="" /><?php echo $lang['members']['add']; ?></h2>
<p>
<a href="members.php"><img src="images/back.gif" align="absmiddle" alt="" /></a> <a href="members.php"><?php echo $lang['back']; ?></a>
</p>
<hr />
<form method="post" action="members.php">
<table>
    <tr>
	<th scope="row"><?php echo $lang['name']; ?></th>
	<td><input type="text" name="tag_nev" maxlength="100" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['address']; ?></th>
	<td><input type="text" name="tag_lakcim" maxlength="255" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['phone']; ?></th>
	<td><input type="text" name="tag_telefon" maxlength="20" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['membership']; ?></th>
	<td><input type="text" name="tag_lejarat" maxlength="2" /> <?php echo $lang['month']; ?></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['vip']; ?></th>
	<td><input type="checkbox" name="tag_vip" value="1" /></td>
    </tr>
    <tr>
	<th scope="row"><input type="hidden" name="op" value="add2" /></th>
	<td><input type="submit" name="submit" value="OK" class="button" /></td>
    </tr>
</table>
</form>
<?php

	include('includes/footer.inc.php');
	exit;
	break;
    case 'add2':
	// add member - process
	if (empty($_POST['tag_nev']) || empty($_POST['tag_lakcim']) || empty($_POST['tag_telefon']) || empty($_POST['tag_lejarat'])) {
	    $msg = $lang['error']['forgot'];
	} else {
	    $expire = time() + ($_POST['tag_lejarat']*60*60*24*30);
	    if (empty($_POST['tag_vip'])) $vip = '0'; else $vip = '1';
	    mysql_query("INSERT INTO tagok VALUES(0, '".$_POST['tag_nev']."', '".$_POST['tag_lakcim']."', '".$_POST['tag_telefon']."', '".time()."', '".$expire."', '".$vip."')");
	    $msg = $lang['members']['addsuccess'];
	}
	break;
    case 'del':
	// delete member
	if (empty($_GET['id'])) {
	    $msg = $lang['error']['id_member'];
	} else {
	    $qid = mysql_query("SELECT tag_nev FROM tagok WHERE tag_id = '".$_GET['id']."'");
	    $member = mysql_fetch_array($qid);
	    mr_html_header($lang['members']['title']." &rsaquo; ".$lang['delete']);

?>
<h2><img src="images/members.gif" align="absmiddle" alt="" /><?php echo $lang['members']['delete']; ?></h2>
<p>
<a href="members.php"><img src="images/back.gif" align="absmiddle" alt="" /></a> <a href="members.php"><?php echo $lang['back']; ?></a>
</p>
<hr />
<form method="post" action="members.php">
<?php echo $lang['members']['areyousure']; ?> <strong><?php echo $member['tag_nev']; ?></strong> <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" /><input type="hidden" name="op" value="del2" /><input type="submit" name="submit" value="<?php echo $lang['yes']; ?>" class="button" />
</form>
<?php

	    include('includes/footer.inc.php');
	    exit;
	}
	break;
    case 'del2':
	// delete member - process
	if (empty($_POST['id'])) {
	    $msg = $lang['error']['id_member'];
	} else {
	    mysql_query("DELETE FROM tagok WHERE tag_id = '".$_POST['id']."'");
	    $msg = $lang['members']['delsuccess'];
	}
	break;
    case 'history':
	// member's history
	if (empty($_GET['id'])) {
	    $msg = $lang['error']['id_member'];
	} else {
	    mr_html_header($lang['members']['title']." &rsaquo; ".$lang['history']);

?>
<h2><img src="images/members.gif" align="absmiddle" alt="" /><?php echo $lang['history']; ?></h2>
<p>
<a href="members.php"><img src="images/back.gif" align="absmiddle" alt="" /></a> <a href="members.php"><?php echo $lang['back']; ?></a>
</p>
<hr />
<table>
    <tr>
	<td><a href="members.php?op=history&id=<?php echo $_GET['id']; ?>&order=id"><?php echo $lang['id_short']; ?></a></td>
	<td><?php echo $lang['movie_short']; ?></td>
	<td><a href="members.php?op=history&id=<?php echo $_GET['id']; ?>&order=kezdet"><?php echo $lang['start_short']; ?></a></td>
	<td><a href="members.php?op=history&id=<?php echo $_GET['id']; ?>order=lejarat"><?php echo $lang['expire_short']; ?></a></td>
	<td><?php echo $lang['admin_short']; ?></td>
	<td></td>
    </tr>
<?php

if (empty($_GET['order'])) $orderby = " ORDER BY kolcsonzes_kezdet DESC"; else $orderby = " ORDER BY kolcsonzes_".$_GET['order'];
$qid = mysql_query("SELECT * FROM kolcsonzesek WHERE tag_id = '".$_GET['id']."'".$orderby);
while ($rent = mysql_fetch_array($qid)) {
    $qid_movie = mysql_query("SELECT film_cim FROM filmek WHERE film_id = '".$rent['film_id']."'");
    $movie = mysql_fetch_array($qid_movie);
    $qid_admin = mysql_query("SELECT admin_nev FROM adminisztratorok WHERE admin_id = '".$rent['admin_id']."'");
    $admin = mysql_fetch_array($qid_admin);

?>
    <tr>
	<td><?php echo $rent['kolcsonzes_id']; ?></td>
	<td><?php echo $movie['film_cim']; ?></td>
	<td><?php echo date("Y. m. d. H:i", $rent['kolcsonzes_kezdet']); ?></td>
	<td><?php echo date("Y. m. d. H:i", $rent['kolcsonzes_lejarat']); ?></td>
	<td><?php echo $admin['admin_nev']; ?></td>
	<td><img src="images/<?php echo $rent['kolcsonzes_ok']; ?>.gif" align="absmiddle" alt="<?php echo $lang['members']['ok_'.$rent['kolcsonzes_ok']]; ?>" /></td>
    </tr>
<?php

}

?>
</table>
<?php

	    include('includes/footer.inc.php');
	    exit;
	}
	break;
}

mr_html_header($lang['members']['title']);

?>
<h2><img src="images/members.gif" align="absmiddle" alt="" /><?php echo $lang['members']['title']; ?></h2>
<p>
<a href="members.php?op=add"><img src="images/add.gif" align="absmiddle" alt="" /></a> <a href="members.php?op=add"><?php echo $lang['members']['add']; ?></a><br />
<a href="index.php"><img src="images/back.gif" align="absmiddle" alt="" /></a> <a href="index.php"><?php echo $lang['back']; ?></a>
</p>
<hr />
<?php if (isset($msg)) echo "<strong>".$msg."</strong>\n<hr />\n"; ?>
<table>
    <tr>
	<td><a href="members.php?order=id"><?php echo $lang['id_short']; ?></a></td>
	<td><a href="members.php?order=nev"><?php echo $lang['name_short']; ?></a></td>
	<td><a href="members.php?order=lakcim"><?php echo $lang['address_short']; ?></a></td>
	<td><a href="members.php?order=telefon"><?php echo $lang['phone_short']; ?></a></td>
	<td></td>
	<td></td>
	<td></td>
    </tr>
<?php

if (empty($_GET['order'])) $orderby = " ORDER BY tag_nev"; else $orderby = " ORDER BY tag_".$_GET['order'];
$qid = mysql_query("SELECT * FROM tagok".$orderby);
while ($member = mysql_fetch_array($qid)) {

?>
    <tr>
	<td><?php echo $member['tag_id']; ?></td>
	<td><?php echo $member['tag_nev']; ?></td>
	<td><?php echo $member['tag_lakcim']; ?></td>
	<td><?php echo $member['tag_telefon']; ?></td>
	<td><a href="rents.php?op=rent&member=<?php echo $member['tag_id']; ?>"><img src="images/rent.gif" align="absmiddle" alt="<?php echo $lang['rent']; ?>" /></a></td>
	<td><a href="members.php?op=history&id=<?php echo $member['tag_id']; ?>"><img src="images/history.gif" align="absmiddle" alt="<?php echo $lang['history']; ?>" /></a></td>
	<td><a href="members.php?op=edit&id=<?php echo $member['tag_id']; ?>"><img src="images/edit.gif" align="absmiddle" alt="<?php echo $lang['edit']; ?>" /></a></td>
	<td><a href="members.php?op=del&id=<?php echo $member['tag_id']; ?>"><img src="images/delete.gif" align="absmiddle" alt="<?php echo $lang['delete']; ?>" /></a></td>
    </tr>
<?php

}

?>
</table>
<?php

include('includes/footer.inc.php');

?>
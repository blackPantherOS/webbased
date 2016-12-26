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
    case 'add':
	// add fee category
	if (empty($_POST['dijk_nev']) || empty($_POST['dijk_osszeg']) || empty($_POST['dijk_kesedelem']) || empty($_POST['dijk_elojegyzes'])) {
	    $msg = $lang['error']['forgot'];
	} else {
	    mysql_query("INSERT INTO dij_kategoriak VALUES(0, '".$_POST['dijk_nev']."', '".$_POST['dijk_osszeg']."', '".$_POST['dijk_kesedelem']."', '".$_POST['dijk_elojegyzes']."')");
	    $msg = $lang['feecats']['addsuccess'];
	}
	break;
    case 'edit':
	// edit fee category
	if (empty($_GET['id'])) {
	    $msg = $lang['error']['id_feecat'];
	} else {
	    $qid = mysql_query("SELECT * FROM dij_kategoriak WHERE dijk_id = '".$_GET['id']."'");
	    $feecat = mysql_fetch_array($qid);
	    mr_html_header($lang['feecats']['title']." &rsaquo; ".$lang['edit']);

?>
<h2><img src="images/feecats.gif" align="absmiddle" alt="" /><?php echo $lang['feecats']['edit']; ?></h2>
<p>
<a href="freecats.php"><img src="images/back.gif" align="absmiddle" alt="" /></a> <a href="feecats.php"><?php echo $lang['back']; ?></a>
</p>
<hr />
<form method="post" action="feecats.php">
<table>
    <tr>
	<th scope="row"><?php echo $lang['id']; ?></th>
	<td><input type="text" name="dijk_id" maxlength="10" value="<?php echo $feecat['dijk_id']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['name']; ?></th>
	<td><input type="text" name="dijk_nev" maxlength="50" value="<?php echo $feecat['dijk_nev']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['fee']; ?></th>
	<td><input type="text" name="dijk_osszeg" maxlength="5" value="<?php echo $feecat['dijk_osszeg']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['latefee']; ?></th>
	<td><input type="text" name="dijk_kesedelem" maxlength="5" value="<?php echo $feecat['dijk_kesedelem']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['prefee']; ?></th>
	<td><input type="text" name="dijk_elojegyzes" maxlength="5" value="<?php echo $feecat['dijk_elojegyzes']; ?>" /></td>
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
	// edit fee category - process
	if (empty($_POST['dijk_id']) || empty($_POST['dijk_nev']) || empty($_POST['dijk_osszeg']) || empty($_POST['dijk_kesedelem']) || empty($_POST['dijk_elojegyzes']) || empty($_POST['id'])) {
	    $msg = $lang['error']['forgot'];
	} else {
	    mysql_query("UPDATE dij_kategoriak SET dijk_id = '".$_POST['dijk_id']."' WHERE dijk_id = '".$_POST['id']."'");
	    mysql_query("UPDATE dij_kategoriak SET dijk_nev = '".$_POST['dijk_nev']."' WHERE dijk_id = '".$_POST['dijk_id']."'");
	    mysql_query("UPDATE dij_kategoriak SET dijk_osszeg = '".$_POST['dijk_osszeg']."' WHERE dijk_id = '".$_POST['dijk_id']."'");
	    mysql_query("UPDATE dij_kategoriak SET dijk_kesedelem = '".$_POST['dijk_kesedelem']."' WHERE dijk_id = '".$_POST['dijk_id']."'");
	    mysql_query("UPDATE dij_kategoriak SET dijk_elojegyzes = '".$_POST['dijk_elojegyzes']."' WHERE dijk_id = '".$_POST['dijk_id']."'");
	    $msg = $lang['feecats']['editsuccess'];
	}
	break;
    case 'del':
	// delete fee category
	if (empty($_GET['id'])) {
	    $msg = $lang['error']['id_feecat'];
	} else {
	    $qid = mysql_query("SELECT * FROM dij_kategoriak WHERE dijk_id = '".$_GET['id']."'");
	    $feecat = mysql_fetch_array($qid);
	    mr_html_header($lang['feecats']['title']." &rsaquo; ".$lang['delete']);

?>
<h2><img src="images/feecats.gif" align="absmiddle" alt="" /><?php echo $lang['feecats']['delete']; ?></h2>
<p>
<a href="freecats.php"><img src="images/back.gif" align="absmiddle" alt="" /></a> <a href="feecats.php"><?php echo $lang['back']; ?></a>
</p>
<hr />
<form method="post" action="feecats.php">
<?php echo $lang['feecats']['areyousure']; ?> <strong><?php echo $feecat['dijk_nev']; ?></strong> <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" /><input type="hidden" name="op" value="del2" /><input type="submit" name="yes" value="<?php echo $lang['yes']; ?>" class="button" />
</form>
<?php

	    include('includes/footer.inc.php');
	    exit;
	}
	break;
    case 'del2':
	// delete fee category - process
	if (empty($_POST['id'])) {
	    $msg = $lang['error']['forgot'];
	} else {
	    mysql_query("DELETE FROM dij_kategoriak WHERE dijk_id = '".$_POST['id']."'");
	    $msg = $lang['feecats']['delsuccess'];
	}
	break;
}

mr_html_header($lang['feecats']['title']);

?>
<h2><img src="images/feecats.gif" align="absmiddle" alt="" /><?php echo $lang['feecats']['title']; ?></h2>
<p>
<a href="index.php"><img src="images/back.gif" align="absmiddle" alt="" /></a> <a href="index.php"><?php echo $lang['back']; ?></a>
</p>
<hr />
<?php if (!empty($msg)) echo "<strong>".$msg."</strong>\n<hr />\n"; ?>
<form method="post" action="feecats.php">
<h3><?php echo $lang['feecats']['add']; ?></h3>
<table>
    <tr>
	<th scope="row"><?php echo $lang['name']; ?></th>
	<td><input type="text" name="dijk_nev" maxlength="50" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['fee']; ?></th>
	<td><input type="text" name="dijk_osszeg" maxlength="5" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['latefee']; ?></th>
	<td><input type="text" name="dijk_kesedelem" maxlength="5" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['prefee']; ?></th>
	<td><input type="text" name="dijk_elojegyzes" maxlength="5" /></td>
    </tr>
    <tr>
	<th scope="row"><input type="hidden" name="op" value="add" /></th>
	<td><input type="submit" name="submit" value="OK" class="button" /></td>
    </tr>
</table>
</form>
<hr />
<table>
    <tr>
	<td><a href="feecats.php?order=id"><?php echo $lang['id_short']; ?></a></td>
	<td><a href="feecats.php?order=nev"><?php echo $lang['name_short']; ?></a></td>
	<td><a href="feecats.php?order=osszeg"><?php echo $lang['fee_short']; ?></a></td>
	<td><a href="feecats.php?order=kesedelem"><?php echo $lang['latefee_short']; ?></a></td>
	<td><a href="feecats.php?order=elojegyzes"><?php echo $lang['prefee_short']; ?></a></td>
	<td></td>
	<td></td>
    </tr>
<?php

if (empty($_GET['order'])) $orderby = " ORDER BY dijk_nev"; else $orderby = " ORDER BY dijk_".$_GET['order'];
$qid = mysql_query("SELECT * FROM dij_kategoriak".$orderby);
while ($feecat = mysql_fetch_array($qid)) {

?>
    <tr>
	<td><?php echo $feecat['dijk_id']; ?></td>
	<td><?php echo $feecat['dijk_nev']; ?></td>
	<td><?php echo $feecat['dijk_osszeg']; ?></td>
	<td><?php echo $feecat['dijk_kesedelem']; ?></td>
	<td><?php echo $feecat['dijk_elojegyzes']; ?></td>
	<td><a href="feecats.php?op=edit&id=<?php echo $feecat['dijk_id']; ?>"><img src="images/edit.gif" align="absmiddle" alt="<?php echo $lang['edit']; ?>" /></a></td>
	<td><a href="feecats.php?op=del&id=<?php echo $feecat['dijk_id']; ?>"><img src="images/delete.gif" align="absmiddle" alt="<?php echo $lang['delete']; ?>" /></a></td>
    </tr>
<?php

}

?>
</table>
<?php

include('includes/footer.inc.php');

?>
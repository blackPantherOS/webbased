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
    case 'rent':
	// rent media
	mr_html_header($lang['rents']['title']." &rsaquo; ".$lang['rents']['request']);

?>
<h2><img src="images/rents.gif" align="absmiddle" alt="" /><?php echo $lang['rents']['request']; ?></h2>
<p>
<a href="rents.php"><img src="images/back.gif" align="absmiddle" alt="" /></a> <a href="rents.php"><?php echo $lang['back']; ?></a>
</p>
<hr />
<form method="post" action="rents.php">
<table>
    <tr>
	<th scope="row"><?php echo $lang['movie']; ?></th>
	<td><?php mr_list_movie($_GET['movie']); ?></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['member']; ?></th>
	<td><?php mr_list_member($_GET['member']); ?></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['start']; ?></th>
	<td><?php echo date("Y. m. d. H:i", time()); ?></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['expire']; ?></th>
	<td><?php mr_list_end() ?></td>
    </tr>
    <tr>
	<th scope="row"><input type="hidden" name="op" value="rent2" /></th>
	<td><input type="submit" name="submit" value="OK" class="button" /></td>
    </tr>
</table>
</form>
<?php

	include('includes/footer.inc.php');
	exit;
	break;
    case 'rent2':
	// rent media - process
	if (empty($_POST['film_id']) || empty($_POST['tag_id']) || empty($_POST['kolcsonzes_lejarat_ev']) || empty($_POST['kolcsonzes_lejarat_honap']) || empty($_POST['kolcsonzes_lejarat_nap']) || !isset($_POST['kolcsonzes_lejarat_ora'])) {
	    $msg = $lang['error']['forgot'];
	} else {
	    $expire = mktime($_POST['kolcsonzes_lejarat_ora'], 0, 0, $_POST['kolcsonzes_lejarat_honap'], $_POST['kolcsonzes_lejarat_nap'], $_POST['kolcsonzes_lejarat_ev']);
	    $status = mr_request_rent($_POST['film_id'], $_POST['tag_id'], $expire);
	    switch ($status) {
		case 'late':
		    // late fee must be paid first
		    $msg = $lang['rents']['failed_late'];
		    break;
		case 'limit':
		    // limit exceeded
		    $msg = $lang['rents']['failed_limit'];
		    break;
		case 'notav':
		    // movie not available - offer prescription
		    $msg = $lang['rents']['failed_notav'];
		    break;
		case 'pre':
		    // movie prescripted
		    $msg = $lang['rents']['failed_pre'];
		    break;
		case 'ok':
		    // everything okay
		    $msg = $lang['rents']['success'];
		    $fee = mr_count_rent($_POST['film_id'], $_POST['tag_id'], $expire);
		    break;
	    }
	}
	break;
    case 'finish':
	// finish rent
	if (empty($_GET['id'])) {
	    $msg = $lang['error']['id_rent'];
	} else {
	    mr_html_header($lang['rents']['title']);
	    $qid = mysql_query("SELECT film_id FROM kolcsonzesek WHERE kolcsonzes_id = '".$_GET['id']."'");
	    $rent = mysql_fetch_array($qid);
	    $qid_movie = mysql_query("SELECT film_cim FROM filmek WHERE film_id = '".$rent['film_id']."'");
	    $movie = mysql_fetch_array($qid_movie);

?>
<h2><img src="images/rents.gif" align="absmiddle" alt="" /><?php echo $lang['rents']['title']; ?></h2>
<p>
<a href="rents.php"><img src="images/back.gif" align="absmiddle" alt="" /></a> <a href="rents.php"><?php echo $lang['back']; ?></a>
</p>
<hr />
<form method="post" action="rents.php">
<?php echo $lang['rents']['finishsure']; ?> <strong><?php echo $movie['film_cim']; ?></strong> <input type="hidden" name="op" value="finish2" /><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" /><input type="submit" name="submit" value="<?php echo $lang['yes']; ?>" class="button" />
</form>
<?php

	    include('includes/footer.inc.php');
	    exit;
	}
	break;
    case 'finish2':
	// finish rent - process
	if (empty($_POST['id'])) {
	    $msg = $lang['error']['id_rent'];
	} else {
	    $status = mr_finish_rent($_POST['id']);
	    switch ($status) {
		case 'ok':
		    // everything okay
		    $msg = $lang['rents']['finishsuccess'];
		    break;
		default:
		    // has to pay late fees
		    $msg = $lang['rents']['finishpay'];
		    $fee = $status;
		    break;
	    }
	}
	break;
    case 'pre':
	// prescription
	mr_html_header($lang['rents']['title']." &rsaquo; ".$lang['rents']['pre']);

?>
<h2><img src="images/rents.gif" align="absmiddle" alt="" /><?php echo $lang['rents']['pre']; ?></h2>
<p>
<a href="rents.php"><img src="images/back.gif" align="absmiddle" alt="" /></a> <a href="rents.php"><?php echo $lang['back']; ?></a>
</p>
<hr />
<h3><?php echo $lang['rents']['addpre']; ?></h3>
<form method="post" action="rents.php">
<table>
    <tr>
	<th scope="row"><?php echo $lang['movie']; ?></th>
	<td><?php mr_list_movie($_GET['movie']); ?></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['member']; ?></th>
	<td><?php mr_list_member($_GET['member']); ?></td>
    </tr>
    <tr>
	<th scope="row"><input type="hidden" name="op" value="pre2" /></th>
	<td><input type="submit" name="submit" value="OK" class="button" /></td>
    </tr>
</table>
</form>
<hr />
<table>
    <tr>
	<td><a href="rents.php?order=id"><?php echo $lang['id_short']; ?></a></td>
	<td><?php echo $lang['movie_short']; ?></td>
	<td><?php echo $lang['member_short']; ?></td>
	<td><a href="rents.php?order=idopont"><?php echo $lang['date_short']; ?></a></td>
	<td></td>
    </tr>
<?php

if (empty($_GET['order'])) $orderby = " ORDER BY elojegyzes_idopont"; else $orderby = " ORDER BY elojegyzes_".$_GET['order'];
$qid = mysql_query("SELECT * FROM elojegyzesek WHERE elojegyzes_ok = '0'".$orderby);
while ($pre = mysql_fetch_array($qid)) {
    $qid_movie = mysql_query("SELECT film_cim FROM filmek WHERE film_id = '".$pre['film_id']."'");
    $movie = mysql_fetch_array($qid_movie);
    $qid_member = mysql_query("SELECT tag_nev FROM tagok WHERE tag_id = '".$pre['tag_id']."'");
    $member = mysql_fetch_array($qid_member);

?>
    <tr>
	<td><?php echo $pre['elojegyzes_id']; ?></td>
	<td><?php echo $movie['film_cim']; ?></td>
	<td><?php echo $member['tag_nev']; ?></td>
	<td><?php echo date("Y. m. d. H:i", $pre['elojegyzes_idopont']); ?></td>
	<td><a href="rents.php?op=prefinish&id=<?php echo $pre['elojegyzes_id']; ?>"><img src="images/finish.gif" align="absmiddle" alt="<?php echo $lang['finish']; ?>" /></a></td>
    </tr>
<?php

}

?>
</table>
<?php

	include('includes/footer.inc.php');
	exit;
	break;
    case 'pre2':
	// prescription - process
	if (empty($_POST['film_id']) || empty($_POST['tag_id'])) {
	    $msg = $lang['error']['forgot'];
	} else {
	    mysql_query("INSERT INTO elojegyzesek VALUES(0, '".$_POST['film_id']."', '".$_POST['tag_id']."', '".time()."', '0')");
	    $msg = $lang['rents']['presuccess'];
	}
	break;
    case 'prefinish':
	// finish prescription
	if (empty($_GET['id'])) {
	    $msg = $lang['error']['id_pre'];
	} else {
	    mysql_query("UPDATE elojegyzesek SET elojegyzes_ok = '1' WHERE elojegyzes_id = '".$_GET['id']."'");
	    $msg = $lang['rents']['prefinished'];
	}
	break;
    case 'print':
	// print paper
	if (empty($_GET['id'])) {
	    $msg = $lang['error']['id_rent'];
	} else {
	    $qid = mysql_query("SELECT * FROM kolcsonzesek WHERE kolcsonzes_id = '".$_GET['id']."'");
	    $rent = mysql_fetch_array($qid);
	    $qid_member = mysql_query("SELECT tag_id, tag_nev, tag_lejarat FROM tagok WHERE tag_id = '".$rent['tag_id']."'");
	    $member = mysql_fetch_array($qid_member);
	    $qid_movie = mysql_query("SELECT film_id, film_cim, media_id, dijk_id FROM filmek WHERE film_id = '".$rent['film_id']."'");
	    $movie = mysql_fetch_array($qid_movie);
	    $qid_media = mysql_query("SELECT media_nev, media_osszeg FROM mediak WHERE media_id = '".$movie['media_id']."'");
	    $media = mysql_fetch_array($qid_media);
	    if ($movie['dijk_id'] != '0') {
		$qid_feecat = mysql_query("SELECT dijk_nev, dijk_osszeg FROM dij_kategoriak WHERE dijk_id = '".$movie['dijk_id']."'");
		$feecat = mysql_fetch_array($qid_feecat);
		$fee = $feecat['dijk_osszeg'];
		$feecat = $feecat['dijk_nev'];
	    } else {
		$fee = $media['media_osszeg'];
		$feecat = '-';
	    }

?>
<html>
<head>
    <title>ÃtvÃ©teli elismervÃ©ny</title>
    <link rel="stylesheet" type="text/css" href="print.css" media="all" title="MediaRent Print" />
</head>
<body>
    <h1>ÃtvÃ©teli elismervÃ©ny</h1>
    <h2><?php echo $member['tag_nev']." (ID: ".$member['tag_id'].")"; ?></h2>
    <p>elismerem, hogy a mai napon, <?php echo date("Y. m. d", $rent['kolcsonzes_kezdet']); ?>-Ã©n <?php echo date("H:i", $rent['kolcsonzes_kezdet']); ?>-kor a kÃ¶vetkezÅ filmet kÃ¶lcsÃ¶nÃ¶ztem ki:</p>
    <h2><?php echo "(ID: ".$movie['film_id'].") ".$movie['film_cim']." (".$media['media_nev']."/".$feecat.")"; ?></h2>
    <h3>Fizetve: <?php echo $fee; ?> Ft</h3>
    <p>(TagsÃ¡gi Ã©rvÃ©nyes: <?php echo date("Y. m. d", $member['tag_lejarat']); ?>-ig)</p>
    <p class="sign">
	...................................<br />
	Ã¡tvevÅ alÃ¡Ã­rÃ¡sa
    </p>
    <hr />
    <h1>ÃtvÃ©teli elismervÃ©ny</h1>
    <h2><?php echo $member['tag_nev']." (ID: ".$member['tag_id'].")"; ?></h2>
    <p>elismerem, hogy a mai napon, <?php echo date("Y. m. d", $rent['kolcsonzes_kezdet']); ?>-Ã©n <?php echo date("H:i", $rent['kolcsonzes_kezdet']); ?>-kor a kÃ¶vetkezÅ filmet kÃ¶lcsÃ¶nÃ¶ztem ki:</p>
    <h2><?php echo "(ID: ".$movie['film_id'].") ".$movie['film_cim']." (".$media['media_nev']."/".$feecat.")"; ?></h2>
    <h3>Fizetve: <?php echo $fee; ?> Ft</h3>
    <p>(TagsÃ¡gi Ã©rvÃ©nyes: <?php echo date("Y. m. d", $member['tag_lejarat']); ?>-ig)</p>
    <p class="sign">
	...................................<br />
	Ã¡tvevÅ alÃ¡Ã­rÃ¡sa
    </p>
</body>
</html>
<?php

	    exit;
	}
	break;
}

mr_html_header($lang['rents']['title']);

?>
<h2><img src="images/rents.gif" align="absmiddle" alt="" /><?php echo $lang['rents']['title']; ?></h2>
<p>
<a href="rents.php?op=rent"><img src="images/rent.gif" align="absmiddle" alt="" /></a> <a href="rents.php?op=rent"><?php echo $lang['rents']['request']; ?></a><br />
<a href="rents.php?op=pre"><img src="images/pre.gif" align="absmiddle" alt="" /></a> <a href="rents.php?op=pre"><?php echo $lang['rents']['pre']; ?></a><br />
<a href="index.php"><img src="images/back.gif" align="absmiddle" alt="" /></a> <a href="index.php"><?php echo $lang['back']; ?></a>
</p>
<hr />
<?php if (!empty($msg)) echo "<strong>".$msg."</strong>\n<hr />\n"; ?>
<?php if (!empty($fee)) echo "<strong>".$lang['rents']['sum'].": ".$fee." ".$config['site']['currency']."</strong>\n<hr />\n"; ?>
<table>
    <tr>
	<td><a href="rents.php?order=id"><?php echo $lang['id_short']; ?></a></td>
	<td><?php echo $lang['movie_short']; ?></td>
	<td><?php echo $lang['member_short']; ?></td>
	<td><a href="rents.php?order=kezdet"><?php echo $lang['start_short']; ?></a></td>
	<td><a href="rents.php?order=lejarat"><?php echo $lang['expire_short']; ?></a></td>
	<td></td>
	<td></td>
    </tr>
<?php

if (empty($_GET['order'])) $orderby = " ORDER BY kolcsonzes_kezdet"; else $orderby = " ORDER BY kolcsonzes_".$_GET['order'];
$qid = mysql_query("SELECT * FROM kolcsonzesek WHERE kolcsonzes_ok = '0'".$orderby);
while ($rent = mysql_fetch_array($qid)) {
    $qid_movie = mysql_query("SELECT film_cim FROM filmek WHERE film_id = '".$rent['film_id']."'");
    $movie = mysql_fetch_array($qid_movie);
    $qid_member = mysql_query("SELECT tag_nev FROM tagok WHERE tag_id = '".$rent['tag_id']."'");
    $member = mysql_fetch_array($qid_member);

?>
    <tr>
	<td><?php echo $rent['kolcsonzes_id']; ?></td>
	<td><?php echo $movie['film_cim']; ?></td>
	<td><?php echo $member['tag_nev']; ?></td>
	<td><?php echo date("Y. m. d. H:i", $rent['kolcsonzes_kezdet']); ?></td>
	<td><?php echo date("Y. m. d. H:i", $rent['kolcsonzes_lejarat']); ?></td>
	<td><a href="rents.php?op=finish&id=<?php echo $rent['kolcsonzes_id']; ?>"><img src="images/finish.gif" align="absmiddle" alt="<?php echo $lang['finish']; ?>" /></a></td>
	<td><a href="rents.php?op=print&id=<?php echo $rent['kolcsonzes_id']; ?>" target="_blank"><img src="images/print.gif" align="absmiddle" alt="<?php echo $lang['print']; ?>" /></a></td>
    </tr>
<?php

}

?>
</table>
<?php

include('includes/footer.inc.php');

?>
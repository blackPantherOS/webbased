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
	// edit movie
	if (empty($_GET['id'])) {
	    $msg = $lang['error']['id_movie'];
	} else {
	    $qid = mysql_query("SELECT * FROM filmek WHERE film_id = '".$_GET['id']."'");
	    $movie = mysql_fetch_array($qid);
	    mr_html_header($lang['movies']['title']." &rsaquo; ".$lang['edit']);

?>
<h2><img src="images/movies.gif" align="absmiddle" alt="" /><?php echo $lang['movies']['edit']; ?></h2>
<p>
<a href="movies.php"><img src="images/back.gif" align="absmiddle" alt="" /> <a href="movies.php"><?php echo $lang['back']; ?></a>
</p>
<hr />
<form method="post" action="movies.php">
<table>
    <tr>
	<th scope="row"><?php echo $lang['id']; ?></th>
	<td><input type="text" name="film_id" maxlength="10" value="<?php echo $movie['film_id']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['title']; ?></th>
	<td><input type="text" name="film_cim" maxlength="255" value="<?php echo $movie['film_cim']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['original_title']; ?></th>
	<td><input type="text" name="film_eredeti_cim" maxlength="255" value="<?php echo $movie['film_eredeti_cim']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['year']; ?></th>
	<td><input type="text" name="film_ev" maxlength="4" value="<?php echo $movie['film_ev']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['director']; ?></th>
	<td><input type="text" name="film_rendezo" maxlength="255" value="<?php echo $movie['film_rendezo']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['quantity']; ?></th>
	<td><input type="text" name="film_darab" maxlength="2" value="<?php echo $movie['film_darab']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['disc']; ?></th>
	<td><input type="text" name="film_lemez" maxlength="2" value="<?php echo $movie['film_lemez']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['imdb']; ?></th>
	<td><input type="text" name="film_imdb" maxlength="10" value="<?php echo $movie['film_imdb']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['media']; ?></th>
	<td><?php mr_list_media($movie['media_id']); ?></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['category']; ?></th>
	<td><?php mr_list_category($movie['kategoria_id']); ?></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['feecategory']; ?></th>
	<td><?php mr_list_feecategory($movie['dijk_id']); ?></td>
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
	// edit mode - process
	if (empty($_POST['id']) || empty($_POST['film_id']) || empty($_POST['film_cim']) || empty($_POST['film_darab']) || empty($_POST['film_lemez']) || empty($_POST['media_id']) || empty($_POST['kategoria_id'])) {
	    $msg = $lang['error']['forgot'];
	} else {
	    mysql_query("UPDATE filmek SET film_id = '".$_POST['film_id']."' WHERE film_id = '".$_POST['id']."'");
	    mysql_query("UPDATE filmek SET film_cim = '".$_POST['film_cim']."' WHERE film_id = '".$_POST['film_id']."'");
	    mysql_query("UPDATE filmek SET film_eredeti_cim = '".$_POST['film_eredeti_cim']."' WHERE film_id = '".$_POST['film_id']."'");
	    mysql_query("UPDATE filmek SET film_ev = '".$_POST['film_ev']."' WHERE film_id = '".$_POST['film_id']."'");
	    mysql_query("UPDATE filmek SET film_rendezo = '".$_POST['film_rendezo']."' WHERE film_id = '".$_POST['film_id']."'");
	    mysql_query("UPDATE filmek SET film_darab = '".$_POST['film_darab']."' WHERE film_id = '".$_POST['film_id']."'");
	    mysql_query("UPDATE filmek SET film_lemez = '".$_POST['film_lemez']."' WHERE film_id = '".$_POST['film_id']."'");
	    mysql_query("UPDATE filmek SET film_imdb = '".$_POST['film_imdb']."' WHERE film_id = '".$_POST['film_id']."'");
	    mysql_query("UPDATE filmek SET media_id = '".$_POST['media_id']."' WHERE film_id = '".$_POST['film_id']."'");
	    mysql_query("UPDATE filmek SET kategoria_id = '".$_POST['kategoria_id']."' WHERE film_id = '".$_POST['film_id']."'");
	    mysql_query("UPDATE filmek SET dijk_id = '".$_POST['dijk_id']."' WHERE film_id = '".$_POST['film_id']."'");
	    $msg = $lang['movies']['editsuccess'];
	}
	break;
    case 'add':
	// add movie
	mr_html_header($lang['movies']['title']." &rsaquo ".$lang['add']);

?>
<h2><img src="images/movies.gif" align="absmiddle" alt="" /><?php echo $lang['movies']['add']; ?></h2>
<p>
<a href="movies.php"><img src="images/back.gif" align="absmiddle" alt="" /> <a href="movies.php"><?php echo $lang['back']; ?></a>
</p>
<hr />
<form method="post" action="movies.php">
<table>
    <tr>
	<th scope="row"><?php echo $lang['title']; ?></th>
	<td><input type="text" name="film_cim" maxlength="255" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['original_title']; ?></th>
	<td><input type="text" name="film_eredeti_cim" maxlength="255" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['year']; ?></th>
	<td><input type="text" name="film_ev" maxlength="4" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['director']; ?></th>
	<td><input type="text" name="film_rendezo" maxlength="255" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['quantity']; ?></th>
	<td><input type="text" name="film_darab" maxlength="2" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['disc']; ?></th>
	<td><input type="text" name="film_lemez" maxlength="2" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['imdb']; ?></th>
	<td><input type="text" name="film_imdb" maxlength="10" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['media']; ?></th>
	<td><?php mr_list_media(false); ?></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['category']; ?></th>
	<td><?php mr_list_category(false); ?></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['feecategory']; ?></th>
	<td><?php mr_list_feecategory(false); ?></td>
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
	// add movie - process
	if (empty($_POST['film_cim']) || empty($_POST['film_darab']) || empty($_POST['film_lemez']) || empty($_POST['media_id']) || empty($_POST['kategoria_id']) || !isset($_POST['dijk_id'])) {
	    $msg = $lang['error']['forgot'];
	} else {
	    mysql_query("INSERT INTO filmek VALUES(".(int) $_POST['film_id'].", '".$_POST['film_cim']."', '".$_POST['film_eredeti_cim']."', '".$_POST['film_ev']."', '".$_POST['film_rendezo']."', '".$_POST['film_darab']."', '".$_POST['film_lemez']."', '".$_POST['film_imdb']."', '".$_POST['media_id']."', '".$_POST['kategoria_id']."', '".$_POST['dijk_id']."')");
	    $msg = $lang['movies']['addsuccess'];
	}
	break;
    case 'del':
	// delete movie
	if (empty($_GET['id'])) {
	    $msg = $lang['error']['id_movie'];
	} else {
	    $qid = mysql_query("SELECT film_cim, film_ev FROM filmek WHERE film_id = '".$_GET['id']."'");
	    $movie = mysql_fetch_array($qid);
	    mr_html_header($lang['movies']['title']." &rsaquo; ".$lang['delete']);

?>
<h2><img src="images/movies.gif" align="absmiddle" alt="" /><?php echo $lang['movies']['delete']; ?></h2>
<p>
<a href="movies.php"><img src="images/back.gif" align="absmiddle" alt="" /> <a href="movies.php"><?php echo $lang['back']; ?></a>
</p>
<hr />
<form method="post" action="movies.php">
<?php echo $lang['movies']['areyousure']; ?> <strong><?php echo $movie['film_cim']; ?> (<?php echo $movie['film_ev']; ?>)</strong> <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" /><input type="hidden" name="op" value="del2" /><input type="submit" name="yes" value="<?php echo $lang['yes']; ?>" class="button" />
</form>
<?php

	    include('includes/footer.inc.php');
	    exit;
	}
	break;
    case 'del2':
	// delete movie - process
	if (empty($_POST['id'])) {
	    $msg = $lang['error']['forgot'];
	} else {
	    mysql_query("DELETE FROM filmek WHERE film_id = '".$_POST['id']."'");
	    $msg = $lang['movies']['delsuccess'];
	}
	break;
    case 'cat':
	// movie categories
	mr_html_header($lang['movies']['title']." &rsaquo; ".$lang['movies']['categories']);

?>
<h2><img src="images/movies.gif" align="absmiddle" alt="" /><?php echo $lang['movies']['categories']; ?></h2>
<p>
<a href="movies.php"><img src="images/back.gif" align="absmiddle" alt="" /> <a href="movies.php"><?php echo $lang['back']; ?></a>
</p>
<hr />
<form method="post" action="movies.php">
<?php echo $lang['movies']['category_add']; ?>: <input type="text" name="kategoria_nev" maxlength="100" /><input type="hidden" name="op" value="catadd" /><input type="submit" name="submit" value="OK" />
</form>
<hr />
<table>
    <tr>
	<td><a href="movies.php?op=cat&order=id"><?php echo $lang['id_short']; ?></a></td>
	<td><a href="movies.php?op=cat&order=nev"><?php echo $lang['name_short']; ?></a></td>
	<td></td>
	<td></td>
    </tr>
<?php

if (empty($_GET['order'])) $orderby = " ORDER BY kategoria_nev"; else $orderby = " ORDER BY kategoria_".$_GET['order'];
$qid = mysql_query("SELECT * FROM kategoriak".$orderby);
while ($category = mysql_fetch_array($qid)) {

?>
    <tr>
	<td><?php echo $category['kategoria_id']; ?></td>
	<td><?php echo $category['kategoria_nev']; ?></td>
	<td><a href="movies.php?op=catedit&id=<?php echo $category['kategoria_id']; ?>"><img src="images/edit.gif" align="absmiddle" alt="<?php echo $lang['edit']; ?>" /></a></td>
	<td><a href="movies.php?op=catdel&id=<?php echo $category['kategoria_id']; ?>"><img src="images/delete.gif" align="absmiddle" alt="<?php echo $lang['delete']; ?>" /></a></td>
    </tr>
<?php

}

?>
</table>
<?php

	include('includes/footer.inc.php');
	exit;
	break;
    case 'catadd':
	// add category
	if (empty($_POST['kategoria_nev'])) {
	    $msg = $lang['error']['forgot'];
	} else {
	    mysql_query("INSERT INTO kategoriak VALUES(0, '".$_POST['kategoria_nev']."')");
	    $msg = $lang['movies']['category_addsuccess'];
	}
	break;
    case 'catedit':
	// edit category
	if (empty($_GET['id'])) {
	    $msg = $lang['error']['id_category'];
	} else {
	    $qid = mysql_query("SELECT * FROM kategoriak WHERE kategoria_id = '".$_GET['id']."'");
	    $category = mysql_fetch_array($qid);
	    mr_html_header($lang['movies']['title']." &rsaquo; ".$lang['movies']['categories']." &rsaquo; ".$lang['edit']);

?>
<h2><img src="images/movies.gif" align="absmiddle" alt="" /><?php echo $lang['movies']['category_edit']; ?></h2>
<p>
<a href="movies.php?op=cat"><img src="images/back.gif" align="absmiddle" alt="" /> <a href="movies.php?op=cat"><?php echo $lang['back']; ?></a>
</p>
<hr />
<form method="post" action="movies.php">
<table>
    <tr>
	<th scope="row"><?php echo $lang['id']; ?></th>
	<td><input type="text" name="kategoria_id" maxlength="10" value="<?php echo $category['kategoria_id']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['name']; ?></th>
	<td><input type="text" name="kategoria_nev" maxlength="100" value="<?php echo $category['kategoria_nev']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" /><input type="hidden" name="op" value="catedit2" /></th>
	<td><input type="submit" name="submit" value="OK" class="button" /></td>
    </tr>
</table>
</form>
<?php

	    include('includes/footer.inc.php');
	    exit;
	}
	break;
    case 'catedit2':
	// edit category - process
	if (empty($_POST['kategoria_id']) || empty($_POST['kategoria_nev']) || empty($_POST['id'])) {
	    $msg = $lang['error']['forgot'];
	} else {
	    mysql_query("UPDATE kategoriak SET kategoria_id = '".$_POST['kategoria_id']."' WHERE kategoria_id = '".$_POST['id']."'");
	    mysql_query("UPDATE kategoriak SET kategoria_nev = '".$_POST['kategoria_nev']."' WHERE kategoria_id = '".$_POST['kategoria_id']."'");
	    $msg = $lang['movies']['category_editsuccess'];
	}
	break;
    case 'catdel':
	// delete category
	if (empty($_GET['id'])) {
	    $msg = $lang['error']['id_category'];
	} else {
	    $qid = mysql_query("SELECT * FROM kategoriak WHERE kategoria_id = '".$_GET['id']."'");
	    $category = mysql_fetch_array($qid);
	    mr_html_header($lang['movies']['title']." &rsaquo; ".$lang['movies']['categories']." &rsaquo; ".$lang['delete']);

?>
<h2><img src="images/movies.gif" align="absmiddle" alt="" /><?php echo $lang['movies']['category_delete']; ?></h2>
<p>
<a href="movies.php?op=cat"><img src="images/back.gif" align="absmiddle" alt="" /> <a href="movies.php?op=cat"><?php echo $lang['back']; ?></a>
</p>
<hr />
<form method="post" action="movies.php">
<?php echo $lang['movies']['category_areyousure']; ?> <strong><?php echo $category['kategoria_nev']; ?></strong> <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" /><input type="hidden" name="op" value="catdel2" /><input type="submit" name="yes" value="<?php echo $lang['yes']; ?>" class="button" />
</form>
<?php

	    include('includes/footer.inc.php');
	    exit;
	}
	break;
    case 'catdel2':
	// delete category - process
	if (empty($_POST['id'])) {
	    $msg = $lang['error']['forgot'];
	} else {
	    mysql_query("DELETE FROM kategoriak WHERE kategoria_id = '".$_POST['id']."'");
	    $msg = $lang['movies']['category_delsuccess'];
	}
	break;
    case 'media':
	// medias
	mr_html_header($lang['movies']['title']." &rsaquo; ".$lang['movies']['medias']);

?>
<h2><img src="images/movies.gif" align="absmiddle" alt="" /><?php echo $lang['movies']['medias']; ?></h2>
<p>
<a href="movies.php"><img src="images/back.gif" align="absmiddle" alt="" /> <a href="movies.php"><?php echo $lang['back']; ?></a>
</p>
<hr />
<form method="post" action="movies.php">
<h3><?php echo $lang['movies']['media_add']; ?></h3>
<table>
    <tr>
	<th scope="row"><?php echo $lang['name']; ?></th>
	<td><input type="text" name="media_nev" maxlength="50" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['fee']; ?></th>
	<td><input type="text" name="media_osszeg" maxlength="5" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['latefee']; ?></th>
	<td><input type="text" name="media_kesedelem" maxlength="5" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['prefee']; ?></th>
	<td><input type="text" name="media_elojegyzes" maxlength="5" /></td>
    </tr>
    <tr>
	<th scope="row"><input type="hidden" name="op" value="mediaadd" /></th>
	<td><input type="submit" name="submit" value="OK" class="button" /></td>
    </tr>
</table>
</form>
<hr />
<table>
    <tr>
	<td><a href="movies.php?op=media&order=id"><?php echo $lang['id_short']; ?></a></td>
	<td><a href="movies.php?op=media&order=nev"><?php echo $lang['name_short']; ?></a></td>
	<td><a href="movies.php?op=media&order=osszeg"><?php echo $lang['fee_short']; ?></a></td>
	<td><a href="movies.php?op=media&order=kesedelem"><?php echo $lang['latefee_short']; ?></a></td>
	<td><a href="movies.php?op=media&order=elojegyzes"><?php echo $lang['prefee_short']; ?></a></td>
	<td></td>
	<td></td>
    </tr>
<?php

if (empty($_GET['order'])) $orderby = " ORDER BY media_nev"; else $orderby = " ORDER BY media_".$_GET['order'];
$qid = mysql_query("SELECT * FROM mediak".$orderby);
while ($media = mysql_fetch_array($qid)) {

?>
    <tr>
	<td><?php echo $media['media_id']; ?></td>
	<td><?php echo $media['media_nev']; ?></td>
	<td><?php echo $media['media_osszeg']; ?></td>
	<td><?php echo $media['media_kesedelem']; ?></td>
	<td><?php echo $media['media_elojegyzes']; ?></td>
	<td><a href="movies.php?op=mediaedit&id=<?php echo $media['media_id']; ?>"><img src="images/edit.gif" align="absmiddle" alt="<?php echo $lang['edit']; ?>" /></a></td>
	<td><a href="movies.php?op=mediadel&id=<?php echo $media['media_id']; ?>"><img src="images/delete.gif" align="absmiddle" alt="<?php echo $lang['delete']; ?>" /></a></td>
    </tr>
<?php

}

?>
</table>
<?php

	include('includes/footer.inc.php');
	exit;
	break;
    case 'mediaadd':
	// add media
	if (empty($_POST['media_nev']) || empty($_POST['media_osszeg']) || empty($_POST['media_kesedelem']) || empty($_POST['media_elojegyzes'])) {
	    $msg = $lang['error']['forgot'];
	} else {
	    mysql_query("INSERT INTO mediak VALUES(0, '".$_POST['media_nev']."', '".$_POST['media_osszeg']."', '".$_POST['media_kesedelem']."', '".$_POST['media_elojegyzes']."')");
	    $msg = $lang['movies']['media_addsuccess'];
	}
	break;
    case 'mediaedit':
	// edit media
	if (empty($_GET['id'])) {
	    $msg = $lang['error']['id_media'];
	} else {
	    $qid = mysql_query("SELECT * FROM mediak WHERE media_id = '".$_GET['id']."'");
	    $media = mysql_fetch_array($qid);
	    mr_html_header($lang['movies']['title']." &rsaquo; ".$lang['movies']['medias']." &rsaquo; ".$lang['edit']);

?>
<h2><img src="images/movies.gif" align="absmiddle" alt="" /><?php echo $lang['movies']['media_edit']; ?></h2>
<p>
<a href="movies.php?op=media"><img src="images/back.gif" align="absmiddle" alt="" /> <a href="movies.php?op=media"><?php echo $lang['back']; ?></a>
</p>
<hr />
<form method="post" action="movies.php">
<table>
    <tr>
	<th scope="row"><?php echo $lang['id']; ?></th>
	<td><input type="text" name="media_id" maxlength="10" value="<?php echo $media['media_id']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['name']; ?></th>
	<td><input type="text" name="media_nev" maxlength="50" value="<?php echo $media['media_nev']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['fee']; ?></th>
	<td><input type="text" name="media_osszeg" maxlength="5" value="<?php echo $media['media_osszeg']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['latefee']; ?></th>
	<td><input type="text" name="media_kesedelem" maxlength="5" value="<?php echo $media['media_kesedelem']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><?php echo $lang['prefee']; ?></th>
	<td><input type="text" name="media_elojegyzes" maxlength="5" value="<?php echo $media['media_elojegyzes']; ?>" /></td>
    </tr>
    <tr>
	<th scope="row"><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" /><input type="hidden" name="op" value="mediaedit2" /></th>
	<td><input type="submit" name="submit" value="OK" class="button" /></td>
    </tr>
</table>
</form>
<?php

	    include('includes/footer.inc.php');
	    exit;
	}
	break;
    case 'mediaedit2':
	// edit media - process
	if (empty($_POST['media_id']) || empty($_POST['media_nev']) || empty($_POST['media_osszeg']) || empty($_POST['media_kesedelem']) || empty($_POST['media_elojegyzes']) || empty($_POST['id'])) {
	    $msg = $lang['error']['forgot'];
	} else {
	    mysql_query("UPDATE mediak SET media_id = '".$_POST['media_id']."' WHERE media_id = '".$_POST['id']."'");
	    mysql_query("UPDATE mediak SET media_nev = '".$_POST['media_nev']."' WHERE media_id = '".$_POST['media_id']."'");
	    mysql_query("UPDATE mediak SET media_osszeg = '".$_POST['media_osszeg']."' WHERE media_id = '".$_POST['media_id']."'");
	    mysql_query("UPDATE mediak SET media_kesedelem = '".$_POST['media_kesedelem']."' WHERE media_id = '".$_POST['media_id']."'");
	    mysql_query("UPDATE mediak SET media_elojegyzes = '".$_POST['media_elojegyzes']."' WHERE media_id = '".$_POST['media_id']."'");
	    $msg = $lang['movies']['media_editsuccess'];
	}
	break;
    case 'mediadel':
	// delete media
	if (empty($_GET['id'])) {
	    $msg = $lang['error']['id_media'];
	} else {
	    $qid = mysql_query("SELECT * FROM mediak WHERE media_id = '".$_GET['id']."'");
	    $media = mysql_fetch_array($qid);
	    mr_html_header($lang['movies']['title']." &rsaquo; ".$lang['movies']['medias']." &rsaquo; ".$lang['delete']);

?>
<h2><img src="images/movies.gif" align="absmiddle" alt="" /><?php echo $lang['movies']['media_delete']; ?></h2>
<p>
<a href="movies.php?op=media"><img src="images/back.gif" align="absmiddle" alt="" /> <a href="movies.php?op=media"><?php echo $lang['back']; ?></a>
</p>
<hr />
<form method="post" action="movies.php">
<?php echo $lang['movies']['media_areyousure']; ?> <strong><?php echo $media['media_nev']; ?></strong> <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" /><input type="hidden" name="op" value="mediadel2" /><input type="submit" name="yes" value="<?php echo $lang['yes']; ?>" class="button" />
</form>
<?php

	    include('includes/footer.inc.php');
	    exit;
	}
	break;
    case 'mediadel2':
	// delete media - process
	if (empty($_POST['id'])) {
	    $msg = $lang['error']['forgot'];
	} else {
	    mysql_query("DELETE FROM mediak WHERE media_id = '".$_POST['id']."'");
	    $msg = $lang['movies']['media_delsuccess'];
	}
	break;
}

mr_html_header($lang['movies']['title']);

?>
<h2><img src="images/movies.gif" align="absmiddle" alt="" /><?php echo $lang['movies']['title']; ?></h2>
<p>
<a href="movies.php?op=add"><img src="images/add.gif" align="absmiddle" alt="" /> <a href="movies.php?op=add"><?php echo $lang['movies']['add']; ?></a><br />
<a href="movies.php?op=cat"><img src="images/categories.gif" align="absmiddle" alt="" /> <a href="movies.php?op=cat"><?php echo $lang['movies']['categories']; ?></a><br />
<a href="movies.php?op=media"><img src="images/medias.gif" align="absmiddle" alt="" /> <a href="movies.php?op=media"><?php echo $lang['movies']['medias']; ?></a><br />
<a href="index.php"><img src="images/back.gif" align="absmiddle" alt="" /> <a href="index.php"><?php echo $lang['back']; ?></a>
</p>
<hr />
<?php if (isset($msg)) echo "<strong>".$msg."</strong>\n<hr />\n"; ?>
<h3><?php echo $lang['movies']['filter']; ?></h3>
<form method="post" action="movies.php">
<?php echo $lang['category']; ?>:
<?php mr_list_category(0, 'filter', 'cat_'); ?><input type="submit" name="submit" value="OK" class="button" /></form><br />
<form method="post" action="movies.php">
<?php echo $lang['media']; ?>:
<?php mr_list_media(0, 'filter', 'media_'); ?><input type="submit" name="submit" value="OK" class="button" /></form><br />
<form method="post" action="movies.php">
<?php echo $lang['start']; ?>:
<select name="filter">
<?php

for ($i = 1; $i < 10; $i++) {
    echo "\t<option value=\"start_".$i."\">".$i."</option>\n";
}

?>
</select><input type="submit" name="submit" value="OK" class="button" /></form>
<hr />
<table>
    <tr>
	<td><a href="movies.php?order=id"><?php echo $lang['id_short']; ?></a></td>
	<td><a href="movies.php?order=cim"><?php echo $lang['title_short']; ?></a></td>
	<td><a href="movies.php?order=ev"><?php echo $lang['year_short']; ?></a></td>
	<td></td>
	<td></td>
	<td></td>
    </tr>
<?php

if (empty($_GET['order'])) $orderby = " ORDER BY film_cim"; else $orderby = " ORDER BY film_".$_GET['order'];
if (empty($_POST['filter'])) {
    $filter = '';
} elseif (substr($_POST['filter'], 0, 3) == 'cat') {
    $catid = substr($_POST['filter'], 4);
    $filter = " WHERE kategoria_id = '".$catid."'";
} elseif (substr($_POST['filter'], 0, 5) == 'media') {
    $mediaid = substr($_POST['filter'], 6);
    $filter = " WHERE media_id = '".$mediaid."'";
} elseif (substr($_POST['filter'], 0, 5) == 'start') {
    $start = substr($_POST['filter'], -1);
    $filter = " WHERE film_id LIKE '".$start."%'";
}
$qid = mysql_query("SELECT * FROM filmek".$filter.$orderby);
while($movie = mysql_fetch_array($qid)) {

?>
    <tr>
	<td><?php echo $movie['film_id']; ?></td>
	<td><?php echo $movie['film_cim']; ?></td>
	<td><?php echo $movie['film_ev']; ?></td>
	<td><a href="rents.php?op=rent&movie=<?php echo $movie['film_id']; ?>"><img src="images/rent.gif" align="absmiddle" alt="<?php echo $lang['rent']; ?>" /></a></td>
	<td><a href="movies.php?op=edit&id=<?php echo $movie['film_id']; ?>"><img src="images/edit.gif" align="absmiddle" alt="<?php echo $lang['edit']; ?>" /></a></td>
	<td><a href="movies.php?op=del&id=<?php echo $movie['film_id']; ?>"><img src="images/delete.gif" align="absmiddle" alt="<?php echo $lang['delete']; ?>" /></a></td>
    </tr>
<?php

}

?>
</table>
<?php

include('includes/footer.inc.php');

?>
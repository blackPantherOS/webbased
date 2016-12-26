<?php
/*
    MediaRent
    v1.0
    Copyright (c) 2004 blackPanther Europe - www.blackpanther.hu
    www.blackpantheros.eu
*/

function mr_login($username, $password) {
    $qid = mysql_query("SELECT * FROM adminisztratorok WHERE admin_usernev = '".$username."' AND admin_jelszo = '".md5($password)."'");
    if (mysql_num_rows($qid) != 1) {
	return false;
    }
    $admin = mysql_fetch_array($qid);
    setcookie("mr_admin", $admin['admin_id'], time()+60*60*30);
    return true;
}

function mr_logout() {
    setcookie("mr_admin", "", time()-60*60*30);
}

function mr_auth() {
    if (!empty($_COOKIE['mr_admin'])) return true; else return false;
}

function mr_list_media($active, $name = 'media_id', $prefix = '') {
    echo "<select name=\"".$name."\">\n";
    $qid = mysql_query("SELECT * FROM mediak ORDER BY media_nev");
    while ($media = mysql_fetch_array($qid)) {
	if ($media['media_id'] == $active) $selected = " selected=\"selected\"";
	echo "\t<option value=\"".$prefix.$media['media_id']."\"".$selected.">".$media['media_nev']."</option>\n";
	$selected = "";
    }
    echo "</select>\n";
}

function mr_list_category($active, $name = 'kategoria_id', $prefix = '') {
    echo "<select name=\"".$name."\">\n";
    $qid = mysql_query("SELECT * FROM kategoriak ORDER BY kategoria_nev");
    while ($category = mysql_fetch_array($qid)) {
	if ($category['kategoria_id'] == $active) $selected = " selected=\"selected\"";
	echo "\t<option value=\"".$prefix.$category['kategoria_id']."\"".$selected.">".$category['kategoria_nev']."</option>\n";
	$selected = "";
    }
    echo "</select>\n";
}

function mr_list_feecategory($active) {
    global $config, $lang;
    echo "<select name=\"dijk_id\">\n";
    echo "\t<option value=\"0\">".$lang['movies']['media_default']."</option>\n";
    $qid = mysql_query("SELECT * FROM dij_kategoriak ORDER BY dijk_nev");
    while ($feecategory = mysql_fetch_array($qid)) {
	if ($feecategory['dijk_id'] == $active) $selected = " selected=\"selected\"";
	echo "\t<option value=\"".$feecategory['dijk_id']."\"".$selected.">".$feecategory['dijk_nev']." (".$feecategory['dijk_osszeg'].$config['site']['currency'].")</option>\n";
	$selected = "";
    }
    echo "</select>\n";
}

function mr_list_movie($active) {
    if (empty($active)) {
	echo "<select name=\"film_id\">\n";
	$qid = mysql_query("SELECT film_id, film_cim FROM filmek ORDER BY film_id");
	while ($movie = mysql_fetch_array($qid)) {
	    echo "\t<option value=\"".$movie['film_id']."\">".$movie['film_id']." - ".$movie['film_cim']."</option>\n";
	}
	echo "</select>\n";
    } else {
	$qid = mysql_query("SELECT film_cim FROM filmek WHERE film_id = '".$active."'");
	$movie = mysql_fetch_array($qid);
	echo $movie['film_cim']."<input type=\"hidden\" name=\"film_id\" value=\"".$active."\" />";
    }
}

function mr_list_member($active) {
    if (empty($active)) {
	echo "<select name=\"tag_id\">\n";
	$qid = mysql_query("SELECT tag_id, tag_nev FROM tagok ORDER BY tag_nev");
	while ($member = mysql_fetch_array($qid)) {
	    echo "\t<option value=\"".$member['tag_id']."\">".$member['tag_nev']."</option>\n";
	}
	echo "</select>\n";
    } else {
	$qid = mysql_query("SELECT tag_nev FROM tagok WHERE tag_id = '".$active."'");
	$member = mysql_fetch_array($qid);
	echo $member['tag_nev']."<input type=\"hidden\" name=\"tag_id\" value=\"".$active."\" />";
    }
}

function mr_list_end($active = false) {
    if ($active != false) {
	$tmp = date("Y m d H", $active);
	$expire = explode(' ', $tmp);
	echo "<select name=\"kolcsonzes_lejarat_ev\">\n";
	for ($i = date("Y", time()); $i < (date("Y", time()) + 5); $i++) {
	    if ($i == $expire[0]) $selected = ' selected="selected"';
	    echo "\t<option value=\"".$i."\"".$selected.">".$i."</option>\n";
	    $selected = '';
	}
	echo "</select>\n";
	echo "<select name=\"kolcsonzes_lejarat_honap\">\n";
	for ($i = 1; $i < 13; $i++) {
	    if (strlen($i) == 1) $j = '0'.$i; else $j = $i;
	    if ($j == $expire[1]) $selected = ' selected="selected"';
	    echo "\t<option value=\"".$i."\"".$selected.">".$j."</option>\n";
	    $selected = '';
	}
	echo "</select>\n";
	echo "<select name=\"kolcsonzes_lejarat_nap\">\n";
	for ($i = 1; $i < 32; $i++) {
	    if (strlen($i) == 1) $j = '0'.$i; else $j = $i;
	    if ($j == $expire[2]) $selected = ' selected="selected"';
	    echo "\t<option value=\"".$i."\"".$selected.">".$j."</option>\n";
	    $selected = '';
	}
	echo "</select>\n";
	echo "<select name=\"kolcsonzes_lejarat_ora\">\n";
	for ($i = 0; $i < 24; $i++) {
	    if (strlen($i) == 1) $j = '0'.$i; else $j = $i;
	    if ($j == $expire[3]) $selected = ' selected="selected"';
	    echo "\t<option value=\"".$i."\"".$selected.">".$j.":00</option>\n";
	    $selected = '';
	}
	echo "</select>\n";
    } else {
	echo "<select name=\"kolcsonzes_lejarat_ev\">\n";
	for ($i = date("Y", time()); $i < (date("Y", time()) + 5); $i++) {
	    echo "\t<option value=\"".$i."\">".$i."</option>\n";
	}
	echo "</select>\n";
	echo "<select name=\"kolcsonzes_lejarat_honap\">\n";
	for ($i = 1; $i < 13; $i++) {
	    if (strlen($i) == 1) $j = '0'.$i; else $j = $i;
	    if ($j == date("m", time())) $selected = ' selected="selected"';
	    echo "\t<option value=\"".$i."\"".$selected.">".$j."</option>\n";
	    $selected = '';
	}
	echo "</select>\n";
	echo "<select name=\"kolcsonzes_lejarat_nap\">\n";
	for ($i = 1; $i < 32; $i++) {
	    if (strlen($i) == 1) $j = '0'.$i; else $j = $i;
	    if ($j == (date("d", time()) + 1)) $selected = ' selected="selected"';
	    echo "\t<option value=\"".$i."\"".$selected.">".$j."</option>\n";
	    $selected = '';
	}
	echo "</select>\n";
	echo "<select name=\"kolcsonzes_lejarat_ora\">\n";
	for ($i = 0; $i < 24; $i++) {
	    if (strlen($i) == 1) $j = '0'.$i; else $j = $i;
	    if ($j == date("H", time())) $selected = ' selected="selected"';
	    echo "\t<option value=\"".$i."\"".$selected.">".$j.":00</option>\n";
	    $selected = '';
	}
	echo "</select>\n";
    }
}

function mr_request_rent($movie, $member, $expire) {
    global $config, $prescription;
    
    // check for any late fees
    $qid_late = mysql_query("SELECT kolcsonzes_id FROM kolcsonzesek WHERE tag_id = '".$member."' AND kolcsonzes_lejarat < '".time()."' AND kolcsonzes_ok = '0'");
    if (mysql_num_rows($qid_late) != 0) return 'late';
    
    // check if limit exceeded
    $qid_memrent = mysql_query("SELECT COUNT(kolcsonzes_id) AS kolcsonzes_tag FROM kolcsonzesek WHERE tag_id = '".$member."' AND kolcsonzes_ok = '0'");
    $memrent = mysql_fetch_array($qid_memrent);
    if ($memrent['kolcsonzes_tag'] == $config['site']['limit']) return 'limit';
    
    // check if movie available
    $qid_movie = mysql_query("SELECT film_darab FROM filmek WHERE film_id = '".$movie."'");
    $movies = mysql_fetch_array($qid_movie);
    $qid_movrent = mysql_query("SELECT COUNT(kolcsonzes_id) AS kolcsonzes_film FROM kolcsonzesek WHERE film_id = '".$movie."' AND kolcsonzes_ok = '0'");
    $movrent = mysql_fetch_array($qid_movrent);
    if ($movies['film_darab'] == $movrent['kolcsonzes_film']) return 'notav';
    
    // check if prescripted
    $qid_pre = mysql_query("SELECT tag_id FROM elojegyzesek WHERE film_id = '".$movie."' AND elojegyzes_ok = '0' ORDER BY elojegyzes_idopont");
    if (mysql_num_rows($qid_pre) > 0) {
	$pre = mysql_fetch_array($qid_pre);
	if ($pre['tag_id'] == $member) {
	    $prescription = true;
	} else {
	    if (($movies['film_darab'] - $movrent['kolcsonzes_film']) <= 1) return 'pre';
	}
    }
    
    // everything seems to be fine - place rent
    mysql_query("INSERT INTO kolcsonzesek VALUES(0, '".$movie."', '".time()."', '".$expire."', '".$member."', '0', '".$_COOKIE['mr_admin']."')");
    return 'ok';
}

function mr_finish_rent($id) {
    global $config;
    
    // check if member is a VIP
    $qid_member = mysql_query("SELECT tag_id FROM kolcsonzesek WHERE kolcsonzes_id = '".$id."'");
    $member = mysql_fetch_array($qid_member);
    $qid_vip = mysql_query("SELECT tag_id FROM tagok WHERE tag_id = '".$member['tag_id']."' AND tag_vip = '1'");
    if (mysql_num_rows($qid_vip) == 1) $vip = true; else $vip = false;
    
    // check if late
    $qid_late = mysql_query("SELECT kolcsonzes_lejarat, film_id FROM kolcsonzesek WHERE kolcsonzes_id = '".$id."' AND kolcsonzes_lejarat < '".time()."'");
    if (mysql_num_rows($qid_late) != 0) {
	// too late, has to calculate late fee
	$late = mysql_fetch_array($qid_late);
	// check if movie has a special fee category
	$qid_movie = mysql_query("SELECT dijk_id, media_id FROM filmek WHERE film_id = '".$late['film_id']."'" );
        $movie = mysql_fetch_array($qid_movie);
	if ($movie['dijk_id'] != '0') {
	    $qid_feecat = mysql_query("SELECT dijk_kesedelem FROM dij_kategoriak WHERE dijk_id = '".$movie['dijk_id']."'");
	    $feecat = mysql_fetch_array($qid_feecat);
	    $dayfee = $feecat['dijk_kesedelem'];
	} else {
	    $qid_media = mysql_query("SELECT media_kesedelem FROM mediak WHERE media_id = '".$movie['media_id']."'");
	    $media = mysql_fetch_array($qid_media);
	    $dayfee = $media['media_kesedelem'];
	}
	
	mysql_query("UPDATE kolcsonzesek SET kolcsonzes_ok = '1' WHERE kolcsonzes_id = '".$id."'");
	
	$days = round(((time() - $late['kolcsonzes_lejarat']) / (60*60*24)));
    
	if ($days == 0) $days = 1;
	if ($vip === false) return ($dayfee * $days); else return ($dayfee * $days * (1 - ($config['site']['discount'] / 100)));
    } else {
	// not late
	mysql_query("UPDATE kolcsonzesek SET kolcsonzes_ok = '1' WHERE kolcsonzes_id = '".$id."'");
	return 'ok';
    }
}

function mr_count_rent($movie, $member, $expire) {
    global $config, $prescription;
    
    // check if member is a VIP
    $qid_vip = mysql_query("SELECT tag_id FROM tagok WHERE tag_id = '".$member."' AND tag_vip = '1'");
    if (mysql_num_rows($qid_vip) == 1) $vip = true; else $vip = false;
    
    // check if movie has a special fee category
    $qid_movie = mysql_query("SELECT dijk_id, media_id FROM filmek WHERE film_id = '".$movie."'" );
    $movies = mysql_fetch_array($qid_movie);
    if ($movies['dijk_id'] != '0') {
	$qid_feecat = mysql_query("SELECT dijk_osszeg, dijk_elojegyzes FROM dij_kategoriak WHERE dijk_id = '".$movies['dijk_id']."'");
	$feecat = mysql_fetch_array($qid_feecat);
	$dayfee = $feecat['dijk_osszeg'];
	$prefee = $feecat['dijk_elojegyzes'];
    } else {
	$qid_media = mysql_query("SELECT media_osszeg, media_elojegyzes FROM mediak WHERE media_id = '".$movies['media_id']."'");
	$media = mysql_fetch_array($qid_media);
	$dayfee = $media['media_osszeg'];
	$prefee = $media['media_elojegyzes'];
    }
    
    $days = round((($expire - time()) / (60*60*24)));
    
    if ($days == 0) $days = 1;
    
    if ($prescription !== true) {
	if ($vip === false) return ($dayfee * $days); else return ($dayfee * $days * (1 - ($config['site']['discount'] / 100)));
    } else {
	mysql_query("UPDATE elojegyzesek SET elojegyzes_ok = '1' WHERE film_id = '".$movie."' AND tag_id = '".$member."' AND elojegyzes_ok = '0'");
	if ($vip === false) return (($dayfee * $days) + $prefee); else return ((($dayfee * $days) + $prefee) * (1 - ($config['site']['discount'] / 100)));
    }
}

?>
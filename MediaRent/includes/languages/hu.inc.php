<?php
/*
    MediaRent
    v1.0
    Copyright (c) 2004 blackPanther Europe - www.blackpanther.hu
    www.blackpantheros.eu
*/

$lang['login']['loggedout'] = "Sikeres kijelentkezÃÂ©s.";
$lang['login']['failed'] = "Sikertelen bejelentkezÃÂ©s.";
$lang['login']['title'] = "BejelentkezÃÂ©s (prÃÂ³ba nÃÂ©v/jelszÃÂ³: demo/demo)";
$lang['login']['username'] = "FelhasznÃÂ¡lÃÂ³";
$lang['login']['password'] = "JelszÃÂ³";
$lang['login']['button'] = "BelÃÂ©pÃÂ©s";

$lang['index']['title'] = "KezdÃÂµlap";

$lang['members']['title'] = "Tagok";
$lang['members']['edit'] = "Tag szerkesztÃÂ©se";
$lang['members']['editsuccess'] = "Tag adatai sikeresen frissÃÂ­tve.";
$lang['members']['add'] = "ÃÂj tag";
$lang['members']['addsuccess'] = "Tag sikeresen lÃÂ©trehozva.";
$lang['members']['delete'] = "Tag tÃÂ¶rlÃÂ©se";
$lang['members']['areyousure'] = "Biztosan tÃÂ¶rÃÂ¶lni akarja ezt a tagot?";
$lang['members']['delsuccess'] = "Tag sikeresen tÃÂ¶rÃÂ¶lve.";
$lang['members']['ok_0'] = "MÃÂ©g nincs visszahozva a film.";
$lang['members']['ok_1'] = "MÃÂ¡r vissza lett hozva a film.";

$lang['movies']['title'] = "Filmek";
$lang['movies']['edit'] = "Film szerkesztÃÂ©se";
$lang['movies']['editsuccess'] = "Film sikeresen frissÃÂ­tve.";
$lang['movies']['add'] = "ÃÂj film";
$lang['movies']['addsuccess'] = "Film sikeresen lÃÂ©trehozva.";
$lang['movies']['delete'] = "Film tÃÂ¶rlÃÂ©se";
$lang['movies']['areyousure'] = "Biztosan tÃÂ¶rÃÂ¶lni akarja ezt a filmet?";
$lang['movies']['delsuccess'] = "Film sikeresen tÃÂ¶rÃÂ¶lve.";
$lang['movies']['categories'] = "KategÃÂ³riÃÂ¡k";
$lang['movies']['category_add'] = "ÃÂj kategÃÂ³ria";
$lang['movies']['category_addsuccess'] = "KategÃÂ³ria sikeresen lÃÂ©trehozva.";
$lang['movies']['category_edit'] = "KategÃÂ³ria szerkesztÃÂ©se";
$lang['movies']['category_editsuccess'] = "KategÃÂ³ria sikeresen frissÃÂ­tve.";
$lang['movies']['category_delete'] = "KategÃÂ³ria tÃÂ¶rlÃÂ©se";
$lang['movies']['category_areyousure'] = "Biztosan tÃÂ¶rÃÂ¶lni akarja ezt a kategÃÂ³riÃÂ¡t?";
$lang['movies']['category_delsuccess'] = "KategÃÂ³ria sikresen tÃÂ¶rÃÂ¶lve.";
$lang['movies']['medias'] = "MÃÂ©diumok";
$lang['movies']['media_add'] = "ÃÂj mÃÂ©dia";
$lang['movies']['media_addsuccess'] = "MÃÂ©dia sikeresen lÃÂ©trehozva.";
$lang['movies']['media_edit'] = "MÃÂ©dia szerkesztÃÂ©se";
$lang['movies']['media_editsuccess'] = "MÃÂ©dia sikeresen frissÃÂ­tve.";
$lang['movies']['media_delete'] = "MÃÂ©dia tÃÂ¶rlÃÂ©se";
$lang['movies']['media_areyousure'] = "Biztosan tÃÂ¶rÃÂ¶lni akarja ezt a mÃÂ©diumot?";
$lang['movies']['media_delsuccess'] = "MÃÂ©dia sikeresen tÃÂ¶rÃÂ¶lve.";
$lang['movies']['media_default'] = "MÃÂ©dia szerinti alapÃÂ©rtelmezett";
$lang['movies']['filter'] = "SzÃÂ»rÃÂµ";

$lang['rents']['title'] = "KÃÂ¶lcsÃÂ¶nzÃÂ©sek";
$lang['rents']['request'] = "KÃÂ¶lcsÃÂ¶nzÃÂ©s kezdemÃÂ©nyezÃÂ©se";
$lang['rents']['failed_late'] = "KÃÂ¶lcsÃÂ¶nzÃÂ©s sikertelen. A tagnak tartozÃÂ¡sa van!";
$lang['rents']['failed_limit'] = "KÃÂ¶lcsÃÂ¶nzÃÂ©s sikertelen. A tag elÃÂ©rte a meghatÃÂ¡rozott limitet.";
$lang['rents']['failed_notav'] = "KÃÂ¶lcsÃÂ¶nzÃÂ©s sikertelen. A film minden pÃÂ©ldÃÂ¡nya kÃÂ¶lcsÃÂ¶nzÃÂ©s alatt. <a href=\"rents.php?op=pre&movie=".$_POST['film_id']."&member=".$_POST['tag_id']."\">ElÃÂµjegyzÃÂ©s</a>";
$lang['rents']['failed_pre'] = "KÃÂ¶lcsÃÂ¶nzÃÂ©s sikertelen. A film elÃÂµ van jegyezve. <a href=\"rents.php?op=pre&movie=".$_POST['film_id']."&member=".$_POST['tag_id']."\">ElÃÂµjegyzÃÂ©s</a>";
$lang['rents']['success'] = "KÃÂ¶lcsÃÂ¶nzÃÂ©s sikeres.";
$lang['rents']['finishsure'] = "Biztosan visszahozta a tag ezt a filmet?";
$lang['rents']['finishsuccess'] = "KÃÂ¶lcsÃÂ¶nzÃÂ©s befejezÃÂ©se sikeres.";
$lang['rents']['finishpay'] = "KÃÂ©sedelmi dÃÂ­j fizetendÃÂµ!";
$lang['rents']['pre'] = "ElÃÂµjegyzÃÂ©s";
$lang['rents']['addpre'] = "ÃÂj elÃÂµjegyzÃÂ©s";
$lang['rents']['presuccess'] = "ElÃÂµjegyzÃÂ©s sikeres.";
$lang['rents']['prefinish'] = "ElÃÂµjegyzÃÂ©s befejezve.";
$lang['rents']['sum'] = "FizetendÃÂµ";

$lang['feecats']['title'] = "DÃÂ­jkategÃÂ³riÃÂ¡k";
$lang['feecats']['addsuccess'] = "DÃÂ­jkategÃÂ³ria sikeresen lÃÂ©trehozva.";
$lang['feecats']['edit'] = "DÃÂ­jkategÃÂ³ria szerkesztÃÂ©se";
$lang['feecats']['editsuccess'] = "DÃÂ­jkategÃÂ³ria sikeresen frissÃÂ­tve.";
$lang['feecats']['delete'] = "DÃÂ­jkategÃÂ³ria tÃÂ¶rlÃÂ©se";
$lang['feecats']['areyousure'] = "Biztosan tÃÂ¶rÃÂ¶lni akarja ezt a dÃÂ­jkategÃÂ³riÃÂ¡t?";
$lang['feecats']['delsuccess'] = "DÃÂ­jkategÃÂ³ria sikeresen tÃÂ¶rÃÂ¶lve.";
$lang['feecats']['add'] = "ÃÂj dÃÂ­jkategÃÂ³ria";

$lang['chpass']['title'] = "JelszÃÂ³csere";
$lang['chpass']['oldpass'] = "RÃÂ©gi jelszÃÂ³";
$lang['chpass']['newpass'] = "ÃÂj jelszÃÂ³";
$lang['chpass']['newpass2'] = "ÃÂj jelszÃÂ³ ismÃÂ©t";
$lang['chpass']['nomatch'] = "A kÃÂ©t ÃÂºj jelszÃÂ³ nem egyezik meg.";
$lang['chpass']['success'] = "A jelszÃÂ³ sikeresen megvÃÂ¡ltoztatva.";
$lang['chpass']['oldfailed'] = "A rÃÂ©gi jelszÃÂ³ helytelen.";

$lang['error']['forgot'] = "Valamit elfelejtett kitÃÂ¶lteni.";
$lang['error']['id_feecat'] = "DÃÂ­jkategÃÂ³ria-azonosÃÂ­tÃÂ³ nics megadva.";
$lang['error']['id_member'] = "TagazonosÃÂ­tÃÂ³ nincs megadva.";
$lang['error']['id_rent'] = "KÃÂ¶lcsÃÂ¶nzÃÂ©s-azonosÃÂ­tÃÂ³ nincs megadva.";
$lang['error']['id_pre'] = "ElÃÂµjegyzÃÂ©s-azonosÃÂ­tÃÂ³ nincs megadva.";
$lang['error']['id_movie'] = "FilmazonosÃÂ­tÃÂ³ nincs megadva.";
$lang['error']['id_category'] = "KategÃÂ³ria-azonosÃÂ­tÃÂ³ nincs megadva.";
$lang['error']['id_media'] = "MÃÂ©dia-azonosÃÂ­tÃÂ³ nincs megadva.";

$lang['logout'] = "KijelentkezÃÂ©s";
$lang['edit'] = "SzerkesztÃÂ©s";
$lang['back'] = "Vissza";
$lang['id'] = "AzonosÃÂ­tÃÂ³";
$lang['name'] = "NÃÂ©v";
$lang['fee'] = "KÃÂ¶lcsÃÂ¶nzÃÂ©si dÃÂ­j (napi)";
$lang['latefee'] = "KÃÂ©sedelmi dÃÂ­j (napi)";
$lang['prefee'] = "ElÃÂµjegyzÃÂ©si dÃÂ­j";
$lang['delete'] = "TÃÂ¶rlÃÂ©s";
$lang['yes'] = "Igen";
$lang['id_short'] = "ID";
$lang['name_short'] = "NÃÂ©v";
$lang['fee_short'] = "KÃÂ¶lcsÃÂ¶nzÃÂ©s";
$lang['latefee_short'] = "KÃÂ©sedelem";
$lang['prefee_short'] = "ElÃÂµjegyzÃÂ©s";
$lang['address'] = "LakcÃÂ­m";
$lang['phone'] = "Telefon";
$lang['vip'] = "VIP";
$lang['expire'] = "LejÃÂ¡rat";
$lang['extend'] = "TagsÃÂ¡g meghosszabbÃÂ­tÃÂ¡sa";
$lang['extend_month'] = "hÃÂ³nap mÃÂ¡tÃÂ³l";
$lang['add'] = "ÃÂj";
$lang['membership'] = "TagsÃÂ¡g idÃÂµtartama";
$lang['month'] = "hÃÂ³nap";
$lang['address_short'] = "LakcÃÂ­m";
$lang['phone_short'] = "Telefon";
$lang['rent'] = "KÃÂ¶lcsÃÂ¶nzÃÂ©s";
$lang['movie'] = "Film";
$lang['member'] = "Tag";
$lang['start'] = "Kezdet";
$lang['movie_short'] = "Film";
$lang['member_short'] = "Tag";
$lang['date_short'] = "IdÃÂµpont";
$lang['finish'] = "BefejezÃÂ©s";
$lang['start_short'] = "Kezdet";
$lang['expire_short'] = "LejÃÂ¡rat";
$lang['title'] = "CÃÂ­m";
$lang['original_title'] = "Eredeti cÃÂ­m";
$lang['year'] = "ÃÂv";
$lang['director'] = "RendezÃÂµ";
$lang['quantity'] = "MennyisÃÂ©g";
$lang['disc'] = "MÃÂ©diÃÂ¡k szÃÂ¡ma";
$lang['imdb'] = "IMDb azonosÃÂ­tÃÂ³";
$lang['media'] = "MÃÂ©dia";
$lang['category'] = "KategÃÂ³ria";
$lang['feecategory'] = "DÃÂ­jkategÃÂ³ria";
$lang['title_short'] = "CÃÂ­m";
$lang['year_short'] = "ÃÂv";
$lang['history'] = "ElÃÂµzmÃÂ©nyek";
$lang['admin_short'] = "Kiadta";
$lang['close'] = "BezÃÂ¡rÃÂ¡s";
$lang['start'] = "ID eleje";

$lang['support']['infomail'] = "AjÃÂ¡nlat kÃÂ©rÃÂ©se:<font color:#ff0000> <a href=mailto:sales_KUKAC_vgroup_PONT_hu>sales_KUKAC_vgroup_PONT_hu </font></a>";



?>
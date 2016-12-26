<?php
/*
    MediaRent
    v1.0
    Copyright (c) 2004 blackPanther Europe - www.blackpanther.hu
    www.blackpantheros.eu
*/

$banners = array(
    array(
	'title' => 'blackPanther OS 2002-2017',
	'url' => 'http://www.blackpanther.hu',
	'image' => 'bpos.gif'
    ),
    array(
	'title' => 'blackpantheroshogyan.blogspot.com',
	'url' => 'http://blackpantheroshogyan.blogspot.com',
	'image' => 'bpos.gif'
    )
);

$rand = mt_rand(0, sizeof($banners) - 1);

echo "<a href=\"".$banners[$rand]['url']."\" target=\"_blank\"><img src=\"banners/".$banners[$rand]['image']."\" alt=\"".$banners[$rand]['title']."\" title=\"".$banners[$rand]['title']."\" /></a>\n";

?>
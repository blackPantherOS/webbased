<?php
/*
    MediaRent
    v1.0
    Copyright (c) 2004 blackPanther Europe - www.blackpanther.hu
    www.blackpantheros.eu
*/

function mr_html_header($title) {
    global $config, $lang;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $config['site']['title']." &rsaquo; ".$title; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" media="screen" title="MediaRent Orange" />
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-2" />
</head>

<body>
<div id="box">
    <div id="box-top"><h1><?php echo $config['site']['title']; ?></h1></div>
<?php

    if (basename($_SERVER['SCRIPT_NAME']) != 'login.php') {

?>
    <div id="navcontainer">
	<ul id="navlist">
	    <li><a href="index.php"<?php if (basename($_SERVER['SCRIPT_NAME']) == 'index.php') echo ' id="current"'; ?>><?php echo $lang['index']['title']; ?></a></li>
	    <li><a href="members.php"<?php if (basename($_SERVER['SCRIPT_NAME']) == 'members.php') echo ' id="current"'; ?>><?php echo $lang['members']['title']; ?></a></li>
	    <li><a href="movies.php"<?php if (basename($_SERVER['SCRIPT_NAME']) == 'movies.php') echo ' id="current"'; ?>><?php echo $lang['movies']['title']; ?></a></li>
	    <li><a href="rents.php"<?php if (basename($_SERVER['SCRIPT_NAME']) == 'rents.php') echo ' id="current"'; ?>><?php echo $lang['rents']['title']; ?></a></li>
	    <li><a href="feecats.php"<?php if (basename($_SERVER['SCRIPT_NAME']) == 'feecats.php') echo ' id="current"'; ?>><?php echo $lang['feecats']['title']; ?></a></li>
	</ul>
    </div>
<?php

    }

?>
    <div id="content">
<?php

}

function mr_html_footer() {

?>       </div>
    <div id="box-bottom"><p>Copyright &copy; 2004 <a href=http://www.vgroup.hu>blackPanther Europe - www.blackpanther.hu
</div>
<div id="banner"><?php include('banner.inc.php'); ?></div>
</body>
</html>

<?php

}

?>
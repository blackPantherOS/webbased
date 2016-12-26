<?php
/*
    MediaRent
    v1.0
    Copyright (c) 2004 blackPanther Europe - www.blackpanther.hu
    www.blackpantheros.eu
*/

include('config.inc.php');
include('functions.inc.php');
include('html.inc.php');
include('languages/'.$config['site']['language'].'.inc.php');

mysql_connect($config['db']['hostname'], $config['db']['username'], $config['db']['password']);
mysql_select_db($config['db']['dbname']);

?>
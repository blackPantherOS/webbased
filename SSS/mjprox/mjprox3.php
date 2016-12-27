<?php
include ('../setup.inc');
set_time_limit(0);
$ip = '127.0.0.1';
$fp = fsockopen ($ip, $camera3, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br>\n";
} else {
    fputs ($fp, "GET / HTTP/1.0\r\n\r\n");
    while ($str = trim(fgets($fp, 4096)))
       header($str);
    fpassthru($fp);
    fclose($fp);
}
?>

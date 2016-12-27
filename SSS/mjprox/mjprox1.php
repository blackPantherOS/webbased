<?php
include ('../setup.inc');
set_time_limit(0);
$ip = $addr;
//$ip = 'bpdevel.ath.cx';
$fp = fsockopen ($ip, $camera1, $errno, $errstr, 30);
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

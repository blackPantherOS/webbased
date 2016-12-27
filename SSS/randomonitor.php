<?php
include "setup.inc";
?>
<html>
<head>
<SCRIPT LANGUAGE="JavaScript">
<!--

//set image paths
src = [" <img src="pics/cdr.jpg" width="352" height="288">", " <img src="pics/camera.jpg" width="352" height="288">", " <img src="pics/cameras.jpg" width="352" height="288">", " <img src="pics/cdrecord.jpg" width="352" height="288">"]


//set corresponding urls
url = ["http://freewarejava.com", "http://javascriptkit.com", "http://dynamicdrive.com", "http://www.geocities.com"]

//set duration for each image
duration = 4;

//Please do not edit below
ads=[]; ct=0;
function switchAd() {
var n=(ct+1)%src.length;
if (ads[n] && (ads[n].complete || ads[n].complete==null)) {
document["Ad_Image"].src = ads[ct=n].src;
}
ads[n=(ct+1)%src.length] = new Image;
ads[n].src = src[n];
setTimeout("switchAd()",duration*1000);
}
function doLink(){
location.href = url[ct];
} onload = function(){
if (document.images)
switchAd();
}
//-->
</SCRIPT>
</head>
<A HREF="javascript:doLink();" onMouseOver="status=url[ct];return true;" onMouseOut="status=''">
<IMG NAME="Ad_Image" SRC="pics/offline.jpg" BORDER=0>
</A>

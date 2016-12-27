<?php
 include ('./setup.inc');
?>
<html>
<head>
 <title><?php echo "$title";?></title>
 <link rel=stylesheet type="text/css" href="/~<?php echo "$user_dir";?>/styles/gen_styles.css">
<table style="text-align: left; height: 23px; width: 55px;" border="1"
 cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td><img style="width: 250px; height: 90px;" alt="Startpage"
 title="Kezdõoldal" src="pics/hleft.jpg"><br>
      </td>
      <td><img style="width: 64px; height: 64px;" alt="Kamera 1"
 title="(1.) Kamera megjelen&iacute;t&eacute;se" src="pics/camera.png"><br>
Kamera<br>
      </td>
      <td><img style="width: 64px; height: 64px;" alt="Kamera 1"
 title="(2.) Kamera megjelen&iacute;t&eacute;se" src="pics/camera.png"><br>
Kamera<br>
      </td>
      <td><img style="width: 64px; height: 64px;" alt="Kamera 1"
 title="(3.) Kamera megjelen&iacute;t&eacute;se" src="pics/camera.png">
 Kamera<br>
      </td>
      <td><img style="width: 64px; height: 64px;" alt="Kamera 1"
 title="(4.) Kamera megjelen&iacute;t&eacute;se" src="pics/camera.png">
 Kamera<br>
      </td>
      <td><img style="width: 64px; height: 64px;" alt="All Kamera"
 title="Minden Kamera megjelen&iacute;t&eacute;se" src="pics/cameras.png"><br>
&nbsp;&nbsp;&nbsp; Mind<br>
      </td>
      <td><img style="width: 64px; height: 64px;" alt="Lemezter&uuml;let"
 title="Merevlemez kapac&iacute;t&aacute;s" src="pics/hdd.png"><br>
      </td>
      <td><img style="width: 64px; height: 64px;" alt="settings"
 title="Be&aacute;ll&iacute;t&aacute;sok" src="pics/configuration.png"><br>
      </td>
      <td><img style="width: 44px; height: 90px;" alt=""
 src="pics/hright.jpg"><br>
      </td>
    </tr>
  </tbody>
</table>
</head>
<frameset border="1" rows="20%,80%">
 <frame src="/~<?php echo "$user_dir";?>/blank.php" name="main"/>
</frameset>
<body>
<br>

<table cellspacing="0">
    <tr>
      <td id="leftcolumn">
      <!-- Start left blocks loop -->
          <src file="./blank.php"}><br>
        <!-- End left blocks loop -->
      </td>

      <td id="centercolumn">

        <!-- Display center blocks if any -->
        <{if $xoops_showcblock == 1}>

        <table cellspacing="0">
          <tr>
            <td id="centerCcolumn" colspan="2">

            <!-- Start center-center blocks loop -->
            <{foreach item=block from=$xoops_ccblocks}>
              <{include file="manecrosoft/theme_blockcenter_c.html"}>
            <{/foreach}>
            <!-- End center-center blocks loop -->

            </td>
          </tr>
          <tr>
            <td id="centerLcolumn">

            <!-- Start center-left blocks loop -->
              <{foreach item=block from=$xoops_clblocks}>
                <{include file="manecrosoft/theme_blockcenter_l.html"}>
              <{/foreach}>
            <!-- End center-left blocks loop -->

            </td><td id="centerRcolumn">

            <!-- Start center-right blocks loop -->
              <{foreach item=block from=$xoops_crblocks}>
                <{include file="manecrosoft/theme_blockcenter_r.html"}>
              <{/foreach}>
            <!-- End center-right blocks loop -->

            </td>
          </tr>
        </table>

        <{/if}>
        <!-- End display center blocks -->

        <div id="content">
          <{$xoops_contents}>
        </div>
      </td>

      <{if $xoops_showrblock == 1}>

      <td id="rightcolumn">
        <!-- Start right blocks loop -->
        <{foreach item=block from=$xoops_rblocks}>
          <{include file="manecrosoft/theme_blockright.html"}>
        <{/foreach}>
        <!-- End right blocks loop -->
      </td>

      <{/if}>

    </tr>
  </table>

  <table cellspacing="0">
    <tr id="footerbar">
      <td><b>Xoops2 RC3&nbsp;|&nbsp;Manecrosoft</b><br><br>(c) 2003 OCEAN-NET. All rights reserved. </td>
    </tr>
  </table>

<br>
</body>
</html>
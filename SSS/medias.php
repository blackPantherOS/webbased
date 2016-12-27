<?php
 include ('./setup.inc');
?>

<HTML>
<HEAD>
<TITLE>blackPanther Security & Spy System </TITLE>
<script language="javascript">
    if (self.parent.frames.length != 0)
	self.parent.location=document.location;
</script>
</HEAD>
<frameset rows="110,0,*" border="0" frameborder="0" framespacing="0">
<frame name="control" src="control/control2.php" marginwidth="10" marginheight="6" scrolling="no" frameborder="0" noresize>
<frame marginheight="2" marginwidth="1" noresize name="main" scrolling="no">
<frame name="mframe" src="recordings/index.php" marginwidth="10" marginheight="0" scrolling="auto" frameborder="0" noresize>
</frameset>
<script>
</script>			
</HTML>
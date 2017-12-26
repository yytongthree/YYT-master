<!doctype html> 
<?php session_start ();//将session销毁时调用destroy ?>
<html> 
<head> 
<meta charset="UTF-8"> 
<title>销毁session</title>
</head> 
<body> 
<?php
session_destroy (); 

?> 
<script type="text/javascript"> 
 window.location.href="managerindex.html"; 
</script> 
</body> 
</html> 

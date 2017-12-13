<!doctype html> 
<?php session_start ();//将session销毁时调用destroy ?>
<html> 
<head> 
<meta charset="UTF-8"> 
<title>销毁session</title>
</head> 
<body> 
<?php
	$autologin=$_REQUEST['autologin'];
	if($autologin==0){
		setcookie('remember2',1,time()-3600);
	}
	session_destroy ();
?> 
<script type="text/javascript"> 
 window.location.href="index.php"; 
</script> 
</body> 
</html> 

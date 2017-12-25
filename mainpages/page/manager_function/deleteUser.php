<!doctype html> 
<?php    session_start(); ?>
<html> 
<head> 
<meta charset="UTF-8"> 
  <title>删除用户</title> 
</head> 
<body> 
<?php
	$checkbox=$_REQUEST["checkbox"];
  	$authority=$_REQUEST["authority"];
	
    $conn=mysqli_connect("localhost","root","wenny673","yyt_info"); 
	// 检查连接 
	if (!$conn) 
	{ 
    	die("连接错误: " . mysqli_connect_error()); 
	} 

	if($authority="非签约用户")
		{
			/*echo "<script language=javascript>confirm('确认删除该非签约用户吗？')</script>";*/
			mysqli_query($conn,"DELETE FROM register_info WHERE ID='{$checkbox}'");
	echo "<script language=javascript>alert('删除非签约用户成功！')</script>"; 
	}
	else{
		if($authority="签约用户")
			{
				/*echo "<script language=javascript>confirm('确认删除该签约用户吗？')</script>";*/
				mysqli_query($conn,"DELETE FROM inha_info WHERE ID='{$checkbox}'");
	echo "<script language=javascript>alert('删除签约用户成功！')</script>"; 
	}
	else{
		if($authority="医生")
			{
				/*echo "<script language=javascript>confirm('确认删除该签约用户吗？')</script>";*/
				mysqli_query($conn,"DELETE FROM docter_info WHERE ID='{$checkbox}'");
	echo "<script language=javascript>alert('删除医生成功！')</script>"; 
	}
	}
	}
mysqli_close($conn);
?>
</body>
</html>
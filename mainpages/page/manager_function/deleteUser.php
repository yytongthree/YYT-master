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

	if($authority=="非签约用户")
		{
			mysqli_query($conn,"DELETE FROM register_info WHERE ID='{$checkbox}'");
	echo "<script language=javascript>alert('删除非签约用户成功！')</script>"; 
	}
	else{
		if($authority=="签约用户")
			{
				if (mysqli_query($conn,"DELETE FROM register_info WHERE ID='{$checkbox}'")){
				echo "<script language=javascript>alert('删除签约用户注册信息成功！')</script>";
				}
				
				$sql1 = "select truename from register_info WHERE ID='{$checkbox}' ";
				$res1 = mysqli_query($conn,$sql1);
				$row1=mysqli_fetch_array($res1,MYSQLI_ASSOC);
				$sql2 = "select * from inha_info WHERE name='{$row1['truename']}'";
				$res2 = mysqli_query($conn,$sql2);
				$row2=mysqli_fetch_array($res2,MYSQLI_ASSOC);
				if (mysqli_query($conn,"DELETE FROM inha_info WHERE name='{$row2['name']}'")){
			echo "<script language=javascript>alert('删除签约用户在案信息成功！')</script>";  
	}
	else{
		if($authority=="医生")
			{
				if (mysqli_query($conn,"DELETE FROM register_info WHERE ID='{$checkbox}'")){
				echo "<script language=javascript>alert('删除医生注册信息成功！')</script>";
				}
				
				$sql1 = "select truename from register_info WHERE ID='{$checkbox}' ";
				echo $sql1;
				$res1 = mysqli_query($conn,$sql1);
				$row1=mysqli_fetch_array($res1,MYSQLI_ASSOC);
				echo $row1['truename'];
				$sql2 = "select * from docter_info WHERE name='{$row1['truename']}'";
				$res2 = mysqli_query($conn,$sql2);
				$row2=mysqli_fetch_array($res2,MYSQLI_ASSOC);
				echo $row2['name'];
				if (mysqli_query($conn,"DELETE FROM docter_info WHERE name='{$row2['name']}'")){
			echo "<script language=javascript>alert('删除医生在案成功！')</script>"; 
				}
		}
	}
	}
mysqli_close($conn);
	}
?>
<script>window.location.href="delete.php";</script>
</body>
</html>
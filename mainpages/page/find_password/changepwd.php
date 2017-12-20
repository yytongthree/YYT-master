<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
	$newpwd=$_REQUEST['pwd'];
	$re_pwd=$_REQUEST['re-pwd'];
	if(!$newpwd){
?>
        <script type="text/javascript">
			alert ("密码不能为空！");
			window.location.href="reset.php";
		</script>
<?php
	}
	if($newpwd!=$re_pwd){
?>
        <script type="text/javascript">
			alert ("两次输入密码不一致！");
			window.location.href="reset.php";
		</script>
<?php
	}
	if($_COOKIE['username']){
		$username=$_COOKIE['username'];
	}else{
		if($_COOKIE['email']){
			$email=$_COOKIE['email'];
		}else{
?>
        <script type="text/javascript">
			alert ("用户身份无法明确！");
			window.location.href="findpwd_way.php";
		</script>
<?php
		}
	}
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	
	$newpwd=md5($newpwd);
	
	if($email){
		$sql = "UPDATE register_info SET password='$newpwd' WHERE email='{$email}'";
	}else{
		$sql = "UPDATE register_info SET password='$newpwd' WHERE name='{$username}'"; 
	}
     //执行SQL语句  
	if(mysqli_query($conn,$sql)){
?>
		<script type="text/javascript">
			alert ("修改成功！");
			window.location.href="../../../index.php";
		</script>
<?php	
	}else {
?>
		<script type="text/javascript">
			alert ("修改失败！");
			window.location.href="findpwd_way.php";
		</script>
<?php
	}
     //释放记录集所占用的内存  
	mysqli_close($conn);
?>
</body>
</html>
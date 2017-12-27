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
	$newpwd=md5($newpwd);
	
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	if($_COOKIE['username']){
		$username=$_COOKIE['username'];
		$sql = "UPDATE register_info SET password='$newpwd' WHERE name='{$username}'";
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
	}else{
		if($_COOKIE['email'] && $_COOKIE['token']){
			$email=$_COOKIE['email'];
			$token=$_COOKIE['token'];
			$check=array();
			$uname=array();
			$sql = "SELECT name,password FROM register_info WHERE email='{$email}'";
			$result=mysqli_query($conn,$sql) or die("Error in query: $sql. ".mysqli_error());
			if(mysqli_num_rows($result)>0){  
				$count=0;
				while($row=mysqli_fetch_array($result)){
					$uname[]=$row['name'];
					$name=$row['name'];
					$password=$row['password'];
					$arr = array($name,$password);
					$name_pass=implode(' ',$arr);
					$add = md5($name_pass);//组合验证码
					$check[]=$add;
					$count++;
				}
			}

			for($i=0;$i<$count;$i++){
				if($check[$i] == $token){
					$sql1 = "UPDATE register_info SET password='$newpwd' WHERE name='{$uname[$i]}'";
					//执行SQL语句  
					if(mysqli_query($conn,$sql1)){
?>
						<script type="text/javascript">
							alert ("修改成功！");
							window.location.href="../../../index.php";
						</script>
<?php	
					}
				}
			}
		}else{
?>
			<script type="text/javascript">
				alert ("修改失败！");
				window.location.href="findpwd_way.php";
			</script>
<?php
		}
	}
	

	
     //释放记录集所占用的内存  
	mysqli_close($conn);
?>
</body>
</html>
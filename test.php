<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
	$username=$_REQUEST["adminName"];
	$email=$_REQUEST["re_email"];
	$conn=mysqli_connect("localhost","root","wenny673","yyt_info"); 
	// 检查连接 
	if (!$conn) 
	{ 
    	die("连接错误: " . mysqli_connect_error()); 
	}
	$sql2="select name,password from register_info where name ='{$username}'";
	$result2=mysqli_query($conn,$sql2);
	if(mysqli_num_rows($result2)>0){   
		while($row=mysqli_fetch_array($result2)){
			$uname=$row['name'];
			$password=$row['password'];
			$arr = array($uname,$password);
			$name_pass=implode(' ',$arr);
			$token = md5($name_pass);//组合验证码码
		}
		$url="http://localhost/YYT-master/reset.php?email=".$email."&token=".$token;
		echo "亲爱的".$email."：<br/>您在".$time."提交了找回密码请求。请点击下面的链接重置密码（按钮24小时内有效）。<br/><a href='".$url."'target='_blank'>".$url."</a>";
	}
?>
</body>
</html>
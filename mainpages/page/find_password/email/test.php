<?php session_start();?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
			$conn=mysqli_connect("localhost","root","wenny673","yyt_info"); 
	// 检查连接 
	if (!$conn) 
	{ 
    	die("连接错误: " . mysqli_connect_error()); 
	}
			$uname=$_SESSION['username'];
			$sql2="select password,email from register_info where name ='$uname'";
			$result2=mysqli_query($conn,$sql2) or die("Error in query: $sql2. ".mysqli_error());
			if(mysqli_num_rows($result2)>0){   
				while($row=mysqli_fetch_array($result2)){
					$password=$row['password'];
					$email=$row['email'];
					$arr = array($uname,$password);
					$name_pass=implode(' ',$arr);
					$token = md5($name_pass);//组合验证码
				}
			//	$url="http://localhost/YYT-master/mainpages/page/find_password/reset.php?email=".$email;
				$url = "http://localhost/YYT-master/mainpages/page/find_password/reset.html?email=".$email."&token=".$token;//构造URL
				$time = date("Y-m-d H:i:s"); 
				$result = sendmail($time,$email,$url);
				echo $result;
			}
	
	//发送邮件 
	function sendmail($time,$email,$url){
		return $url;
	}

?>
</body>
</html>
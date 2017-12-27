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
	
	$dbemail=null; 
	$sql1="select email from register_info where name ='{$username}'";
	$result1=mysqli_query($conn,$sql1);
	if(mysqli_num_rows($result1)>0){    
		while($row=mysqli_fetch_array($result1)){
			$dbemail=$row['email'];
		}
		if($dbemail!=$email){
?>
			<script type="text/javascript"> 
				alert("该邮箱尚未注册！"); 
				window.location.href="findpwd_email.html"; 
			</script> 
<?php
		}else{
			$sql2="select name,password from register_info where name ='{$username}'";
			$result2=mysqli_query($conn,$sql2);
			if(mysqli_num_rows($result2)>0){   
				while($row=mysqli_fetch_array($result2)){
					$uname=$row['name'];
					$password=$row['password'];
					$arr = array($uname,$password);
					$name_pass=implode(' ',$arr);
					$token = md5($name_pass);//组合验证码
				}
			//	$url="http://localhost/YYT-master/mainpages/page/find_password/reset.php?email=".$email;
				$url = "http://localhost/YYT-master/mainpages/page/find_password/reset.php?email=".$email."&token=".$token;//构造URL
				$time = date("Y-m-d H:i:s"); 
				$result = sendmail($time,$email,$url);
				if($result==1){//邮件发送成功
?>
					<script type="text/javascript"> 
    					alert("系统已向您的邮箱发送了一封邮件,请登录到您的邮箱及时重置您的密码！"); 
    					window.location.href="../../../../index.php"; 
  					</script> 
<?php 
				}else{ 
					$msg = $result;
					echo $msg; 
				} 
			}
		}
	}else{
?>
		<script type="text/javascript"> 
			alert("用户名不存在"); 
			window.location.href="findpwd_email.html"; 
		</script> 
<?php
	}
	
	//发送邮件 
	function sendmail($time,$email,$url){ 
		include_once("smtp.php"); 
		$smtpusermail = "yytongthree@163.com"; //SMTP服务器的用户邮箱 
		//这里面的一个true是表示使用身份验证,否则不使用身份验证. 
		$emailtype = "HTML"; //信件类型，文本:text；网页：HTML 
		$smtpemailto = $email; 
		$smtpemailfrom = $smtpusermail; 
		$emailsubject = "医养通系统 - 找回密码"; 
		$emailbody = "亲爱的".$email."：<br/>您在".$time."提交了找回密码请求。请点击下面的链接重置密码：<br/><a href='".$url."'target='_blank'>".$url."</a>"; 
		
		$mail = new MySendMail();
	//	$mail->setServer("smtp@126.com", "XXXXX@126.com", "XXXXX"); //设置smtp服务器，普通连接方式
		$mail->setServer("smtp.163.com", "yytongthree", "yytong2017", 465, true); //设置smtp服务器，到服务器的SSL连接
		$mail->setFrom($smtpemailfrom); //设置发件人
		$mail->setReceiver($smtpemailto); //设置收件人，多个收件人，调用多次
		$mail->setMail($emailsubject, $emailbody); //设置邮件主题、内容
		$rs = $mail->sendMail();
		return $rs;
	}

?>
</body>
</html>
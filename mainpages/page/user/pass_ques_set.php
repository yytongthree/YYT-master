<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
	<meta charset="utf-8">
	<title>个人资料--layui后台管理模板</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="../../layui/css/layui.css" media="all" />
	<link rel="stylesheet" href="../../css/user.css" media="all" />
</head>
<body class="childrenBody">
<?php
	$question1=$_REQUEST['question1'];
	$question2=$_REQUEST['question2'];
	$question3=$_REQUEST['question3'];
	$answer1=$_REQUEST['answer1'];
	$answer2=$_REQUEST['answer2'];
	$answer3=$_REQUEST['answer3'];
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	
	$sql = "UPDATE register_info SET question1='{$question1}',question2='{$question2}',question3='{$question3}',answer1='{$answer1}',answer2='{$answer2}',answer3='{$answer3}' WHERE name='{$_SESSION['username']}'";
	if(mysqli_query($conn,$sql)){
?>
		<script type="text/javascript">
			alert ("提交成功！");
			window.location.href="userinfo.php";
		</script>
<?php	
	}else {
?>
		<script type="text/javascript">
			alert ("提交失败！");
			window.location.href="pass_ques_set.html";
		</script>
<?php
	}
     //释放记录集所占用的内存   
	mysqli_close($conn);
?>
</body>
</html>
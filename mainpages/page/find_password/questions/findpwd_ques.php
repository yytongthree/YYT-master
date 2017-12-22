<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
<meta charset="utf-8"/>
<title>密保找回</title>
<meta name="keywords"  content="设置关键词..." />
<meta name="description" content="设置描述..." />
<meta name="author" content="DeathGhost" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name='apple-touch-fullscreen' content='yes'>
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="address=no">
<link rel="icon" href="mainpages/images/icon/favicon.ico" type="mainpages/x-icon">
<link rel="stylesheet" type="text/css" href="../../../css/style.css" />
<script src="../../../js/jquery.js"></script>
<script src="../../../js/pages/findpwd_test.js"></script>
</head>
<body class="login-page">
	<section class="login-contain">
		<header>
			<h1>密保找回</h1>
			<p>Find the password by email</p>
		</header>
<?php
		$username=$_REQUEST['username'];
		setcookie('username',$username,time()+1800);
		if(empty($username)){
?>
		<script type="text/javascript">
			alert ("用户不能为空！");
			window.location.href="findpwd_ques.html";
		</script>
<?php
	}
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	if($_COOKIE['username']){
		$sql = "SELECT * FROM register_info WHERE name='{$_COOKIE['username']}'"; 
	}else{
		$sql = "SELECT * FROM register_info WHERE name='{$username}'"; 
	}
	$result = mysqli_query($conn,$sql) or die("Error in query: $sql. ".mysqli_error()); 
	 if(mysqli_num_rows($result)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
         while($row=mysqli_fetch_array($result)){
			 $question1=$row['question1'];
			 $question2=$row['question2'];
			 $question3=$row['question3'];
		 }
	 }
	 if($question1 || $question2 || $question3){
?>
		<div class="form-content">
			<ul>
            	<h3 align="center"><font color="#FF0000">请在半小时内完成此次操作</font></h1>
				<li>
					<div class="form-group">
                    <form action="check.php" method="post" >
						<label class="control-label">密保问题1：<?php echo $question1; ?></label><br>
						<label class="control-label">答案：</label>
                        <input type="text" placeholder="答案1..." name="answer1" class="form-control form-underlined"/>
					</div>
				</li>
                <li>
					<div class="form-group">
					<form action="findpwd_test.php" method="post" >
						<label class="control-label">密保问题2：<?php echo $question2; ?></label><br>
						<label class="control-label">答案：</label>
                        <input type="text" placeholder="答案2..." name="answer2" class="form-control form-underlined"/>
					</div>
				</li>
                <li>
					<div class="form-group">
					<form action="findpwd_test.php" method="post" >
						<label class="control-label">密保问题3：<?php echo $question3; ?></label><br>
						<label class="control-label">答案：</label>
                        <input type="text" placeholder="答案3..." name="answer3" class="form-control form-underlined"/>
					</div>
				</li>
<?php 
	 }else{
?>
		<script type="text/javascript">
			alert ("未设置密保问题！");
			<?php
				setcookie('username',1,time()-3600);
			?>
			window.location.href="../findpwd_way.php";
		</script>
<?php } ?>
				<li>
                <p align="center">
					<button class="btn btn-lg" id="sub_btn">提交</button>
					</form>
					<a  href="findpwd_ques.html">
					<button class="btn btn-lg">更换用户名</button></a>
                    <a  href="../findpwd_way.php">
					<button class="btn btn-lg">换一种方法</button></a>
                    </p>
				</li>
			</ul>
		</div>
	</section> 
</body>
</html>

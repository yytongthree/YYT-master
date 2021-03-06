<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>重置密码</title>
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
<link rel="icon" href="../../images/icon/favicon.ico" type="mainpages/x-icon">
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<script src="../../js/jquery.js"></script>
<script src="../../js/pages/findpwd_test.js"></script>
</head>

<body class="login-page">
	<section class="login-contain">
		<header>
			<h1>重置密码</h1>
			<p>Reset the password</p>
		</header>
        <?php
			$email=$_GET['email'];
			$token=$_GET['token'];
			$username=$_GET['username'];
			if($email){
				setcookie('email',$email,time()+900);
				setcookie('token',$token,time()+900);
			}
			if($username){
				setcookie('username',$username,time()+900);
			}
		?>
		<div class="form-content">
			<ul>
				<form action="changepwd.php" method="post" >
					<li>
						<div class="form-group">
                        	<label class="control-label">新密码：</label>
							<input type="password" placeholder="新密码..." name="pwd" class="form-control form-underlined" id="pwd"/>
						</div>
					</li>
					<li>
						<div class="form-group">
							<label class="control-label">确认新密码：</label>
							<input type="password" placeholder="确认新密码..." name="re-pwd" class="form-control form-underlined" id="re-pwd"/>
						</div>
					</li>
					<li>
						<p align="center">
							<button class="btn btn-lg" id="sub_btn">提交</button>
						</p>
					</li>
					<li>
						<p align="center">
							<button type="reset" class="btn btn-lg">重置</button>
						</p>
					</li>
				</form>
			</ul>
		</div>
	</section>
    <script type="text/javascript" src="../../layui/layui.js"></script>
    <script type="text/javascript" src="../user/user.js"></script>
</body>
</html>
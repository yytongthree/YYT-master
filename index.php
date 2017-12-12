<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>用户登录</title>
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
<link rel="stylesheet" type="text/css" href="mainpages/css/style.css" />
<script src="mainpages/js/jquery.js"></script>
<script src="mainpages/js/public.js"></script>
<script src="mainpages/js/customScrollbar.min.js"></script>
<script src="mainpages/js/login.js"></script>
</head>
<body class="login-page">
	<section class="login-contain">
		<header>
			<h1>医养通系统</h1>
			<p>Your own family docter</p>
		</header>
		<div class="form-content">
			<ul>
				<li>
					<div class="form-group">
					<form action="enter.php" method="post" >
						<label class="control-label">用户账号：</label>
                        <?php
							if(isset($_COOKIE["name"])){
						?>
                        		<input type="text" value="<?php echo $_COOKIE["name"];?>" placeholder="用户账号..." name="adminName" class="form-control form-underlined" id="adminName"/>
                        <?php
							}else{
						?>
								<input type="text" placeholder="用户账号..." name="adminName" class="form-control form-underlined" id="adminName"/>
                        <?php } ?>
					</div>
				</li>
				<li>
					<div class="form-group">
						<label class="control-label">用户密码：</label>
                        <?php
							if(isset($_COOKIE["password"])){
						?>
                        <input type="password" value="<?php echo $_COOKIE["password"];?>" placeholder="用户密码..." name="adminPwd" class="form-control form-underlined" id="adminPwd"/>
                         <?php
							}else{
						?>
						<input type="password" placeholder="用户密码..." name="adminPwd" class="form-control form-underlined" id="adminPwd"/>
                        <?php } ?>
					</div>
				</li>
				<li>
                <p align="center">
					<label class="check-box">
                    <?php
							if($_COOKIE['remember'] == 1){
					?>
                        		<input type="checkbox" name="remember" value="1" checked>
					<?php 
								}else{
					?>
                        <input type="checkbox" name="remember" value="1"/>
                     <?php } ?>
						<span>记住密码</span>
					</label>
                    <label class="check-box">
						<input type="checkbox" name="remember" value="2"/>
						<span>自动登录</span>
					</label>
				</li>
				<li>
                <p align="center">
					<button class="btn btn-lg" id="entry">立即登录</button>
					</form>
					<a  href="register.html">
					<button class="btn btn-lg">立即注册</button></a>
				</li>
                <li>
                <p align="center">
					<a  href="register.html">忘记密码？</a>
				</li>
				<li>
					<p class="btm-info">©Copyright 2006-2010 <a href="#" target="_blank" title="DeathGhost">DeathGhost.cn</a></p>
					<address class="btm-info">四川省成都市武侯区</address>
				</li>
			</ul>
		</div>
	</section>
</body>
</html>

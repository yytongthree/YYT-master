<?php session_start();?>
<html>
<head>
	<meta charset="utf-8">
	<title>更改密保问题</title>
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
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
		if (!$conn){
			die('Could not connect: ' . mysqli_error());
		}
	
	$query = "SELECT * FROM register_info WHERE name='{$_SESSION['username']}'"; 
	//执行SQL语句  
	$result = mysqli_query($conn,$query) or die("Error in query: $query. ".mysqli_error());  
	//显示返回的记录集行数  
	if(mysqli_num_rows($result)>0){  
    	//如果返回的数据集行数大于0，则开始以表格的形式显示   
    	while($row=mysqli_fetch_array($result)){ 
			
		}
	}
?>
	<form action="changeques.php" method="post" class="layui-form">
		<div class="user_left">
			<div class="layui-form-item">
			    <label class="layui-form-label">密保问题1：</label>
			    <div class="layui-input-block">
			    	<select name="question1" lay-verify="">
						<option value="">请选择一个问题</option>
						<option value="我的真实姓名？">我的真实姓名？</option>
						<option value="我的签约医生是谁？">我的签约医生是谁？</option>
						<option value="我的年龄？">我的年龄？</option>
                        <option value="我老伴的名字？">我老伴的名字？</option>
                        <option value="我老伴的年龄？">我老伴的年龄？</option>
                        <option value="我的家庭地址？">我的家庭地址？</option>
                        <option value="我有几个孩子？">我有几个孩子？</option>
                        <option value="我的儿子/女儿在哪儿工作？">我的儿子/女儿在哪儿工作？</option>
                        <option value="我正在做/退休前的工作？">我正在做/退休前的工作？</option>
                        <option value="我的电话？">我的电话？</option>
					</select>
			    </div>
			</div>
            <div class="layui-form-item">
			    <label class="layui-form-label">答案：</label>
			    <div class="layui-input-block">
			    	<input type="text" name="answer1" class="layui-input">
			    </div>
			</div>
            <div class="layui-form-item">
			    <label class="layui-form-label">密保问题2：</label>
			    <div class="layui-input-block">
			    	<select name="question2" lay-verify="">
						<option value="">请选择一个问题</option>
						<option value="我的真实姓名？">我的真实姓名？</option>
						<option value="我的签约医生是谁？">我的签约医生是谁？</option>
						<option value="我的年龄？">我的年龄？</option>
                        <option value="我老伴的名字？">我老伴的名字？</option>
                        <option value="我老伴的年龄？">我老伴的年龄？</option>
                        <option value="我的家庭地址？">我的家庭地址？</option>
                        <option value="我有几个孩子？">我有几个孩子？</option>
                        <option value="我的儿子/女儿在哪儿工作？">我的儿子/女儿在哪儿工作？</option>
                        <option value="我正在做/退休前的工作？">我正在做/退休前的工作？</option>
                        <option value="我的电话？">我的电话？</option>
					</select>
			    </div>
			</div>
            <div class="layui-form-item">
			    <label class="layui-form-label">答案：</label>
			    <div class="layui-input-block">
			    	<input type="text" name="answer2" class="layui-input">
			    </div>
			</div>
            <div class="layui-form-item">
			    <label class="layui-form-label">密保问题3：</label>
			    <div class="layui-input-block">
			    	<select name="question3" lay-verify="">
						<option value="">请选择一个问题</option>
						<option value="我的真实姓名？">我的真实姓名？</option>
						<option value="我的签约医生是谁？">我的签约医生是谁？</option>
						<option value="我的年龄？">我的年龄？</option>
                        <option value="我老伴的名字？">我老伴的名字？</option>
                        <option value="我老伴的年龄？">我老伴的年龄？</option>
                        <option value="我的家庭地址？">我的家庭地址？</option>
                        <option value="我有几个孩子？">我有几个孩子？</option>
                        <option value="我的儿子/女儿在哪儿工作？">我的儿子/女儿在哪儿工作？</option>
                        <option value="我正在做/退休前的工作？">我正在做/退休前的工作？</option>
                        <option value="我的电话？">我的电话？</option>
					</select>
			    </div>
			</div>
            <div class="layui-form-item">
			    <label class="layui-form-label">答案：</label>
			    <div class="layui-input-block">
			    	<input type="text" name="answer3" class="layui-input">
			    </div>
			</div>
		</div>
        <div class="layui-form-item" style="margin-left: 5%;">
		    <div class="layui-input-block">
		    	<button class="layui-btn" type="submit">立即提交</button>
				<button type="reset" class="layui-btn layui-btn-primary">重置</button>
		    </div>
		</div>
	</form>
    <div class="layui-form-item" style="margin-left: 5%;">
		<div class="layui-input-block">
			<a href="userinfo.php" class="layui-btn">取消</a>
		</div>
	</div>
	<script type="text/javascript" src="../../layui/layui.js"></script>
	<script type="text/javascript" src="address.js"></script>
	<script type="text/javascript" src="user1.js"></script>
</body>
</html>
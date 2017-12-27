<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>修改用户信息</title>
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
  	$authority=$_REQUEST["authority"];
	$ID=$_REQUEST["ID"];
    $conn=mysqli_connect("localhost","root","wenny673","yyt_info"); 
	// 检查连接 
	if (!$conn) 
	{ 
    	die("连接错误: " . mysqli_connect_error()); 
	}
	switch($authority)
		{
			case "非签约用户":{
	?>	<form action="modify1.php" method="post" class="layui-form" style="width:70%;">
	<?php
		$sql = "select * from register_info where ID='{$ID}'";
		echo $sql;
		$res = mysqli_query($conn,$sql);//echo $res;
		//循环取出数据
		if(mysqli_num_rows($res)>0){ //层数2--
		while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){ //层数3--
			echo(empty($row['province']));
			echo $row['city'];
			echo $row['area'];
		
		//mysqli_free_result($res); 
		//mysqli_close ( $conn );
		?>
           <div class="user_left">
			<div class="layui-form-item">
			    <label class="layui-form-label">用户名</label>
			    <div class="layui-input-block">
			    	<input type="text" name="name" value="<?php echo $row['name'];?>" placeholder="请输入用户名" lay-verify="required" class="layui-input">
			    </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">真实姓名</label>
			    <div class="layui-input-block">
			    	<input type="text"  placeholder="请输入真实姓名" value="<?php echo $row['truename'];?>" lay-verify="required" name="truename" id="truename" class="layui-input layui-disabled">
			    </div>
			</div>
			<div class="layui-form-item" pane="">
			    <label class="layui-form-label">性别</label>
			    <div class="layui-input-block">
                <?php
					if($row['sex']=="男"){
				?>
			    		<input type="radio" name="sex" id="sex" value="男" title="男" checked="">
	     				<input type="radio" name="sex" id="sex" value="女" title="女">
                 <?php
					}else{
						if($row['sex']=="女"){
				?>
                            <input type="radio" name="sex" id="sex" value="男" title="男">
	     					<input type="radio" name="sex" id="sex" value="女" title="女" checked="">
                <?php
						}
					}
				?>
			    </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">手机号码</label>
			    <div class="layui-input-block">
			    	<input type="tel" placeholder="请输入手机号码" name="num" value="<?php echo $row['num'];?>"id="tel" lay-verify="required|phone" class="layui-input">
			    </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">出生日期</label>
			    <div class="layui-input-block">
			    	<input type="text" name= "birth" value="<?php echo $row['birthdate'];?>" placeholder="请输入出生日期" lay-verify="required|date" onclick="layui.laydate({elem: this,max: laydate.now()})" class="layui-input birthdate">
			    </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">家庭住址</label>
			    <div class="layui-input-inline">
	                <select name="province" lay-filter="province" id="province">
                    <?php
					if(empty($row['province'])){
					?>
	                    <option value="">请选择省</option>
                    <?php
					}else{
					?>
						<option value="<?php echo $row['province'];?>"><?php echo $row['province'];?></option>
                    <?php } ?>
	                </select>
	            </div>
	            <div class="layui-input-inline">
	                <select name="city" lay-filter="city" id="city">
                    <?php
					if(empty($row['city'])){
					?>
	                    <option value="">请选择市</option>
                    <?php
					}else{
					?>
                    <option value="<?php echo $row['city'];?>"><?php echo $row['city'];?></option>
                    <?php } ?>
	                </select>
	            </div>
	            <div class="layui-input-inline">
	                <select name="area" lay-filter="area"  id="area">
                    <?php
					if(empty($row['area'])){
					?>
	                    <option value="">请选择县/区</option>
                    <?php
					}else{
					?>
                    <option value="<?php echo $row['area'];?>"><?php echo $row['area'];?></option>
                    <?php } ?>
	                </select>
	            </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">邮箱</label>
			    <div class="layui-input-block">
			    	<input type="text" placeholder="请输入邮箱" name="email" value="<?php echo $row['email'];?>" lay-verify="required|email" class="layui-input">
			    </div>
			</div>
            <div class="layui-form-item" pane="">
			    <label class="layui-form-label">用户权限</label>
			    <div class="layui-input-block">
                 <?php
					if($authority=="非签约用户"){
				?>
			    		<input type="radio" name="authority" value="1" title="非签约用户" checked="">
	     				<input type="radio" name="authority" value="2" title="签约用户">
	     				<input type="radio" name="authority" value="3" title="医生">
                        <?php
					}else{if($authority=="签约用户"){
				?>
			    		<input type="radio" name="authority" value="1" title="非签约用户" >
	     				<input type="radio" name="authority" value="2" title="签约用户" checked="">
	     				<input type="radio" name="authority" value="3" title="医生">
                        <?php
					}
					else{
						?>
                        <input type="radio" name="authority" value="1" title="非签约用户" >
	     				<input type="radio" name="authority" value="2" title="签约用户" >
	     				<input type="radio" name="authority" value="3" title="医生" checked="">
                        <?php
					}
		}
		?>
			</div>
			</div>
            <div class="layui-form-item">
			<div class="layui-input-block">
				<button class="layui-btn" lay-submit="" lay-filter="">立即提交</button>
				<button type="reset" class="layui-btn layui-btn-primary">重置</button>
		    </div>
		</div>
            </form>
<?php 
		}
			}
			}
			
		/*mysqli_free_result($res); 
		
		case "签约用户":{//1
	?>	<form action="modify2.php" method="post" class="layui-form" style="width:70%;">
	<?php
		$sql1 = "select truename from register_info WHERE ID='{$checkbox}' ";
		$res1 = mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_array($res1,MYSQLI_ASSOC);
		$sql2 = "select * from inha_info WHERE name='{$row1['truename']}'";
		$res2 = mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_array($res2,MYSQLI_ASSOC);
		if(mysqli_num_rows($res1)>0){ //2
		while($row=mysqli_fetch_array($res2,MYSQLI_ASSOC)){ //3
				?>
     <div class="layui-form-item">
			<label class="layui-form-label">姓名</label>
			<div class="layui-input-block">
				<input type="text" name="name" id="name" class="layui-input userName" lay-verify="required" placeholder="请输入姓名">
			</div>
		</div>
        <div class="layui-form-item">
			<div class="layui-inline">
			    <label class="layui-form-label">性别</label>
			    <div class="layui-input-block userSex">
			      	<input type="radio" name="sex" value="男" title="男" checked>
			      	<input type="radio" name="sex" value="女" title="女">
			    </div>
		    </div>
          <div class="layui-form-item">
			<label class="layui-form-label">年龄</label>
			<div class="layui-input-block">
				<input type="text" name="age" value="<?php echo $row['age'];?>" id="age" class="layui-input userAge" lay-verify="required" placeholder="请输入年龄">
			</div>
		</div>  
		<div class="layui-form-item">
			<label class="layui-form-label">联系电话</label>
			<div class="layui-input-block">
				<input type="text"  name="num" value="<?php echo $row['num'];?>" id="num" class="layui-input userTel" lay-verify="tel" placeholder="请输入有效电话号码">
			</div>
		</div>
        <div class="layui-form-item">
			<label class="layui-form-label">居住地址</label>
			<div class="layui-input-block">
				<input type="text" name="addr" value="<?php echo $row['addr'];?>" id="addr" class="layui-input userAddr"   lay-verify="addr" placeholder="请输入您的居住地址">
			</div>
		</div>
        <div class="layui-form-item">
			<label class="layui-form-label">身高</label>
			<div class="layui-input-block">
				<input type="text"  name="height" value="<?php echo $row['height'];?>" id="height" class="layui-input" lay-verify="" placeholder="请输入身高，单位：m">
			</div>
		</div>
        <div class="layui-form-item">
			<label class="layui-form-label">体重</label>
			<div class="layui-input-block">
				<input type="text" name="weight"  value="<?php echo $row['weight'];?>"id="weight" class="layui-input userAddr"   lay-verify="addr" placeholder="请输入体重（单位：kg）">
			</div>
		</div>
        <div class="layui-form-item">
			<label class="layui-form-label">BMI指数</label>
			<div class="layui-input-block">
				<input type="text" name="TZZS"  value="<?php echo $row['TZZS'];?>" id="TZZS" class="layui-input userAddr"   lay-verify="addr" placeholder="体重与身高平方的比值">
			</div>
		</div>
		   <div class="layui-form-item">
			<label class="layui-form-label">心率</label>
			<div class="layui-input-block">
				<input type="text" name="HR" value="<?php echo $row['HR'];?>" id="HR" class="layui-input userAddr"   lay-verify="addr" placeholder="静息心率">
			</div>
		</div>
		<div class="layui-form-item">
			<label class="layui-form-label">血压</label>
			<div class="layui-input-block">
				<input type="text" name="BP" value="<?php echo $row['BP'];?>" id="BP" class="layui-input userAddr"   lay-verify="addr" placeholder="动脉血压">
			</div>
		</div>
        <div class="layui-form-item">
			<label class="layui-form-label">血脂</label>
			<div class="layui-input-block">
				<input type="text" name="BG"  value="<?php echo $row['BG'];?>"id="BG" class="layui-input userAddr"   lay-verify="addr" placeholder="血脂">
			</div>
		</div>
<?php 
		}
	}
	}
		mysqli_free_result($res); 
	?>
			</div>
			</div>
            <div class="layui-form-item">
			<div class="layui-input-block">
				<button class="layui-btn" lay-submit="" lay-filter="">立即提交</button>
				<button type="reset" class="layui-btn layui-btn-primary">重置</button>
		    </div>
		</div>
            </form>
	<?php 
		/*case "医生":{
			echo 1;
			?>	<form action="modify3.php" method="post" class="layui-form" style="width:70%;">
	<?php
		$sql1 = "select truename from register_info WHERE ID='{$checkbox}' ";
		$res1 = mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_array($res1,MYSQLI_ASSOC);
		$sql2 = "select * from docter_info WHERE name='{$row1['truename']}'";
		$res2 = mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_array($res2,MYSQLI_ASSOC);
		if(mysqli_num_rows($res2)>0){ //层数2--
				while($row=mysqli_fetch_array($res2,MYSQLI_ASSOC)){ //3
		?>
        	<div class="layui-form-item">
			<label class="layui-form-label">姓名</label>
			<div class="layui-input-block">
				<input type="text" name="name" value="<?php echo $row['name'];?>" id="name" class="layui-input userName" lay-verify="required" placeholder="请输入该医生的姓名">
			</div>
		</div>
        <div class="layui-form-item" pane="">
			    <label class="layui-form-label">性别</label>
			    <div class="layui-input-block">
                <?php
					if($row['sex']=="男"){
				?>
			    		<input type="radio" name="sex" id="sex" value="男" title="男" checked="">
	     				<input type="radio" name="sex" id="sex" value="女" title="女">
                 <?php
					}else{
						if($row['sex']=="女"){
				?>
                            <input type="radio" name="sex" id="sex" value="男" title="男">
	     					<input type="radio" name="sex" id="sex" value="女" title="女" checked="">
                <?php
						}
					}
				?>
			    </div>
			</div>
          <div class="layui-form-item">
			<label class="layui-form-label">年龄</label>
			<div class="layui-input-block">
				<input type="text" name="age" value="<?php echo $row['age'];?>" id="age" class="layui-input userAge" lay-verify="required" placeholder="请输入年龄">
			</div>
		</div>  
		<div class="layui-form-item">
			<label class="layui-form-label">联系电话</label>
			<div class="layui-input-block">
				<input type="text" class="layui-input userTel"  name="num" value="<?php echo $row['num'];?>"id="num" lay-verify="tel" placeholder="请输入有效电话号码">
			</div>
		</div>
        <div class="layui-form-item">
			<label class="layui-form-label">擅长科目</label>
			<div class="layui-input-block">
				<input type="text" name="GS" value="<?php echo $row['GS'];?>"id="GS" class="layui-input userPassword" lay-verify="password" placeholder="请输入该医生擅长的科目">
			</div>
		</div>
      <div class="layui-form-item">
			<label class="layui-form-label">负责区域</label>
			<div class="layui-input-block">
				<input type="text" name="RA" value="<?php echo $row['RA'];?>"id="RA" class="layui-input userPassword" lay-verify="password" placeholder="请输入该医生负责的辖区">
			</div>
		</div>
        <div class="layui-form-item">
			<label class="layui-form-label">获奖状况</label>
			<div class="layui-input-block">
				<input type="text" name="awards" value="<?php echo $row['awards'];?>" id="awards" class="layui-input userPassword" lay-verify="password" placeholder="请输入该医生的获奖状况">
			</div>
		</div>
        <div class="layui-form-item">
			<label class="layui-form-label">签约人数</label>
			<div class="layui-input-block">
				<input type="text" name="SN" value="<?php echo $row['SN'];?>" id="SN" class="layui-input userAddr"   lay-verify="addr" placeholder="请输入该医生的签约人数">
			</div>
		</div>
        <?php
		}
			}
		//}
	mysqli_free_result($res); 
		mysqli_close ( $conn );
		
		?>
        <div class="layui-form-item">
			<div class="layui-input-block">
				<button class="layui-btn" lay-submit="" lay-filter="">立即提交</button>
				<button type="reset" class="layui-btn layui-btn-primary">重置</button>
		    </div>
		</div>
	</form>
    <?php
		*/
		}
	?>
	<script type="text/javascript" src="../../layui/layui.js"></script>
	<script type="text/javascript" src="../user/address.js"></script>
	<script type="text/javascript" src="../user/user.js"></script>

</body>
</html>
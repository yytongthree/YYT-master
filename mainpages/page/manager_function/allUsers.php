<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>查看所有用户</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="../../layui/css/layui.css"media="all" />
	<link rel="stylesheet" href="//at.alicdn.com/t/font_tnyc012u2rlwstt9.css" media="all" />
	<link rel="stylesheet" href="../../css/user.css" media="all" />
</head>
<body class="childrenBody">
	<blockquote class="layui-elem-quote news_search">
		<div class="layui-inline">
		    <div class="layui-input-inline">
		    	<input type="text" value="" placeholder="请输入关键字" class="layui-input search_input">
		    </div>
		    <a class="layui-btn search_btn">查询</a>
		</div>
		<div class="layui-inline">
			<form  action="addUser.php" method="post"> 
			<button type="submit" class="layui-btn layui-btn-normal">添加用户</button>
 			</form>
		</div>
		<div class="layui-inline">
			<form  action="delete.php" method="post"> 
			<button type="submit" class="layui-btn layui-btn-normal layui-btn-warm">删除用户</button>
 			</form>
		</div>
	</blockquote>
	<div class="layui-form users_list">
	<table class="layui-table">
     <form  action="userDetail.php" method="post"> 
		   <col width="50">
				<col width="14%"><!--登录名-->
				<col width="12%"><!--姓名-->
				<col width="8%"><!--性别-->
				<col width="8%"><!--年龄-->
				<col width="12%"><!--用户身份-->
                <!--<col width="6%">操作-->
		    </colgroup>
		  
           <thead>
				<tr>
                	<th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose" id="allChoose">全选</th>
                    <th>登录名</th>
					<th>姓名</th>
					<th>性别</th>
					<th>年龄</th>
                    <th>用户身份</th>
                    <th>操作</th>
				</tr> 
		    </thead>

	</div> 
<?php

	$conn=mysqli_connect("localhost","root","wenny673","yyt_info") or die("Unable to connect!");
	function showTable($conn,$table_name){ 
		$sql = "select * from $table_name";
		$res = mysqli_query($conn,$sql);
		//循环取出数据
		if(mysqli_num_rows($res)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
			while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){ 
				echo "<tr>";
?>
<td><input type="checkbox" name="checkbox" value="<?php echo $row['ID'];?>" lay-skin="primary" ></td>
<?php
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['truename']."</td>";
					echo "<td>".$row['sex']."</td>";
					echo "<td>".$row['age']."</td>";
echo "<td>";switch($row['authority'])
						{
						 case"1":{
						?>
                        <strong><input type="text" name="authority" value="<?php echo "非签约用户";?>" class="layui-disabled" lay-skin="primary" ></strong>
						 <?php
                         break;}
						 case"2":{
						?>
                        <strong><input type="text" name="authority" value="<?php echo "签约用户";?>" class="layui-disabled" lay-skin="primary" ></strong>
						 <?php
                         break;}
						case"3":{
						?>
                        <strong><input type="text" name="authority" value="<?php echo "医生";?>" class="layui-disabled" lay-skin="primary" ></strong>
						 <?php
                         break;}
						}
					?>
                   </td>

	<a  href="userDetail.php">
    <td><button class="layui-btn layui-btn-mini layui-btn-normal">查看详细资料</button></td>

<?php
				echo "</tr>";
			}
		mysqli_free_result($res); 
		}
	}
	showTable($conn,"register_info");
	mysqli_close($conn);
 ?>
 </form>
</table>
<div id="page"></div>
	<script type="text/javascript" src="../../layui/layui.js"></script>
	<script type="text/javascript" src="allUsers.js"></script>
</body>
</html>
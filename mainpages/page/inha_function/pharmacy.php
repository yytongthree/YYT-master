<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="../../layui/css/layui.css" media="all" />
	<link rel="stylesheet" href="../../css/font_eolqem241z66flxr.css" media="all" />
	<link rel="stylesheet" href="../../css/news.css" media="all" />
<title>无标题文档</title>
</head>

<body>
<?php
	//连接数据库的参数  
     $host = "localhost";  
     $user = "root";  
     $pass = "wenny673";  
     $db = "yyt_info";  
     //创建一个mysql连接  
     $connection = mysqli_connect($host, $user, $pass,$db) or die("Unable to connect!");   
     //开始查询 
	 $query = "SELECT name FROM inha_info WHERE nickname='{$_SESSION['username']}'"; 
     //执行SQL语句  
     $result = mysqli_query($connection,$query) or die("Error in query: $query. ".mysqli_error());
     //显示返回的记录集行数  
     if(mysqli_num_rows($result)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
         while($row=mysqli_fetch_array($result)){ 
		 	 $uname=$row['name']; 
         }    
     }  
     //释放记录集所占用的内存  
     mysqli_free_result($result);
     $query = "SELECT MCD FROM prescription WHERE username='{$uname}' group by MCD"; 
     //执行SQL语句  
     $result = mysqli_query($connection,$query) or die("Error in query: $query. ".mysqli_error()); 
?>
	<blockquote class="layui-elem-quote news_search">
		<div class="layui-inline">
		    <div class="layui-input-inline">
            <form name="form1" enctype="multipart/form-data" method="post" action="">
		    	<select name="date" lay-verify="" class="layui-input">
  					<option value="">请选择一日期</option>
<?php
	 if(mysqli_num_rows($result)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
         while($row=mysqli_fetch_array($result)){
 ?>
   					<option value="<?php echo $row['MCD'];?>"><?php echo $row['MCD'];?></option>
 <?php
	 }
	 }
     //释放记录集所占用的内存  
     mysqli_free_result($result);  

	//关闭该数据库连接  
     mysqli_close($connection);  
 ?>
				</select>
		    </div>
		    <input type="submit" class="layui-btn" name="submit" value="查询">
            </form>
		</div>
        </blockquote>
	<div class="layui-form">
	  	<table class="layui-table">
		    <colgroup>
                <col width="10%">
                <col width="10%">
                <col width="50%">
                <col width="20%">
                <col width="10%">
                 </colgroup>
            <thead>
                 <tr>
					<th>药方名</th>
					<th>开方日期</th>
					<th>内容</th>
                    <th>注意事项</th>
                    <th>开方医生</th>
				</tr> 
		    </thead>
		    <tbody>
<?php

	$conn=mysqli_connect("localhost","root","wenny673","yyt_info") or die("Unable to connect!");
	function showTable($conn,$table_name){ 
		$date=$_POST['date'];
		//开始查询 
	 	$query = "SELECT name FROM inha_info WHERE nickname='{$_SESSION['username']}'"; 
     	//执行SQL语句  
     	$result = mysqli_query($conn,$query) or die("Error in query: $query. ".mysqli_error());
     	//显示返回的记录集行数  
     	if(mysqli_num_rows($result)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
         	while($row=mysqli_fetch_array($result)){ 
		 	 $uname=$row['name']; 
         	}    
     	}  
     	//释放记录集所占用的内存  
     	mysqli_free_result($result);
		$sql = "select * from $table_name where MCD='{$date}' and username='{$uname}'";
		$res = mysqli_query($conn,$sql);
		//循环取出数据
		if(mysqli_num_rows($res)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
			while($row=mysqli_fetch_array($res)){ 
				echo "<tr>";
					echo "<td>".$row['PN']."</td>";
					echo "<td>".$row['MCD']."</td>";
					echo "<td>".$row['content']."</td>";
					echo "<td>".$row['notes']."</td>";
					echo "<td>".$row['docter']."</td>";
				echo "</tr>";
			}
		mysqli_free_result($res); 
		}
	}
	showTable($conn,"prescription");
	mysqli_close($conn);
 ?>
            </tbody>         
		</table>
</body>
</html>
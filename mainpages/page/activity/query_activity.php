<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="../../css/font_eolqem241z66flxr.css" media="all" />
	<link rel="stylesheet" href="../../layui/css/layui.css" media="all" />
	<link rel="stylesheet" href="../../css/news.css" media="all" />
<title>无标题文档</title>
</head>

<body>
	<blockquote class="layui-elem-quote title"><big><b>社区医院活动</b></big></blockquote>
	<div class="layui-form">
	  	<table class="layui-table">
		    <colgroup>
                <col width="15%">
                <col width="10%">
                <col width="25%">
                 </colgroup>
            <thead>
                 <tr>
					<th>活动名称</th>
					<th>活动时间</th>
					<th>活动内容</th>
				</tr> 
		    </thead>
		    <tbody>
<?php

	$conn=mysqli_connect("localhost","root","wenny673","yyt_info") or die("Unable to connect!");
	function showTable($conn,$table_name){ 
		$sql = "select * from $table_name";
		$res = mysqli_query($conn,$sql);
		//循环取出数据
		if(mysqli_num_rows($res)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
			while($row=mysqli_fetch_array($res)){ 
				echo "<tr>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['time']."</td>";
					echo "<td>".$row['content']."</td>";
				echo "</tr>";
			}
		mysqli_free_result($res); 
		}
	}
	showTable($conn,"activity");
	mysqli_close($conn);
 ?>
            </tbody>         
		</table>
</body>
</html>
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
	<blockquote class="layui-elem-quote title"><big><b>药房库存管理</b></big></blockquote>
    <form class="layui-form" name="medicine_form" method="post" action="../medicine/add_medicine.html">
	<div class="layui-form">
	  	<table class="layui-table">
		    <colgroup>
                <col width="5%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                <col width="10%">
                 </colgroup>
            <thead>
                 <tr>
                 	<th>选择</th>
					<th>药名</th>
                    <th>库存数量</th>
                    <th>注意事项</th>
                    <th>管理</th>
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
?>
<td><input type="checkbox" name="checkbox" value="<?php echo $row['ID'];?>" lay-skin="primary"></td>
<?php
					echo "<td>".$row['MN']."</td>";
					echo "<td>".$row['count']."</td>";
					echo "<td>".$row['notes']."</td>";
?>
<td>
					<button class="layui-btn layui-btn-mini"><i class="iconfont icon-edit"></i>管理药品</button>
					</form>
					
		    </td>
<?php
				echo "</tr>";
			}
		mysqli_free_result($res); 
		}
	}
	showTable($conn,"medicine");
	mysqli_close($conn);
 ?>
            </tbody>         
		</table>
    <script type="text/javascript" src="../../layui/layui.js"></script>
	<script type="text/javascript" src="../news/newsList.js"></script>
</body>
</html>
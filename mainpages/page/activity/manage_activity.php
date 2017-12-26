<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="../../css/font_eolqem241z66flxr.css" media="all" />
	<link rel="stylesheet" href="../../layui/css/layui.css" media="all" />
	<link rel="stylesheet" href="../../css/news.css" media="all" />
    <script src="../news/mainpages/js/jquery.js"></script>
<title>无标题文档</title>
</head>
<body class="childrenBody">
	<blockquote class="layui-elem-quote title"><big><b>活动信息</b></big></blockquote>
   <form class="layui-form" name="comment_form" method="post" action="../news/delete_activity.php">
    <div class="layui-form-item">
	</div>
	  	<table class="layui-table">
        <tr><a href="activityAdd.html"  style='font-size:20px' class="layui-btn layui-btn-mini news_edit"><i class="iconfont icon-edit"></i> 添加活动</a></tr>
		    <colgroup>
            	<col width="5%">
                <col width="15%">
                <col width="15%">
                <col width="40%">
                <col width="15%">
                <col width="10%">
                 </colgroup>
            <thead>
                 <tr>
            <th>选择</th>
		    <th>活动名称</th>
		    <th>活动时间</th>
            <th>活动内容</th>
            <th>处理</th>
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
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['time']."</td>";
					echo "<td>".$row['content']."</td>";
?>
<td>
					<button class="layui-btn layui-btn-mini"><i class="iconfont icon-edit"></i>删除活动</button>
                     </form>
					
		    </td>
					
<?php
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
	<script type="text/javascript" src="../../layui/layui.js"></script>
	<script type="text/javascript" src="../news/newsList.js"></script>
</body>
</html>
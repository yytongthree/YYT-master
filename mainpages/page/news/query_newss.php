<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="../../layui/css/layui.css" media="all" />
	<link rel="stylesheet" href="../../css/font_eolqem241z66flxr.css" media="all" />
	<link rel="stylesheet" href="../../css/news.css" media="all" />
<title>查看文章</title>
</head>

<body>

		<div class="layui-form">
	  	<table class="layui-table">

		    <colgroup>
		<col width="5%">
                <col width="15%">
                <col width="15%">
                <col width="30%">
                <col width="15%">
                <col width="10%">
                 </colgroup>
            <thead>
                 <tr>
		    <th>选择</th>
		    <th>文章标题</th>
		    <th>文章作者</th>
		    <th>文章摘要</th>
                    <th>发布时间</th> 
                    <th>查看详情</th>
                    
		</tr> 
		    </thead>
		    <tbody>
   <form name="form1" method="post" action="query_newsc.php">

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
<td><input type="checkbox" name="checkbox" lay-skin="primary" value="<?php echo $row['ID'];?>"></td>
<?php
					echo "<td>".$row['newsName']."</td>";
					echo "<td>".$row['newsAuthor']."</td>";
					echo "<td>".$row['newsSum']."</td>";
					echo "<td>".$row['newsTime']."</td>";
?>

			<td>
					<button type="submit" class="layui-btn layui-btn-mini"><i class="iconfont icon-edit"></i>查看内容</button>

					
		    </td>
<?php
				echo "</tr>";
			}
		mysqli_free_result($res); 
		}
	}
	showTable($conn,"news");
	mysqli_close($conn);
 ?>
             					</form>  
            </tbody> 
      
		</table>
        <script type="text/javascript" src="../../layui/layui.js"></script>
	<script type="text/javascript" src="newsList.js"></script>
</body>
</html>
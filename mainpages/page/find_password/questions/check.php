<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
	$answer1=$_REQUEST['answer1'];
	$answer2=$_REQUEST['answer2'];
	$answer3=$_REQUEST['answer3'];
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	
	$username=$_COOKIE['username'];
	$sql = "SELECT * FROM register_info WHERE name='{$username}'"; 
	$result = mysqli_query($conn,$sql) or die("Error in query: $sql. ".mysqli_error()); 
	 if(mysqli_num_rows($result)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
         while($row=mysqli_fetch_array($result)){
			 $table_answer1=$row['answer1'];
			 $table_answer2=$row['answer2'];
			 $table_answer3=$row['answer3'];
		 }
	 }
	 if($answer1==$table_answer1&&$answer2==$table_answer2&&$answer3==$table_answer3){
		 ?>
		<script type="text/javascript">
			alert ("验证成功！");
			var url="<?php echo $username;?>";
			window.location.href="../reset.php?username="+url;
		</script>
<?php	
	}else {
?>
		<script type="text/javascript">
			alert ("验证失败！");
			var url="<?php echo $username;?>";
			window.location.href="findpwd_ques.php?username="+url;
		</script>
<?php
	}
     //释放记录集所占用的内存  
	mysqli_close($conn);
?>
</body>
</html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>无标题文档</title>
</head>

<body>
<?php
$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
$sql = "SELECT name,password FROM register_info WHERE email='wennyluo@qq.com'";
$result=mysqli_query($conn,$sql) or die("Error in query: $sql. ".mysqli_error());
if(mysqli_num_rows($result)>0){  
	$count=0;
	while($row=mysqli_fetch_array($result)){
		$uname=$row['name'];
		$password=$row['password'];
		$arr = array($uname,$password);
		$name_pass=implode(' ',$arr);
		$add = md5($name_pass);//组合验证码
		$check[]=$add;
		$count++;
	}
}
var_dump($check);
?>
</body>
</html>
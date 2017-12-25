<?php
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	//	插入管理员信息
	$sql="INSERT INTO manager_info (manager_ID,name,password,sex,age,addr,tel,authority) VALUES('001','Wolke','111111','女','20','新疆','3874110','4')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>成功插入管理员信息";
	} else {
		echo "<br>Error: 插入失败" . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
?>
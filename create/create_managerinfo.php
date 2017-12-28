<?php
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	$sql = "CREATE TABLE manager_info 
	(
		
		manager_ID int(11) unsigned NOT NULL primary key,
		name varchar(50) not null,
		sex varchar(10) not null,
		age int not null,
		tel varchar(11) not null,
		addr varchar(50),
		password varchar(33) not null,
		authority int(1) not null
		
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success1";
	} else {
		echo "<br>Error1:创建失败 " . $sql . "<br>" . mysqli_error($conn);
	}
	
	mysqli_close($conn);
?>

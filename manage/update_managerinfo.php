<?php
	$conn = mysqli_connect("localhost","root","wenny673");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	$sql = "ALTER TABLE manager_info MODIFY tel int(20) not null";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success1";
	} else {
		echo "<br>Error1:更新失败 " . $sql . "<br>" . mysqli_error($conn);
	}
	
	mysqli_close($conn);
?>

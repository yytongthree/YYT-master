<?php
	$conn = mysqli_connect("localhost","root","wenny673","yyt_chat");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	

	$sql = "UPDATE chat SET picture='http://localhost/YYT-master/mainpages/images/face.jpg' WHERE name='华佗'";
	if(mysqli_query($conn,$sql)){
		echo "success1";
	}
	
	$sql = "UPDATE chat SET picture='http://localhost/YYT-master/mainpages/images/face.jpg' WHERE name='wennyli'";
	if(mysqli_query($conn,$sql)){
		echo "success2";
	}

	mysqli_close($conn);
?>
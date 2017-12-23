<?php
	$conn = mysqli_connect("localhost","root","wenny673","yyt_chat");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	
	
	$sql = "CREATE TABLE chat 
	(
		ID int(11) unsigned NOT NULL AUTO_INCREMENT primary key,
		picture blob,
		name varchar(50) not null,
		content text not null,
		time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success1";
	} else {
		echo "<br>Error1: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO chat (name,content) VALUES('华佗','最近身体好些了吗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success1";
	} else {
		echo "<br>Error1: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>
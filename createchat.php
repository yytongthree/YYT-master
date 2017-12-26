<?php
	$conn = mysqli_connect("localhost","root","wenny673");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	if (mysqli_query($conn,"CREATE DATABASE yyt_chat"))
	{
		echo "<br>Database created";
	}
	else
	{
		echo "<br>Error creating database: " . mysqli_error();
	}
	mysqli_close($conn);
	
	$conn = mysqli_connect("localhost","root","wenny673","yyt_chat");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	$sql = "CREATE TABLE chat 
	(
		ID int(11) unsigned NOT NULL AUTO_INCREMENT primary key,
		picture blob,
		name varchar(50),
		content text,
		time timestamp
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success1";
	} else {
		echo "<br>Error1: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	mysqli_close($conn);
?>

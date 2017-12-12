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
	$sql = "CREATE TABLE login_info 
	(
		ID int(11) unsigned NOT NULL AUTO_INCREMENT primary key,
		nickname varchar(50) not null,
		truename varchar(50),
		sex varchar(10) not null,
		age int not null,
		picture blob
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success1";
	} else {
		echo "<br>Error1: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql = "CREATE TABLE message 
	(
		nickname varchar(50),
		words varchar(200),
		datetime timestamp not null,	
		picture blob
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success2";
	} else {
		echo "<br>Error2: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql = "CREATE TABLE appraise 
	(
		chat_ID int(11) unsigned NOT NULL primary key,
		name varchar(50) not null,
		content text,
		score int(3),
		picture blob
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success3";
	} else {
		echo "<br>Error3: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	mysqli_close($conn);
?>

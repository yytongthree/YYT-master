<?php
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	
	
	$sql = "CREATE TABLE register_info 
	(
		ID int(11) unsigned NOT NULL AUTO_INCREMENT primary key,
		name varchar(50) not null,
		password varchar(50) not null,
		truename varchar(50) not null,
		sex varchar(10) not null,
		birthdate date not null,
		age int not null,
		num varchar(11) not null,
		email text not null,
		province varchar(100),
		city varchar(50),
		area varchar(50),
		authority varchar(1),
		picture blob,
		getpasstime int(10),
		question1 text,
		question2 text,
		question3 text,
		answer1 text,
		answer2 text,
		answer3 text
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success1";
	} else {
		echo "<br>Error1: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>
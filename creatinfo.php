<?php
	$conn = mysqli_connect("localhost","root","wenny673");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	if (mysqli_query($conn,"CREATE DATABASE yyt_info"))
	{
		echo "<br>Database created";
	}
	else
	{
		echo "<br>Error creating database: " . mysqli_error();
	}
	mysqli_close($conn);
	
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
		age int not null,
		num varchar(11) not null,
		addr varchar(50),
		authority varchar(1),
		picture blob
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success1";
	} else {
		echo "<br>Error1: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql = "CREATE TABLE docter_info 
	(
		doc_ID int(11) unsigned NOT NULL primary key,
		name varchar(50) not null,
		sex varchar(10) not null,
		age int not null,
		num varchar(11) not null,
		GS varchar(100),
		awards varchar(100),
		RA varchar(100),
		SN int(5),	
		nickname varchar(50),
		picture blob
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success2";
	} else {
		echo "<br>Error2: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql = "CREATE TABLE inha_info 
	(
		inha_ID int(11) unsigned NOT NULL primary key,
		name varchar(50) not null,
		sex varchar(10) not null,
		age int not null,
		num varchar(11) not null,
		addr varchar(50),
		height int(3),
		weight int(3),
		TZZS int(10),
		HR int(10),
		BP varchar(10),
		BG int(10),
		BMD int(10),
		SS int(10),
		INPR int(10),
		hear int(10),
		nickname varchar(50),
		picture blob
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success3";
	} else {
		echo "<br>Error3: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql = "CREATE TABLE prescription 
	(
		username varchar(50) not null,
		PN varchar(100) not null,
		MCD date not null,
		content longtext,
		notes varchar(500),
		docter varchar(20)
	)";
	//PN为药方名称
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success4";
	} else {
		echo "<br>Error4: " . $sql . "<br>" . mysqli_error($conn);
	}
	
		$sql = "CREATE TABLE cookbook 
	(
		username varchar(50) not null,
		weekday varchar(10),
		notes varchar(500),
		content longtext,
		docter varchar(20)
	)";
	//CN为食谱名称
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success5";
	} else {
		echo "<br>Error5: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql = "CREATE TABLE timetable 
	(
		username varchar(50) not null,
		GUT time,
		s_name varchar(50),
		s_time time,
		EA varchar(100),
		ST time
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success6";
	} else {
		echo "<br>Error6: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql = "CREATE TABLE essay 
	(
		title varchar(50) not null,
		origin varchar(50) not null,
		content varchar(100)
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success7";
	} else {
		echo "<br>Error7: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql = "CREATE TABLE doc_inha 
	(
		doc_ID int(11) unsigned NOT NULL,
		doc_name varchar(50) not null,
		inha_ID int(11) unsigned NOT NULL ,
		inha_name varchar(50) not null
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success8";
	} else {
		echo "<br>Error8: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql = "CREATE TABLE diagnosis 
	(
		pation_ID int(11),
		symptom varchar(200),
		conclu varchar(100),
		diag_time date,
		doc_name varchar(20)
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success9";
	} else {
		echo "<br>Error9: " . $sql . "<br>" . mysqli_error($conn);
	}
	
		$sql = "CREATE TABLE medicine 
	(
		MN varchar(50),
		function varchar(500),
		tabu varchar(500),
		AR varchar(500),
		notes varchar(500),
		count varchar(20)
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success10";
	} else {
		echo "<br>Error10: " . $sql . "<br>" . mysqli_error($conn);
	}


	mysqli_close($conn);
?>

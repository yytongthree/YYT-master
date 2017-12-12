<?php
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	

	
	$sql = "CREATE TABLE ele_prescription 
	(
		NO varchar(10) not null,
		department varchar(50) not null,
		inha_name varchar(50) not null,
		sex varchar(10) not null,
		age int not null,
		fee_type varchar(20) not null,
		addr varchar(100) not null,
		num varchar(11) not null,
		pri_diagnosis longtext not null,
		year int(4) not null,
		month int not null,
		day int not null,
		rp longtext not null,
		doc_name varchar(50) not null,
		dispensing_doc varchar(50) not null,
		check_doc varchar(50) not null,
		medical_advice longtext
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success7";
	} else {
		echo "<br>Error7: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>
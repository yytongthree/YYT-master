<?php
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	
	
	$sql = "CREATE TABLE docter_info 
	(
		ID int(11) unsigned NOT NULL AUTO_INCREMENT primary key,
		doc_ID int(11) unsigned NOT NULL,
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
		ID int(11) unsigned NOT NULL AUTO_INCREMENT primary key,
		inha_ID int(11) unsigned NOT NULL,
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
	
	$sql="INSERT INTO docter_info (doc_ID,name,sex,age,num,GS,awards,RA,SN) VALUES('30001','华佗','男','50','12345678910','外科','神医','武侯区','8')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success1";
	} else {
		echo "<br>Error1: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO docter_info (doc_ID,name,sex,age,num,GS,awards,RA,SN) VALUES('30002','扁鹊','男','40','12345678910','内科','医圣','双流区','8')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success2";
	} else {
		echo "<br>Error2: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO inha_info (inha_ID,name,sex,age,num,addr,height,weight,TZZS,HR,BP,BG,BMD,SS,INPR,hear) VALUES('20001','曹操','男','45','12345678910','魏国','180','60','18.5','90','95/65','4.5','0','5.2','16','15')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success3";
	} else {
		echo "<br>Error3: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO inha_info (inha_ID,name,sex,age,num,addr,height,weight,TZZS,HR,BP,BG,BMD,SS,INPR,hear) VALUES('20002','蔡恒公','男','45','12345678910','蔡国','180','60','18.5','90','95/65','4.5','0','5.2','16','15')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success4";
	} else {
		echo "<br>Error4: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO inha_info (inha_ID,name,sex,age,num,addr,height,weight,TZZS,HR,BP,BG,BMD,SS,INPR,hear) VALUES('20003','刘备','男','40','12345678910','蜀国','175','50','18.5','90','95/65','4.5','0.5','5.2','16','15')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success20";
	} else {
		echo "<br>Error20: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO inha_info (inha_ID,name,sex,age,num,addr,height,weight,TZZS,HR,BP,BG,BMD,SS,INPR,hear) VALUES('20004','秦襄王','男','60','12345678910','秦国','185','70','17','90','95/65','4.5','-0.5','5.2','16','15')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success21";
	} else {
		echo "<br>Error21: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>
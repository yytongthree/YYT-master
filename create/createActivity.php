<?php
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	$sql = "CREATE TABLE activity
	(
		ID int(11) unsigned NOT NULL AUTO_INCREMENT primary key,
		name varchar(50) not null,
		content longtext,
		time date not null
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success7";
	} else {
		echo "<br>Error7: " . $sql . "<br>" . mysqli_error($conn);
	}

	mysqli_close($conn);
?>
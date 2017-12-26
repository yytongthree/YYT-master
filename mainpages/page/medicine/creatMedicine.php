<?php
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	$sql = "CREATE TABLE medicine 
	(
		MN varchar(50),
		function varchar(500),
		tabu varchar(500),
		AR varchar(500),
		notes varchar(500),
		count varchar(20),
		mnTime date 
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success10";
	} else {
		echo "<br>Error10: " . $sql . "<br>" . mysqli_error($conn);
	}


	mysqli_close($conn);
?>

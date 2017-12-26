<?php
	$name=$_REQUEST["medicineName"];
	$time=$_REQUEST["medicineTime"];
	$amount=$_REQUEST["medicineamount"];
	$notes=$_REQUEST["notes"];
	
	$conn=mysqli_connect("localhost","root","wenny673","yyt_info"); 
	// 检查连接 
	if (!$conn) 
	{ 
    	die("连接错误: " . mysqli_connect_error()); 
	}
	$sql = "UPDATE medicine SET count='$amount',mnTime='$time' WHERE MN='$name'"; 
   	if(mysqli_query($conn,$sql)){
?>
		<script type="text/javascript"> 
    		alert("修改成功"); 
    		window.location.href="add_medicine.html"; 
 		</script>
<?php
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close ( $conn ); 
?>
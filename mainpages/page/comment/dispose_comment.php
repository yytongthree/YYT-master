<?php
	session_start(); 
	$content=$_REQUEST["content"];
	$ID=$_COOKIE['ID'];
	
	$conn=mysqli_connect("localhost","root","wenny673","yyt_info"); 
	// 检查连接 
	if (!$conn) 
	{ 
    	die("连接错误: " . mysqli_connect_error()); 
	}
	$sql = "UPDATE comment SET status=2,manageContent='$content' WHERE ID='{$ID}'"; 
   	if(mysqli_query($conn,$sql)){
		setcookie("ID",1,time()-3600);
?>
		<script type="text/javascript"> 
    		alert("留言回复成功"); 
    		window.location.href="manage_comment.php"; 
 		</script>
<?php
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close ( $conn ); 
?>
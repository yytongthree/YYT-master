<?php
	session_start();
	if($_GET['action']=='ok'){
		$content=$_POST['content'];	
		
		$conn = mysqli_connect("localhost","root","wenny673","yyt_chat");
		if (!$conn){
			die('Could not connect: ' . mysqli_error());
		}
		
		$sql = "INSERT INTO chat(name,content) VALUES ('{$_SESSION['username']}','$content')"; 
    	//执行SQL语句  
		if(mysqli_query($conn,$sql)){
			echo "1";
		}else {
			echo "0";
		} 
		mysqli_close($conn);
	}
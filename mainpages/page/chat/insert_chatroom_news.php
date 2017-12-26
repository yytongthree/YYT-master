<?php
	session_start();
	if($_GET['action']=='ok'){
		$content=$_POST['content'];	
		
		$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
		if (!$conn){
			die('Could not connect: ' . mysqli_error());
		}
		
		$sql = "SELECT picture FROM register_info WHERE name='{$_SESSION['username']}'"; 
    	$result = mysqli_query($conn,$sql) or die("Error in query: $sql. ".mysqli_error());  
    	//显示返回的记录集行数  
     	if(mysqli_num_rows($result)>0){  
			//如果返回的数据集行数大于0，则开始以表格的形式显示   
			while($row=mysqli_fetch_row($result)){ 
				$picture=$row[0];  
			}    
		 }  
     	//释放记录集所占用的内存  
		mysqli_free_result($result);
		mysqli_close($conn);
		
		$conn = mysqli_connect("localhost","root","wenny673","yyt_chat");
		if (!$conn){
			die('Could not connect: ' . mysqli_error());
		}
		
		$sql = "INSERT INTO chat(picture,name,content) VALUES ('$picture','{$_SESSION['username']}','$content')"; 
    	//执行SQL语句  
		if(mysqli_query($conn,$sql)){
			echo "1";
		}else {
			echo "0";
		} 
		mysqli_close($conn);
	}
?>
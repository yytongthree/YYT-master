<?php
	session_start();
    if($_GET['action']=='ok'){
		$arr=$_POST['arr'];	
		$data = json_decode(stripslashes($arr),true);
		$authority=$data['userauth'];
		$sex=$data['usersex'];
		$num=$data['usertel'];
		$birth=$data['userdate'];
		$addr=$data['addr'];
		$email=$data['email'];
		
		switch($authority){
			case "非签约用户":{
				$authority=1;
				break;
			}
			case "签约用户":{
				$authority=2;
				break;
			}
			case "医生":{
				$authority=3;
				break;
			}
			default:$authority=0;
		}
		
		function birthday($birthday){
  			$age = strtotime($birthday);
  			if($age === false){
    			return false;
  			}
  			list($y1,$m1,$d1) = explode("-",date("Y-m-d",$age));
  			$now = strtotime("now");
  			list($y2,$m2,$d2) = explode("-",date("Y-m-d",$now));
  			$age = $y2 - $y1;
  			if((int)($m2.$d2) < (int)($m1.$d1)){
    			$age -= 1;
			}
  			return $age;
		}
		$age=birthday($birth);
		
		$arr1=explode('_',$addr);
		$count=count($arr1);
	
		if($count>3){
			$province=$arr1[3];
			$city=$arr1[7];
			$area=$arr1[9];
			$addr=$province.$city.$area;
		}else{
			$province=$arr1[0];
			$city=$arr1[1];
			$area=$arr1[2];
			$addr=$province.$city.$area;
		}
		
		$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
		if (!$conn){
			die('Could not connect: ' . mysqli_error());
		}
		
		switch($authority){
			case "1":{
				$sql = "UPDATE register_info SET sex='$sex',birthdate='{$birth}',age='{$age}',num='{$num}',email='{$email}',province='{$province}',city='{$city}',area='{$area}' WHERE name='{$_SESSION['username']}'"; 
    	 		//执行SQL语句  
				if(mysqli_query($conn,$sql)){
					echo "1";
				}else {
					echo "0";
				}
				mysqli_close($conn);
				break;
			}
			case "2":{
				$sql = "UPDATE register_info SET sex='$sex',birthdate='{$birth}',age='{$age}',num='{$num}',email='{$email}',province='{$province}',city='{$city}',area='{$area}' WHERE name='{$_SESSION['username']}'"; 
				$sql1 = "UPDATE inha_info SET sex='$sex',age='{$age}',num='{$num}',addr='{$addr}' WHERE nickname='{$_SESSION['username']}'"; 
    	 		//执行SQL语句  
				if(mysqli_query($conn,$sql)&&mysqli_query($conn,$sql1)){
					echo "1";
				}else {
					echo "0";
				} 
				mysqli_close($conn);
				break;
			}
			case "3":{
				$sql = "UPDATE register_info SET sex='$sex',birthdate='{$birth}',age='{$age}',num='{$num}',email='{$email}',province='{$province}',city='{$city}',area='{$area}' WHERE name='{$_SESSION['username']}'"; 
				$sql1 = "UPDATE docter_info SET sex='$sex',age='{$age}',num='{$num}' WHERE nickname='{$_SESSION['username']}'"; 
    	 		//执行SQL语句  
				if(mysqli_query($conn,$sql)&&mysqli_query($conn,$sql1)){
					echo "1";
				}else {
					echo "0";
				}
				mysqli_close($conn);
				break;
			}
		}
	}
?>

<!doctype html> 
<?php    session_start(); ?>
<html> 
<head> 
<meta charset="UTF-8"> 
  <title>修改非签约用户信息</title> 
</head> 
<body> 
  <?php
    $name=$_REQUEST["name"]; 
	$truename=$_REQUEST["truename"];echo $truename;
	$sex=$_REQUEST["sex"];
	$birth=$_REQUEST["birth"];
	$num=$_REQUEST["num"];
	$email=$_REQUEST["email"];
	$province=$_REQUEST["province"];
	$city=$_REQUEST['city'];
	$area=$_REQUEST['area'];
	$authority=$_REQUEST["authority"];
	$age=birthday($birth);
	$arr1=explode('_',$province);
	$province=$arr1[3];
	$arr2=explode('_',$city);
	$city=$arr2[3];
	$arr3=explode('_',$area);
	$area=$arr3[1];
	$addr=$province.$city.$area;
	
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
  
    $conn=mysqli_connect("localhost","root","wenny673","yyt_info"); 
	// 检查连接 

	if (!$conn) 
	{ 
    	die("连接错误: " . mysqli_connect_error()); 
	} 
    echo  $truename;
	//查出对应用户名的信息 
	echo $sex;echo 00;
	$query="UPDATE register_info SET name ='{$name}',sex ='{$sex}',birthdate ='{$birth}',num ='{$num}',email ='{$email}',province ='{$province}',city ='{$city}',area ='{$area}',authority ='{$authority}' WHERE truename='{$truename}' ";
	 $result = mysqli_query($conn,$query) or die("Error in query: $query ".mysqli_error());
	 mysqli_close ( $conn ); 
  ?> 
  <script type="text/javascript"> 
									alert("更新成功"); 
									window.location.href="allUsers.php"; 
								</script>
</body> 
</html> 

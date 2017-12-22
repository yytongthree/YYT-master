<!doctype html> 
<?php    session_start(); ?>
<html> 
<head> 
<meta charset="UTF-8"> 
  <title>注册用户</title> 
</head> 
<body> 
  <?php
    $name=$_REQUEST["name"]; 
    $password=$_REQUEST["Pwd"]; 
	$truename=$_REQUEST["truename"];
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
    
    $dbname=null; 
    $result=mysqli_query($conn,"select * from register_info where name ='{$name}'");//查出对应用户名的信息 
    while ($row=mysqli_fetch_array($result)) {//while循环将$result中的结果找出来 
      $dbname=$row["name"]; 
    } 
		switch($authority)
		{
			case "1":{
				if(!is_null($dbname)){
  ?>
  				<script type="text/javascript"> 
    			alert("用户已存在"); 
   				window.location.href="register.html"; 
  				</script>
  <?php
				}else{
					$query="SELECT * FROM register_info WHERE truename='{$truename}'";
					$res=mysqli_query($conn,$query) or die("Error in query: $query. ".mysqli_error());
					if(mysqli_num_rows($res)>0){
?>
						<script type="text/javascript"> 
    						alert("用户已存在"); 
    						window.location.href="register.html"; 
 						</script>
<?php
					} else {
						$password=md5($password);
						$sql="INSERT INTO register_info (name,password,truename,sex,birthdate,age,num,email,province,city,area,authority) VALUES('{$name}','{$password}','{$truename}','{$sex}','{$birth}','{$age}','{$num}','{$email}','{$province}','{$city}','{$area}','{$authority}')";
   						if(mysqli_query($conn,$sql)){
							$_SESSION['username']=$name;
?>
							<script type="text/javascript"> 
    							alert("注册成功"); 
    							window.location.href="mainpages/index1.php"; 
 							</script>
<?php
						} else {
							echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}
					}
				}
				break;
			}
			case "2":{
				if(!is_null($dbname))
  			 	{
  ?>
  				<script type="text/javascript"> 
   				alert("用户已存在"); 
    			window.location.href="register.html"; 
 				</script>
  <?php
				}else{
					$query="SELECT * FROM register_info WHERE truename='{$truename}'";
					$res=mysqli_query($conn,$query) or die("Error in query: $query. ".mysqli_error());
					if(mysqli_num_rows($res)>0){
?>
						<script type="text/javascript"> 
    						alert("用户已存在"); 
    						window.location.href="register.html"; 
 						</script>
<?php
					} else {
						$dbtruename=null; 
   						$result1=mysqli_query($conn,"select * from inha_info where name ='{$truename}'");//查出对应用户名的信息 
    					while ($row=mysqli_fetch_array($result1)) {
      						$dbtruename=$row["name"]; 
    					} 
						if(is_null($dbtruename)){
?>
                    		<script type="text/javascript"> 
    							alert("该签约用户不存在"); 
    							window.location.href="register.html"; 
 							</script>
<?php
						}else{
							$password=md5($password);
							$sql="INSERT INTO register_info (name,password,truename,sex,birthdate,age,num,email,province,city,area,authority) VALUES('{$name}','{$password}','{$truename}','{$sex}','{$birth}','{$age}','{$num}','{$email}','{$province}','{$city}','{$area}','{$authority}')";
							$sql2="UPDATE inha_info SET sex='$sex',age='$age',num='$num',addr='$addr',nickname='$name' WHERE name='$truename'";
   							if(mysqli_query($conn,$sql)&&mysqli_query($conn,$sql2)){
								$_SESSION['username']=$name;
?>
								<script type="text/javascript"> 
									alert("注册成功"); 
									window.location.href="mainpages/index2.php"; 
								</script>
<?php
							} else {
								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}
						}
					}
				}
				break;
			}
			case "3":{
				if(!is_null($dbname)){
  ?>
  					<script type="text/javascript"> 
   						alert("用户已存在"); 
    					window.location.href="register.html"; 
  					</script>
  <?php
				}else{
					$query="SELECT * FROM register_info WHERE truename='{$truename}'";
					$res=mysqli_query($conn,$query) or die("Error in query: $query. ".mysqli_error());
					if(mysqli_num_rows($res)>0){
?>
						<script type="text/javascript"> 
    						alert("用户已存在"); 
    						window.location.href="register.html"; 
 						</script>
<?php
					} else {
						$dbtruename=null; 
   						$result2=mysqli_query($conn,"select * from docter_info where name ='{$truename}'");//查出对应用户名的信息 
    					while ($row=mysqli_fetch_array($result2)) {
      						$dbtruename=$row["name"]; 
    					} 
						if(is_null($dbtruename)){
?>
                   			<script type="text/javascript"> 
    							alert("该医生不存在"); 
    							window.location.href="register.html";
 							</script>
<?php
						}else{
							$password=md5($password);
							$sql="INSERT INTO register_info (name,password,truename,sex,birthdate,age,num,email,province,city,area,authority) VALUES('{$name}','{$password}','{$truename}','{$sex}','{$birth}','{$age}','{$num}','{$email}','{$province}','{$city}','{$area}','{$authority}')";
							$sql2="UPDATE docter_info SET sex='$sex',age='$age',num='$num',nickname='$name' WHERE name='$truename'";
   							if(mysqli_query($conn,$sql)&&mysqli_query($conn,$sql2)){
						 		$_SESSION['username']=$name;
?>
								<script type="text/javascript"> 
    								alert("注册成功"); 
    								window.location.href="mainpages/index3.php"; 
 								</script>
<?php
							} else {
								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}
						}
					}
				}
				break;
			}
		}
	 mysqli_close ( $conn ); 
  ?> 
</body> 
</html> 

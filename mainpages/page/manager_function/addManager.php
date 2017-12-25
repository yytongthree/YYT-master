<!doctype html> 
<?php    session_start(); ?>
<html> 
<head> 
<meta charset="UTF-8"> 
  <title>添加管理员</title> 
</head> 
<body> 
  <?php
    $manager_ID=$_REQUEST["manager_ID"]; 
	$name=$_REQUEST["name"]; 
	$sex=$_REQUEST["sex"];
	$age=$_REQUEST["age"];
	$tel=$_REQUEST["tel"];
	$addr=$_REQUEST["addr"];
	$authority=$_REQUEST["authority"];
	$password=$_REQUEST["password"];
  
    $conn=mysqli_connect("localhost","root","wenny673","yyt_info"); 
	// 检查连接 
	if (!$conn) 
	{ 
    	die("连接错误: " . mysqli_connect_error()); 
	} 
    
    $dbname=null; 
    $result=mysqli_query($conn,"select * from manager_info where name ='{$name}'");//查出对应用户名的信息 
    while ($row=mysqli_fetch_array($result)) {//while循环将$result中的结果找出来 
      $dbname=$row["name"]; 
    } 
				if(!is_null($dbtruename)){
					?>
                    <script type="text/javascript"> 
    				alert("该管理员已存在"); 
    				window.location.href="addManager.html"; 
 					</script>
                    <?php
				}else{
					$sql="INSERT INTO manager_info (manager_ID,name,sex,age,tel,addr,authority,password) VALUES('{$manager_ID}','{$name}','{$sex}','{$age}','{$tel}','{$addr}','{$authority}','password')";
   			if(mysqli_query($conn,$sql))
   					{
?>
					<script type="text/javascript"> 
    				alert("添加管理员成功"); 
    				window.location.href="addManager.html"; 
 					</script>
<?php
					} else {
					echo "Error:管理员添加失败 " . $sql . "<br>" . mysqli_error($conn);
					}
				}

	 mysqli_close ( $conn ); 
  ?> 
</body> 
</html> 

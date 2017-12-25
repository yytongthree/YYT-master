<!doctype html> 
<?php    session_start(); ?>
<html> 
<head> 
<meta charset="UTF-8"> 
  <title>添加签约用户</title> 
</head> 
<body> 
  <?php
    $inha_ID=$_REQUEST["inha_ID"]; 
	$name=$_REQUEST["name"];
	$sex=$_REQUEST["sex"];
	$age=$_REQUEST["age"];
	$num=$_REQUEST["num"];
	$addr=$_REQUEST["addr"];
	$height=$_REQUEST["height"];
	$weight=$_REQUEST["weight"];
	$TZZS=$_REQUEST["TZZS"];
	$HR=$_REQUEST["HR"];
	$BP=$_REQUEST["BP"];
	$BG=$_REQUEST["BG"];
  
    $conn=mysqli_connect("localhost","root","wenny673","yyt_info"); 
	// 检查连接 
	if (!$conn) 
	{ 
    	die("连接错误: " . mysqli_connect_error()); 
	} 
    $dbname=null; 
    $result=mysqli_query($conn,"select * from inha_info where name ='{$name}'");//查出对应用户名的信息 
    while ($row=mysqli_fetch_array($result)) {//while循环将$result中的结果找出来 
      $dbname=$row["name"]; 
    } 
				if(!is_null($dbname)){
					?>
                    <script type="text/javascript"> 
    				alert("该签约用户已存在"); 
    				window.location.href="addInha.html"; 
 					</script>
                    <?php
				}else{
					$sql="INSERT INTO inha_info (inha_ID,name,sex,age,num,addr,height,weight,TZZS,HR,BP,BG) VALUES('{$inha_ID}','{$name}','{$sex}','{$age}','{$num}','{$addr}','{$height}','{$weight}','{$TZZS}','{$HR}','{$BP}','{$BG}')";
   			if(mysqli_query($conn,$sql))
   					{
?>
					<script type="text/javascript"> 
    				alert("签约用户信息添加成功"); 
    				window.location.href="addInha.html"; 
 					</script>
<?php
					} else {
					echo "Error:签约用户添加失败 " . $sql . "<br>" . mysqli_error($conn);
					}
				}
	 mysqli_close ( $conn ); 
  ?> 
</body> 
</html> 

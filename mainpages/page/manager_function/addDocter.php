<!doctype html> 
<?php    session_start(); ?>
<html> 
<head> 
<meta charset="UTF-8"> 
  <title>添加医生</title> 
</head> 
<body> 
  <?php
    $doc_ID=$_REQUEST["doc_ID"]; 
	$name=$_REQUEST["name"]; 
	$sex=$_REQUEST["sex"];
	$age=$_REQUEST["age"];
	$num=$_REQUEST["num"];
	$GS=$_REQUEST["GS"];
	$awards=$_REQUEST["awards"];
	$RA=$_REQUEST["RA"];
	$SN=$_REQUEST["SN"];
	
    $conn=mysqli_connect("localhost","root","wenny673","yyt_info"); 
	// 检查连接 
	if (!$conn) 
	{ 
    	die("连接错误: " . mysqli_connect_error()); 
	} 
    
    $dbname=null; 
    $result=mysqli_query($conn,"select * from docter_info where name ='{$name}'");//查出对应用户名的信息 
    while ($row=mysqli_fetch_array($result)) {//while循环将$result中的结果找出来 
      $dbname=$row["name"]; 
    } 
				if(!is_null($dbname))
   				{
  ?>
  				<script type="text/javascript"> 
    			alert("该医生已存在"); 
   				window.location.href="addDocter.html"; 
  				</script>
  <?php
				}else{
					$sql="INSERT INTO docter_info (doc_ID,name,sex,age,num,GS,awards,RA,SN) VALUES('{$doc_ID}','{$name}','{$sex}','{$age}','{$num}','{$GS}','{$awards}','{$RA}','{$SN}')";
					
   			if(mysqli_query($conn,$sql))
   					{
?>
					<script type="text/javascript"> 
    				alert("添加医生成功"); 
    				window.location.href="addDocter.html"; 
 					</script>
<?php
					} else {
					echo "Error:添加医生失败 " . $sql . "<br>" . mysqli_error($conn);
					}
				}
	 mysqli_close ( $conn ); 
  ?> 
</body> 
</html> 

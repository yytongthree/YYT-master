<?php
$conn=mysqli_connect("localhost","root","wenny673","yyt_info") or die("Unable to connect!");
$sql = "SELECT * FROM register_info";  
$mysqli_result = $mysqli->query($sql);  
$backResult = "";  
// 执行while循环语句,循环数据库查询的结果集,并使用fetch_array()取出每条记录.  
while ($row = $mysqli_result->fetch_array(MYSQL_ASSOC)){      
    // 判断$backResult是否为不为空,如果不为空则在值后面加上",".  
    if ($backResult != ""){  
        $backResult .= ",";  
    };      
    // 使用字符串拼接的方式为$$backResult变量创建对象,着个对象中保存的是数据库register_info表中的每条记录.  
    $backResult .= '{"usersId":"' . $row["ID"] . '",';  
    $backResult .= '"usersName":"' . $row["name"] . '",';  
    $backResult .= '"userstrueName":"' . $row["truename"] . '",';
	$backResult .= '"usersSex":"' . $row["sex"] . '",';
	$backResult .= '"usersAge":"' . $row["age"] . '",';
	$backResult .= '"usersTel":"' . $row["num"] . '",';
	$backResult .= '"usersAddr":"' . $row["addr"] . '",';
	$backResult .= '"usersAutority":"' . $row["authority"] . '"}';  
}  
// 拼接返回的json对象,对象中键的名称为myfile,对象的值为数组.  
$backResult = '[' .$backResult .']';  
// 关闭数据库连接  
$mysqli->close();  
// 打印返回给前台的json数据.  
echo $backResult;  
?> 
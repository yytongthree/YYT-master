<?php 
	session_start();
	$json ="";
	$data =array(); //定义好一个数组.PHP中array相当于一个数据字典.
	class User
	{
		public $name;
		public $num;
		public $sex;
		public $age;
		public $truename;
		public $authority;
	}
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn){
		die('Could not connect: ' . mysqli_error());
	}
	$sql = "SELECT * FROM register_info";
	$result = mysqli_query($conn,$sql) or die("Error in query: $sql. ".mysqli_error());
	if(mysqli_num_rows($result)>0){  
         //如果返回的数据集行数大于0，则开始赋值给类   
         while($row=mysqli_fetch_array($result)){
			 $day=count_days(date("Y-m-d"),$row['time']);
			 if($day<2){
			 	$user = new User();
			 	$user->name = $row['name'];
			 	$user->num = $row['num'];
			 	$user->sex = $row['sex'];
			 	$user->age = $row['age'];
			 	$user->truename = $row['truename'];
			 	switch($row['authority']){
				 	case "1":{
			 			$user->authority = "非签约用户";
						break;
				 	}
				 	case "2":{
			 			$user->authority = "签约用户";
						break;
				 	}
				 	case "3":{
			 			$user->authority = "医生";
				 	}
			 	}
			 	$data[] = $user;
			 }
		 }
		 $json = json_encode($data);
		 echo($json);
	}else{
		echo "未找到记录";
	}
	//释放记录集所占用的内存  
    mysqli_free_result($result);  
	mysqli_close($conn);
	
	function count_days($a,$b){
		$a=strtotime($a);//当前日期
		$b=strtotime($b);//指定日期
		$a_dt=getdate($a);
		$b_dt=getdate($b);
		$a_new=mktime(12,0,0,$a_dt['mon'],$a_dt['mday'],$a_dt['year']);
		$b_new=mktime(12,0,0,$b_dt['mon'],$b_dt['mday'],$b_dt['year']);
		return round(abs($a_new-$b_new)/86400);
	}
?>
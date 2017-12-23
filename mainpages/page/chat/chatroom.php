<?php
	$json ="";
	$data =array(); //定义好一个数组.PHP中array相当于一个数据字典.
	class Message
	{
		public $ID;
		public $picture;
		public $name;
		public $content;
		public $saytime;
	}
	
	$conn = mysqli_connect("localhost","root","wenny673","yyt_chat");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	
	$query = "SELECT * FROM chat ORDER BY ID DESC"; 
     //执行SQL语句  
     $result = mysqli_query($conn,$query) or die("Error in query: $query. ".mysqli_error()); 
     //显示返回的记录集行数  
     if(mysqli_num_rows($result)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
         while($row=mysqli_fetch_array($result)){ 
		 	 $message = new Message;
			 $message->ID = $row['ID'];
			 $message->picture = $row['picture'];
			 $message->name = $row['name'];
			 $message->content = $row['content'];
			 $message->saytime = $row['time'];
			 $data[] = $message;
         }
     }
	 $json = json_encode($data);
	 echo($json);
     //释放记录集所占用的内存  
     mysqli_free_result($result);  
	mysqli_close($conn);
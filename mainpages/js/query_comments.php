<?php
	$json='';
	$data=array();
	class Comments
	{
		public $userName;
		public $content;
		public $commentTime;
	}
	$conn=mysqli_connect("localhost","root","wenny673","yyt_info") or die("Unable to connect!");
	function showTable($conn,$table_name){ 
		$sql = "select * from $table_name";
		$res = mysqli_query($conn,$sql);
		//循环取出数据
		if(mysqli_num_rows($res)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
			while($row=mysqli_fetch_array($res)){ 
				$news=new Comments;
				$news->userName=$row['userName'];
				$news->content=$row['content'];
				$news->commentTime=$row['commentTime'];
				$data[]=$news;
			}
			$json = json_encode($data);
			 echo($json);
		mysqli_free_result($res); 
		}
	}
	showTable($conn,"comment");
	mysqli_close($conn);

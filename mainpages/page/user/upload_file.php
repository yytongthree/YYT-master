<?php
session_start();
$json="";
class files
{
	public $msg;
	public $src;
}
$file=new files;
$upload_path="../../images/";//上传图片的存放路径
$path="http://localhost/YYT-master/mainpages/images/";//读取文件的绝对路径
// 允许上传的图片后缀
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 1024*1024*3)   // 小于3Mb
&& in_array($extension, $allowedExts))
{
    if ($_FILES["file"]["error"] > 0)
    {
  			$file->msg="错误：: " . $_FILES["file"]["error"];
			$json = json_encode((object)$file);
		 	echo($json);
    }
    else
    {
        // 判断当期目录下的 upload 目录是否存在该文件
        // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
        if (file_exists($upload_path . $_FILES["file"]["name"]))
        {
	 		$file->msg=$_FILES["file"]["name"] . " 文件已经存在。 ";
			$json = json_encode((object)$file);
		 	echo($json);
        }
        else
        {
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            move_uploaded_file($_FILES["file"]["tmp_name"], $upload_path . $_FILES["file"]["name"]);
			$file->src= $path . $_FILES["file"]["name"];
			$pic=$path . $_FILES["file"]["name"];
			$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
			if (!$conn){
						die('Could not connect: ' . mysqli_error());
			}
			$sql1 = "UPDATE register_info SET picture='".$pic."' WHERE name='{$_SESSION['username']}'";
			if(mysqli_query($conn,$sql1)){ 
				mysqli_close($conn);
				$conn = mysqli_connect("localhost","root","wenny673","yyt_chat");
				if (!$conn){
							die('Could not connect: ' . mysqli_error());
				}
				$sql2 = "UPDATE chat SET picture='".$pic."' WHERE name='{$_SESSION['username']}'";
				if(mysqli_query($conn,$sql2)){ 
					$file->msg="successed!";
				}
				mysqli_close($conn);
			}
			$json = json_encode((object)$file);
		 	echo $json;
        }
    }
}
else
{
	$file->msg="非法的文件格式";
	$json = json_encode((object)$file);
	echo($json);
}
?>
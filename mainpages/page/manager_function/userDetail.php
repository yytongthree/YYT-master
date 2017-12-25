<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>用户详情</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="../../layui/css/layui.css"media="all" />
	<link rel="stylesheet" href="//at.alicdn.com/t/font_tnyc012u2rlwstt9.css" media="all" />
	<link rel="stylesheet" href="../../css/user.css" media="all" />
</head>
<body> 
<?php
	$checkbox=$_REQUEST["checkbox"];echo $checkbox;
  	$authority=$_REQUEST["authority"];echo $authority;
	
    $conn=mysqli_connect("localhost","root","wenny673","yyt_info"); 
	// 检查连接 
	if (!$conn) 
	{ 
    	die("连接错误: " . mysqli_connect_error()); 
	} 
	else echo "数据库连接成功";

	if($authority="非签约用户")
		{
			?>
            <table class="layui-table">
     <form > 
		   <col width="50">
				<col width="12%"><!--登录名-->
				<col width="10%"><!--姓名-->
				<col width="6%"><!--性别-->
				<col width="8%"><!--年龄-->
				<col width="12%">
                <col width="14%"><!--登录名-->
				<col width="12%"><!--姓名-->
				<col width="8%"><!--性别-->
				<col width="8%"><!--年龄-->
                <!--<col width="6%">操作-->
		    </colgroup>
		  
           <thead>
				<tr>
                    <th>登录名</th>
					<th>姓名</th>
					<th>性别</th>
                    <th>生日</th>
					<th>年龄</th>
                    <th>联系电话</th>
                    <th>E-mail</th>
                    <th>所在省份</th>
                    <th>所在城市</th>
				</tr> 
		    </thead>

	</div> 
     <!--</form>
</table>-->
<?php
function showTable($conn,$table_name,$checkbox){ 
		$sql = "select * from $table_name where ID='{$checkbox}'";//WHERE ID='{$checkbox}'
		echo $sql;
		//写死试试，现在的问题是，没有数据显示出来
		$res = mysqli_query($conn,$sql);
		//循环取出数据
		if(mysqli_num_rows($res)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
			while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){ 
				echo "<tr>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['truename']."</td>";
				echo "<td>".$row['sex']."</td>";
				echo "<td>".$row['birthdate']."</td>";
				echo "<td>".$row['age']."</td>";
				echo "<td>".$row['num']."</td>";
				echo "<td>".$row['email']."</td>";
				echo "<td>".$row['province']."</td>";
				echo "<td>".$row['city']."</td>";
				echo "</tr>";
			}
		mysqli_free_result($res); 
		}
	}
	showTable($conn,"register_info",$checkbox);
		?>
        </form>
	</table>
        <?php
        }
	else{
		if($authority="签约用户")
			{
				?>
            <table class="layui-table">
     <form> 
		   <col width="50">
				<col width="12%"><!--登录名-->
				<col width="10%"><!--姓名-->
				<col width="6%"><!--性别-->
				<col width="8%"><!--年龄-->
				<col width="12%">
                <col width="14%"><!--登录名-->
				<col width="12%"><!--姓名-->
				<col width="6%"><!--性别-->
				<col width="6%"><!--年龄-->
                <col width="6%"><!--性别-->
				<col width="6%"><!--年龄-->
                <col width="6%"><!--性别-->
				<col width="6%"><!--年龄-->
                <col width="6%"><!--性别-->
				<col width="6%"><!--年龄-->
                <!--<col width="6%">操作-->
		    </colgroup>
		  
           <thead>
				<tr>
					<th>姓名</th>
					<th>性别</th>
					<th>年龄</th>
                    <th>联系电话</th>
                    <th>居住地址</th>
                    <th>身高</th>
                    <th>体重</th>
                    <th>BMI指数</th>
                    <th>心率</th>
                    <th>血压</th>
					<th>血糖</th>
					<th>骨质密度</th>
                    <th>视力</th>
                    <th>眼压</th>
                    <th>听力</th>
				</tr> 
		    </thead>

	</div> 
     <!--</form>
</table>-->
<?php
function showTable($conn,$table_name){ 
		$sql = "select * from $table_name WHERE ID='{$checkbox}' ";
		$res = mysqli_query($conn,$sql);
		//循环取出数据
		if(mysqli_num_rows($res)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
			while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){ 
				echo "<tr>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['sex']."</td>";
				echo "<td>".$row['age']."</td>";
				echo "<td>".$row['num']."</td>";
				echo "<td>".$row['addr']."</td>";
				echo "<td>".$row['height']."</td>";
				echo "<td>".$row['weight']."</td>";
				echo "<td>".$row['TZZS']."</td>";
				echo "<td>".$row['HR']."</td>";
				echo "<td>".$row['BP']."</td>";
				echo "<td>".$row['BG']."</td>";
				echo "<td>".$row['BMD']."</td>";
				echo "<td>".$row['SS']."</td>";
				echo "<td>".$row['INPR']."</td>";
				echo "<td>".$row['hear']."</td>";
							echo "</tr>";
			}
		mysqli_free_result($res); 
		}
	}
	showTable($conn,"inha_info");
	?>
        </form>
	</table>
        <?php
	}
	else{
		if($authority="医生")
			{
				
				?>
            <table class="layui-table">
     <form> 
		   <col width="50">
				<col width="12%"><!--登录名-->
				<col width="10%"><!--姓名-->
				<col width="6%"><!--性别-->
				<col width="8%"><!--年龄-->
				<col width="12%">
                <col width="14%"><!--登录名-->
				<col width="12%"><!--姓名-->
				<col width="6%"><!--性别-->
                <!--<col width="6%">操作-->
		    </colgroup>
		  
           <thead>
				<tr>
					<th>姓名</th>
					<th>性别</th>
					<th>年龄</th>
                    <th>联系电话</th>
                    <th>擅长科目</th>
                    <th>获得奖项</th>
                    <th>负责区域</th>
                    <th>签约人数</th>
				</tr> 
		    </thead>

	</div> 
    <!-- </form>
</table>-->
<?php
function showTable($conn,$table_name){ 
		$sql = "select * from $table_name WHERE ID='{$checkbox}' ";
		$res = mysqli_query($conn,$sql);
		//循环取出数据
		if(mysqli_num_rows($res)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
			while($row=mysqli_fetch_array($res,MYSQLI_ASSOC)){ 
				echo "<tr>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['sex']."</td>";
				echo "<td>".$row['age']."</td>";
				echo "<td>".$row['num']."</td>";
				echo "<td>".$row['GS']."</td>";
				echo "<td>".$row['awards']."</td>";
				echo "<td>".$row['RA']."</td>";
				echo "<td>".$row['SN']."</td>";
							echo "</tr>";
			}
		mysqli_free_result($res); 
		}
	}
	showTable($conn,"docter_info");
	
	?>
        </form>
	</table>
        <?php
	}
	}
	}
	mysqli_close($conn);
?>
</body>
</html>
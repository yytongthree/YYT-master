
<html>
<body>
<form action="modify3.php" method="post" class="layui-form" style="width:70%;">
	<?php
		$sql1 = "select truename from register_info WHERE ID='30002' ";
		$res1 = mysqli_query($conn,$sql1);
		$row1=mysqli_fetch_array($res1,MYSQLI_ASSOC);
		$sql2 = "select * from docter_info WHERE name='{$row1['truename']}'";
		$res2 = mysqli_query($conn,$sql2);
		$row2=mysqli_fetch_array($res2,MYSQLI_ASSOC);
		if(mysqli_num_rows($res2)>0){ //层数2--
				while($row=mysqli_fetch_array($res2,MYSQLI_ASSOC)){ //3
		?>
        	<div class="layui-form-item">
			<label class="layui-form-label">姓名</label>
			<div class="layui-input-block">
				<input type="text" name="name" value="<?php echo $row['name'];?>" id="name" class="layui-input userName" lay-verify="required" placeholder="请输入该医生的姓名">
			</div>
		</div>
        <div class="layui-form-item" pane="">
			    <label class="layui-form-label">性别</label>
			    <div class="layui-input-block">
                <?php
					if($row['sex']=="男"){
				?>
			    		<input type="radio" name="sex" id="sex" value="男" title="男" checked="">
	     				<input type="radio" name="sex" id="sex" value="女" title="女">
                 <?php
					}else{
						if($row['sex']=="女"){
				?>
                            <input type="radio" name="sex" id="sex" value="男" title="男">
	     					<input type="radio" name="sex" id="sex" value="女" title="女" checked="">
                <?php
						}
					}
				?>
			    </div>
			</div>
          <div class="layui-form-item">
			<label class="layui-form-label">年龄</label>
			<div class="layui-input-block">
				<input type="text" name="age" value="<?php echo $row['age'];?>" id="age" class="layui-input userAge" lay-verify="required" placeholder="请输入年龄">
			</div>
		</div>  
		<div class="layui-form-item">
			<label class="layui-form-label">联系电话</label>
			<div class="layui-input-block">
				<input type="text" class="layui-input userTel"  name="num" value="<?php echo $row['num'];?>"id="num" lay-verify="tel" placeholder="请输入有效电话号码">
			</div>
		</div>
        <div class="layui-form-item">
			<label class="layui-form-label">擅长科目</label>
			<div class="layui-input-block">
				<input type="text" name="GS" value="<?php echo $row['GS'];?>"id="GS" class="layui-input userPassword" lay-verify="password" placeholder="请输入该医生擅长的科目">
			</div>
		</div>
      <div class="layui-form-item">
			<label class="layui-form-label">负责区域</label>
			<div class="layui-input-block">
				<input type="text" name="RA" value="<?php echo $row['RA'];?>"id="RA" class="layui-input userPassword" lay-verify="password" placeholder="请输入该医生负责的辖区">
			</div>
		</div>
        <div class="layui-form-item">
			<label class="layui-form-label">获奖状况</label>
			<div class="layui-input-block">
				<input type="text" name="awards" value="<?php echo $row['awards'];?>" id="awards" class="layui-input userPassword" lay-verify="password" placeholder="请输入该医生的获奖状况">
			</div>
		</div>
        <div class="layui-form-item">
			<label class="layui-form-label">签约人数</label>
			<div class="layui-input-block">
				<input type="text" name="SN" value="<?php echo $row['SN'];?>" id="SN" class="layui-input userAddr"   lay-verify="addr" placeholder="请输入该医生的签约人数">
			</div>
		</div>
        <?php
		}
			}
		//}
	mysqli_free_result($res); 
		mysqli_close ( $conn );
		
		?>
        <div class="layui-form-item">
			<div class="layui-input-block">
				<button class="layui-btn" lay-submit="" lay-filter="">立即提交</button>
				<button type="reset" class="layui-btn layui-btn-primary">重置</button>
		    </div>
		</div>
	</form>
    </body>
    </html>

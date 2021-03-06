var areaData = address;
var pwd,picture;
var $form;
var form;
var $;
layui.config({
	base : "../../js/"
}).use(['form','layer','upload','laydate'],function(){
	form = layui.form();
	var layer = parent.layer === undefined ? layui.layer : parent.layer;
		$ = layui.jquery;
		$form = $('form');
		laydate = layui.laydate;
        loadProvince();
		$.ajax({
			url:"pwd.php?action=ok",
			type:'POST',
			data:'pwd='+pwd,
			async:true,
			success: function(data){
				pwd=data;
			}
		})
		


        layui.upload({
        	url : "upload_file.php",
			elem: '#file',
        	success: function(res){
				if(res.src){
					alert("提交成功！");
					//刷新父页面
	 				parent.location.reload();
				//	window.location.href='userinfo.php';
				}
		    }
        });


        //添加验证规则
		form.verify({
			oldPwd : function(value, item){
				$.ajax({
					url:"md5.php?action=ok",
					type:'POST',
					data:'value='+value,
					async:false,
					success: function(data){
						pass=data;
                	}
				}) 
				if(pass != pwd){
                    return "密码错误，请重新输入！";  
				} 
			},
			newPwd : function(value, item){
				if(value.length < 6){
					return "密码长度不能小于6位";
				}
			},
			confirmPwd : function(value, item){
				if(!new RegExp($("#Pwd").val()).test(value)){
					return "两次输入密码不一致，请重新输入！";
				}
			}
		})
		
        $.ajax({
			url:"picture.php?action=ok",
			type:'POST',
			data:'picture='+picture,
			async:true,
			success: function(data){
				picture=data;
        		$("#userFace").attr("src",picture);
			}
		})

        //提交个人资料
		var changeUser,data_check;
 		form.on("submit(changeUser)",function(data){
			changeUser = '{"userauth":"'+ $(".auth").val() +'",';
 			changeUser += '"usersex":"'+ data.field.sex +'",';
 			changeUser += '"usertel":"'+ $(".tel").val() +'",'; 
 			changeUser += '"userdate":"'+ $(".birthdate").val() +'",';
 			changeUser += '"addr":"'+ data.field.province + '_' + data.field.city + '_' + data.field.area +'",';
 			changeUser += '"email":"'+ $(".email").val() + '"}';
			var arr=changeUser;
 			
			$.ajax({
				url:"change_user_info.php?action=ok",
				type:'POST',
				data:"arr="+arr,
				async:false,
				success: function(data){
					data_check=data;
				},
        		error: function(){
            		alert("获取数据错误！");
       			}
			})
			
			//弹出loading
			if(data_check == 1){
 				var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
			
				setTimeout(function(){
     	      		top.layer.close(index);
					top.layer.msg("提交成功！");
 					layer.closeAll("iframe");
	 				//刷新父页面
	 				parent.location.reload();
    	    	},2000);
			}else{
				var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
			
				setTimeout(function(){
     	      		top.layer.close(index);
					top.layer.msg("提交失败！");
 					layer.closeAll("iframe");
    	    	},2000);
			}
			return false;
 		})
	

        //修改密码
        form.on("submit(changePwd)",function(data){
        	var index = layer.msg('提交中，请稍候',{icon: 16,time:false,shade:0.8});
			var newpwd=$("#Pwd").val();
			$.ajax({
				url:"changep.php?action=ok",
				type:'POST',
				data:'newpwd='+newpwd,
				async:true,
				success: function(data){
						newpwd=data;
				}
			})
			if(newpwd){
            	setTimeout(function(){
                	layer.close(index);
                	layer.msg("密码修改成功！");
                	$(".pwd").val('');
					alert("密码改变，请重新登录！");
					parent.window.location='../../../../exit.php';
            	},2000);
			}else{
				 setTimeout(function(){
                	layer.close(index);
                	layer.msg("密码修改失败！");
                	$(".pwd").val('');
					location.reload();
            	},2000);
			}

        	return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        })

})

 //加载省数据
function loadProvince() {
    var proHtml = '';
    for (var i = 0; i < areaData.length; i++) {
        proHtml += '<option value="' + areaData[i].provinceCode + '_' + areaData[i].mallCityList.length + '_' + i + '_' + areaData[i].provinceName + '">' + areaData[i].provinceName + '</option>';
    }
    //初始化省数据
    $form.find('select[name=province]').append(proHtml);
    form.render();
    form.on('select(province)', function(data) {
        $form.find('select[name=area]').html('<option value="">请选择县/区</option>');
        var value = data.value;
        var d = value.split('_');
        var code = d[0];
        var count = d[1];
        var index = d[2];
        if (count > 0) {
            loadCity(areaData[index].mallCityList);
        } else {
            $form.find('select[name=city]').attr("disabled","disabled");
        }
    });
}
 //加载市数据
function loadCity(citys) {
    var cityHtml = '<option value="">请选择市</option>';
    for (var i = 0; i < citys.length; i++) {
        cityHtml += '<option value="' + citys[i].cityCode + '_' + citys[i].mallAreaList.length + '_' + i + '_' + citys[i].cityName + '">' + citys[i].cityName + '</option>';
    }
    $form.find('select[name=city]').html(cityHtml).removeAttr("disabled");
    form.render();
    form.on('select(city)', function(data) {
        var value = data.value;
        var d = value.split('_');
        var code = d[0];
        var count = d[1];
        var index = d[2];
        if (count > 0) {
            loadArea(citys[index].mallAreaList);
        } else {
            $form.find('select[name=area]').attr("disabled","disabled");
        }
    });
}
 //加载县/区数据
function loadArea(areas) {
    var areaHtml = '<option value="">请选择县/区</option>';
    for (var i = 0; i < areas.length; i++) {
        areaHtml += '<option value="' + areas[i].areaCode + '_' + areas[i].areaName + '">' + areas[i].areaName + '</option>';
    }
    $form.find('select[name=area]').html(areaHtml).removeAttr("disabled");
    form.render();
    form.on('select(area)', function(data) {
        //console.log(data);
    });
}
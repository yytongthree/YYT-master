var $;
layui.config({
	base : "js/"
}).use(['form','layer','jquery'],function(){
	var form = layui.form(),
		layer = parent.layer === undefined ? layui.layer : parent.layer,
		laypage = layui.laypage;
		$ = layui.jquery;

 	var addUserArray = [],addUser;
 	form.on("submit(addUser)",function(data){
 		//是否添加过信息
	 	if(window.sessionStorage.getItem("addUser")){
	 		addUserArray = JSON.parse(window.sessionStorage.getItem("addUser"));
	 	}

	 	var userStatus,userGrade,userEndTime;
	 	//会员等级
	 	if(data.field.authority == '1'){
 			authority = "非签约用户";
 		}else if(data.field.authority == '2'){
 			authority = "签约用户";
 		}else if(data.field.authority == '3'){
 			authority = "签约医生";
 		}else if(data.field.authority == '4'){
 			authority = "管理员";
 		}
 		//会员状态
 		if(data.field.userStatus == '0'){
 			userStatus = "正常使用";
 		}else if(data.field.userStatus == '1'){
 			userStatus = "限制用户";
 		}

 		addUser = '{"usersId":"'+ new Date().getTime() +'",';//id
 		addUser += '"userName":"'+ $(".userName").val() +'",';  //登录名
		addUser += '"userTruename":"'+ $(".userTruename").val() +'",';  //姓名
		addUser += '"userSex":"'+ data.field.sex +'",'; //性别
 		addUser += '"userAge":"'+ $(".userAge").val() +'",';	 //年龄
 		addUser += '"userTel":"'+ $(".userTel").val() +'",';	 //电话
		addUser += '"userPassword":"'+ $(".userPassword").val() +'",';	 //密码
		addUser += '"userAssertpassword":"'+ $(".userAssertpassword").val() +'",';	 //确认密码
		addUser += '"userAddr":"'+ $(".userAddr").val() +'",';	 //地址
 		addUser += '"authority":"'+ authority +'",'; //用户身份
 		addUser += '"userStatus":"'+ userStatus +'",'; //用户状态
 		addUser += '"userEndTime":"'+ formatTime(new Date()) +'"}';  //登录时间
 		console.log(addUser);
 		addUserArray.unshift(JSON.parse(addUser));
 		window.sessionStorage.setItem("addUser",JSON.stringify(addUserArray));
 		//弹出loading
 		var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
        setTimeout(function(){
            top.layer.close(index);
			top.layer.msg("用户添加成功！");
 			layer.closeAll("iframe");
	 		//刷新父页面
	 		parent.location.reload();
        },2000);
 		return false;
 	})
	
})

//格式化时间
function formatTime(_time){
    var year = _time.getFullYear();
    var month = _time.getMonth()+1<10 ? "0"+(_time.getMonth()+1) : _time.getMonth()+1;
    var day = _time.getDate()<10 ? "0"+_time.getDate() : _time.getDate();
    var hour = _time.getHours()<10 ? "0"+_time.getHours() : _time.getHours();
    var minute = _time.getMinutes()<10 ? "0"+_time.getMinutes() : _time.getMinutes();
    return year+"-"+month+"-"+day+" "+hour+":"+minute;
}

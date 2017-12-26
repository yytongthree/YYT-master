layui.config({
	base : "js/"
}).use(['form','layer','jquery','layedit','laydate'],function(){
	var form = layui.form(),
		layer = parent.layer === undefined ? layui.layer : parent.layer,
		laypage = layui.laypage,
		layedit = layui.layedit,
		laydate = layui.laydate,
		$ = layui.jquery;

	//创建一个编辑器
 	var editIndex = layedit.build('activity_content');
 	var addActivityArray = [],addActivity;
 	form.on("submit(addActivity)",function(data){
 		//是否添加过信息
	 	if(window.sessionStorage.getItem("addActivity")){
	 		addActivityArray = JSON.parse(window.sessionStorage.getItem("addActivity"));
	 	}
	 	//显示、审核状态
 		var isShow = data.field.show=="on" ? "checked" : "",
 		addActivity = '{"activityName":"'+$(".activityName").val()+'",';  //活动名称
 		addActivity += '"activityTime":"'+$(".activityTime").val()+'",'; //发布时间
 		addActivityArray.unshift(JSON.parse(addActivity));
 		window.sessionStorage.setItem("addActivity",JSON.stringify(addActivityArray));
 		//弹出loading
 		var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
        setTimeout(function(){
            top.layer.close(index);
			top.layer.msg("活动添加成功！");
 			layer.closeAll("iframe");
	 		//刷新父页面
	 		parent.location.reload();
        },2000);
 		return false;
 	})
	
})

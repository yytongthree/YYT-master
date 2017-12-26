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
 	var editIndex = layedit.build('medicine_content');
 	var addMedicineArray = [],addMedicine;
 	form.on("submit(addMedicine)",function(data){
 		//是否添加过信息
	 	if(window.sessionStorage.getItem("addMedicine")){
	 		addMedicineArray = JSON.parse(window.sessionStorage.getItem("addMedicine"));
	 	}
	 	//显示、审核状态
 		var isShow = data.field.show=="on" ? "checked" : "",

 		addMedicine = '{"medicineName":"'+$(".medicineName").val()+'",';  //药品名称
 		addMedicine += '"medicineTime":"'+$(".medicineTime").val()+'",'; //修改时间
		addMedicine += '"medicineamount":"'+$(".medicineamount").val()+'",'; //药品数量
        addMedicine += '"notes":"'+$(".notes").val()+'",'; //药品状态	
 		addMedicineArray.unshift(JSON.parse(addMedicine));
 		window.sessionStorage.setItem("addMedicine",JSON.stringify(addMedicineArray));
 		//弹出loading
 		var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
        setTimeout(function(){
            top.layer.close(index);
			top.layer.msg("药品修改成功！");
 			layer.closeAll("iframe");
	 		//刷新父页面
	 		parent.location.reload();
        },2000);
 		return false;
 	})
	
})

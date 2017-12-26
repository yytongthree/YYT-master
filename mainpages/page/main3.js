layui.config({
	base : "js/"
}).use(['form','element','layer','jquery'],function(){
	var form = layui.form(),
		layer = parent.layer === undefined ? layui.layer : parent.layer,
		element = layui.element(),
		$ = layui.jquery;

	$(".panel a").on("click",function(){
		window.parent.addTab($(this));
	})
	
	//动态获最新活动
	$.get("query.php",
		function(data){
			alert(data);
			data=JSON.parse(data);
			alert(data);
			//加载最新活动
			var activityHtml = '';
			for(var i=0;i<data.length;i++){
				activityHtml += '<tr>'
		    	+'<td align="left">'+data[i].name+'</td>'
		    	+'<td>'+data[i].addtime+'</td>'
				+'<td>'+data[i].content+'</td>'
		    	+'</tr>';
			}
			$(".activity").html(activityHtml);
		}
	)

	//用户数
	$.get("../page/user/allUsers.php",
		function(data){
			data = JSON.parse(data);
			$(".userAll span").text(data.length);
		}
	)

	//新消息
	$.get("../json/message3.json",
		function(data){
			$(".newMessage span").text(data.length);
		}
	)


	//数字格式化
	$(".panel span").each(function(){
		$(this).html($(this).text()>9999 ? ($(this).text()/10000).toFixed(2) + "<em>万</em>" : $(this).text());	
	})

})

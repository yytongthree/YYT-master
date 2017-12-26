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

	//动态获取文章总数和待审核文章数量,最新文章
	$.get("query_news.php",
		function(data){
			data=JSON.parse(data);
			$(".allNews span").text(data.length);  //文章总数
			//加载最新文章
			var hotNewsHtml = '';
			for(var i=0;i<data.length;i++){
				hotNewsHtml += '<tr>'
		    	+'<td align="left">'+data[i].newsName+'</td>'
				+'<td>'+data[i].newsAuthor+'</td>'
				+'<td>'+data[i].newsSum+'</td>'
		    	+'<td>'+data[i].newsTime+'</td>'
		    	+'</tr>';
			}
			$(".hot_news").html(hotNewsHtml);
		}
	)
	
	//动态获最新活动
	$.get("query.php",
		function(data){
			data=JSON.parse(data);
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

	//新消息
	$.get("../json/message1.json",
		function(data){
			$(".newMessage span").text(data.length);
		}
	)


	//数字格式化
	$(".panel span").each(function(){
		$(this).html($(this).text()>9999 ? ($(this).text()/10000).toFixed(2) + "<em>万</em>" : $(this).text());	
	})



})

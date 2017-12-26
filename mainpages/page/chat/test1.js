 var $,laypage;
layui.config({
	base : "../../js/"
}).use(['form','layer','layedit','laypage'],function(){
    var form = layui.form(),
        layer = parent.layer === undefined ? layui.layer : parent.layer,
		laypage = layui.laypage,
        layedit = layui.layedit;
        $ = layui.jquery;
		
 $("body").on("click",".history",function(){
        var index = layui.layer.open({
            title : "聊天室历史记录",
            type : 2,
            content : "history.html",
            success : function(layero, index){
                layui.layer.tips('点击此处返回消息列表', '.layui-layer-setwin .layui-layer-close', {
                    tips: 3
                });
     //           var body = layui.layer.getChildFrame('body', index);
                //加载回复信息
                $.get("chatroom.php",function(data){
				//	data = JSON.parse(data)
                 /*   var msgReplyHtml = '';
					for(var i=0; i<data.length; i++){
						msgReplyHtml += '<tr>';
						msgReplyHtml += '  <td class="msg_info">';
						msgReplyHtml += '    <img src="../../images/face.jpg" width="50" height="50">';
						msgReplyHtml += '    <div class="user_info">';
						msgReplyHtml += '        <h2>'+data[i].name+'</h2>';
						msgReplyHtml += '        <p>'+data[i].content+'</p>';
						msgReplyHtml += '    </div>';
						msgReplyHtml += '  </td>';
						msgReplyHtml += '  <td class="msg_time">'+data[i].saytime+'</td>';
						msgReplyHtml += '</tr>';
                  	}
                    body.find(".msgReplyHtml").html(msgReplyHtml);*/
					historyData = data;
					historyData = JSON.parse(historyData);
					historyList();

                })
            }
        })
		function historyList(){
			alert(historyData);
			//渲染数据
			function renderDate1(data,curr){
				alert(1);
				var historyHtml = '';
				currData = historyData.concat().splice(curr*nums-nums, nums);
				if(currData.length != 0){
					for(var i=0; i<currData.length; i++){
						historyHtml += '<tr>';
						historyHtml += '  <td class="msg_info">';
						historyHtml += '    <img src="../../images/face.jpg" width="50" height="50">';
						historyHtml += '    <div class="user_info">';
						historyHtml += '        <h2>'+currData[i].name+'</h2>';
						historyHtml += '        <p>'+currData[i].content+'</p>';
						historyHtml += '    </div>';
						historyHtml += '  </td>';
						historyHtml += '  <td class="msg_time">'+currData[i].saytime+'</td>';
						historyHtml += '</tr>';
					}
				}
				return historyHtml;
			}
			//分页
			var nums = 10; //每页出现的数据量
			alert(nums);
			laypage({
				cont : "page_history",
				pages : Math.ceil(historyData.length/nums),
				curr: location.hash.replace('#!fenye=', ''), //获取hash值为fenye的当前页
    			hash: 'fenye',
				jump : function(obj,first){
					if(!first){
						layer.msg('第'+obj.curr+'页');
					}
					$(".historyHtml").html(renderDate1(historyData,obj.curr));
					$('.users_list thead input[type="checkbox"]').prop("checked",false);
					form.render();
				}//Math.ceil()执行向上舍入，即它总是将数值向上舍入为最接近的整数；
			});
		}
        //改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
        $(window).resize(function(){
            layui.layer.full(index);
        })
        layui.layer.full(index);
    })
})
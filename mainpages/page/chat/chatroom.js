var $,laypage;
layui.config({
	base : "../../js/"
}).use(['form','layer','layedit','laypage'],function(){
    var form = layui.form(),
        layer = parent.layer === undefined ? layui.layer : parent.layer,
		laypage = layui.laypage,
        layedit = layui.layedit;
        $ = layui.jquery;

    //消息回复
    var editIndex = layedit.build('msgReply',{
         tool: ['strong'
				,'italic'
				,'underline'
				,'left'
				
				,'|'
				
				,'left'
				,'center'
				,'right'
				,'face'
				,'image'],
         height:100
    });

    //加载数据
	var chatsData = '';
	setInterval(function(){
		$.get("chatroom.php",function(data){
			chatData = data;
			chatData = JSON.parse(chatData);
			usersList();

        	//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
			$(window).resize(function(){
				layui.layer.full(index);
			})
			layui.layer.full(index);
		})},500)

    //提交回复
    var message = [];
    $(".send_msg").click(function(){
        if(layedit.getContent(editIndex) != ''){
            var replyHtml = '',msgStr;
			var content,data_check;
			content = layedit.getContent(editIndex);
			$.ajax({
				url:"insert_chatroom_news.php?action=ok",
				type:'POST',
				data:"content="+content,
				async:false,
				success: function(data){
					data_check=data;
				},
        		error: function(){
            		alert("获取数据错误！");
       			}
			})
            $("#LAY_layedit_1").contents().find("body").html('');
        }else{
            layer.msg("请输入回复信息");
        }
    })
	
	function usersList(){
		//渲染数据
			function renderDate(data,curr){
				var msgReplyHtml = '';
				currData = chatData.concat().splice(curr*nums-nums, nums);
				if(currData.length != 0){
					for(var i=0; i<currData.length; i++){
						msgReplyHtml += '<tr>';
						msgReplyHtml += '  <td class="msg_info">';
						msgReplyHtml += '    <img src="../../images/face.jpg" width="50" height="50">';
						msgReplyHtml += '    <div class="user_info">';
						msgReplyHtml += '        <h2>'+currData[i].name+'</h2>';
						msgReplyHtml += '        <p>'+currData[i].content+'</p>';
						msgReplyHtml += '    </div>';
						msgReplyHtml += '  </td>';
						msgReplyHtml += '  <td class="msg_time">'+currData[i].saytime+'</td>';
						msgReplyHtml += '</tr>';
					}
				}
				return msgReplyHtml;
			}
			//分页
			var nums = 3; //每页出现的数据量
			laypage({
				cont : "page",
				pages : Math.ceil(chatData.length/nums),
				curr: location.hash.replace('#!fenye=', ''), //获取hash值为fenye的当前页
    			hash: 'fenye',
				jump : function(obj,first){
					if(!first){
						layer.msg('第'+obj.curr+'页');
					}
					$(".msgReplyHtml").html(renderDate(chatData,obj.curr));
					$('.users_list thead input[type="checkbox"]').prop("checked",false);
					form.render();
				}//Math.ceil()执行向上舍入，即它总是将数值向上舍入为最接近的整数；
			})
		}
})


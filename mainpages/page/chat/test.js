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
	var chatData = '';
	//setInterval(function(){
		$.get("chatroom.php",function(data){
			chatData = data;
			chatData = JSON.parse(chatData);
			usersList();

        	//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
			$(window).resize(function(){
				layui.layer.full(index);
			})
			layui.layer.full(index);
		})//},500)

    //提交回复
    var message = [];
    $(".send_msg").click(function(){
        if(layedit.getContent(editIndex) != ''){
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
	
	//查看历史记录
    $("body").on("click",".history",function(){
        var index = layui.layer.open({
            title : "聊天室历史记录",
            type : 2,
            content : "history.html",
            success : function(layero, index){
                layui.layer.tips('点击此处返回消息列表', '.layui-layer-setwin .layui-layer-close', {
                    tips: 3
                });
                var body = layui.layer.getChildFrame('body', index);
                //加载回复信息
                $.get("chatroom.php",function(data){
				/*	data = JSON.parse(data)
                    var msgReplyHtml = '';
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
			/*	function historyList(){
					//渲染数据
					function renderDate1(data,curr){
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
					var nums = 3; //每页出现的数据量
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
				}*/
            }
			
        })
        //改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
        $(window).resize(function(){
            layui.layer.full(index);
        })
        layui.layer.full(index);
    })
	
	function usersList(nums){
		//渲染数据
		function renderDate(data,curr){
			var msgHtml = '';
			currData = chatData.concat().splice(curr*nums-nums, nums);
			if(currData.length != 0){
				for(var i=0; i<currData.length; i++){
					msgHtml += '<tr>';
					msgHtml += '  <td class="msg_info">';
					msgHtml += '    <img src="../../images/face.jpg" width="50" height="50">';
					msgHtml += '    <div class="user_info">';
					msgHtml += '        <h2>'+currData[i].name+'</h2>';
					msgHtml += '        <p>'+currData[i].content+'</p>';
					msgHtml += '    </div>';
					msgHtml += '  </td>';
					msgHtml += '  <td class="msg_time">'+currData[i].saytime+'</td>';
					msgHtml += '</tr>';
				}
			}
			return msgHtml;
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
					$(".msgHtml").html(renderDate(chatData,obj.curr));
					$('.users_list thead input[type="checkbox"]').prop("checked",false);
					form.render();
				}//Math.ceil()执行向上舍入，即它总是将数值向上舍入为最接近的整数；
			});
			function historyList(){
					//渲染数据
					function renderDate1(data,curr){
						var historyHtml = '';
						currData1 = historyData.concat().splice(curr*num-num, num);
						if(currData1.length != 0){
							for(var i=0; i<currData1.length; i++){
								historyHtml += '<tr>';
								historyHtml += '  <td class="msg_info">';
								historyHtml += '    <img src="../../images/face.jpg" width="50" height="50">';
								historyHtml += '    <div class="user_info">';
								historyHtml += '        <h2>'+currData1[i].name+'</h2>';
								historyHtml += '        <p>'+currData1[i].content+'</p>';
								historyHtml += '    </div>';
								historyHtml += '  </td>';
								historyHtml += '  <td class="msg_time">'+currData1[i].saytime+'</td>';
								historyHtml += '</tr>';
							}
						}
						return historyHtml;
					}
					//分页
					var num = 3; //每页出现的数据量
					laypage({
						cont : "page_history",
						pages : Math.ceil(historyData.length/num),
						curr: location.hash.replace('#!fenye=', ''), //获取hash值为fenye的当前页
    					hash: 'fenye',
						jump : function(obj,first){
							if(!first){
								layer.msg('第'+obj.curr+'页');
							}
							body.find(".historyHtml").html(renderDate1(historyData,obj.curr));
						//	$(".historyHtml").html(renderDate1(historyData,obj.curr));
						//	$('.users_list thead input[type="checkbox"]').prop("checked",false);
							form.render();
						}//Math.ceil()执行向上舍入，即它总是将数值向上舍入为最接近的整数；
					});
				}
	//	}
	}
})


var $;
var uname;
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
	setInterval(function(){
		$.get("chatroom.php",function(data){
			data = JSON.parse(data);
			var msgReplyHtml = '',msgReply;
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
			$(".msgReplyHtml").html(msgReplyHtml);

        	//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
			$(window).resize(function(){
				layui.layer.full(index);
			})
			layui.layer.full(index);
		})},1)

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
	
	//分页
	var nums = 10; //每页出现的数据量
	laypage({
		cont : "page",
		pages : Math.ceil(data.length/nums),
		jump : function(obj){
			$(".users_content").html(renderDate(data,obj.curr));
			$('.users_list thead input[type="checkbox"]').prop("checked",false);
	    	form.render();
		}//Math.ceil()执行向上舍入，即它总是将数值向上舍入为最接近的整数；
	})
	
})


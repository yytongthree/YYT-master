layui.config({
	base : "js/"
}).use(['form','layer','jquery','laypage'],function(){
	var form = layui.form(),
		layer = parent.layer === undefined ? layui.layer : parent.layer,
		laypage = layui.laypage,
		$ = layui.jquery;

	//加载页面数据
	var usersData = '';
	$.get("newUsers.php", function(data){
		usersData = data;
		usersData = JSON.parse(usersData);
		//执行加载数据的方法
		usersList();
	})

	//查询
	$(".search_btn").click(function(){
		var userArray = [];
		if($(".search_input").val() != ''){
			var index = layer.msg('查询中，请稍候',{icon: 16,time:false,shade:0.8});
            setTimeout(function(){
            	$.ajax({
					url : "newUsers.php",
					type : "get",
					success : function(data){
						usersData = data;
						usersData = JSON.parse(usersData);
						for(var i=0;i<usersData.length;i++){
							var usersStr = usersData[i];
							var selectStr = $(".search_input").val();
		            		function changeStr(data){
		            			var dataStr = '';
		            			var showNum = data.split(eval("/"+selectStr+"/ig")).length - 1;//eval函数运行括号内的表达式，即该句为通过eval函数组合正则表达式,split函数通过eval返回的正则表达式指定的边界将字符串data分割成子串创建的字符串数组，得出数组长度减1,showNum为得到的字符串数组的最大下标
		            			if(showNum > 1){
									for (var j=0;j<showNum;j++) {
		            					dataStr += data.split(eval("/"+selectStr+"/ig"))[j] + "<i style='color:#03c339;font-weight:bold;'>" + selectStr + "</i>";
		            				}
		            				dataStr += data.split(eval("/"+selectStr+"/ig"))[showNum];
		            				return dataStr;
		            			}else{
		            				dataStr = data.split(eval("/"+selectStr+"/ig"))[0] + "<i style='color:#03c339;font-weight:bold;'>" + selectStr + "</i>" + data.split(eval("/"+selectStr+"/ig"))[1];
		            				return dataStr;
		            			}
		            		}
		            		//用户名
		            		if(usersStr.name.indexOf(selectStr) > -1){//indexOf返回指定字符在字符串中首次出现的位置
			            		usersStr["name"] = changeStr(usersStr.name);
		            		}
		            		//电话
		            		if(usersStr.num.indexOf(selectStr) > -1){
			            		usersStr["num"] = changeStr(usersStr.num);
		            		}
		            		//性别
		            		if(usersStr.sex.indexOf(selectStr) > -1){
			            		usersStr["sex"] = changeStr(usersStr.sex);
		            		}
		            		//年龄
		            		if(usersStr.age.indexOf(selectStr) > -1){
			            		usersStr["age"] = changeStr(usersStr.age);
		            		}
							//真实姓名
		            		if(usersStr.truename.indexOf(selectStr) > -1){
			            		usersStr["truename"] = changeStr(usersStr.truename);
		            		}
							//用户身份
		            		if(usersStr.authority.indexOf(selectStr) > -1){
			            		usersStr["authority"] = changeStr(usersStr.authority);
		            		}
		            		if(usersStr.name.indexOf(selectStr)>-1 || usersStr.num.indexOf(selectStr)>-1 || usersStr.sex.indexOf(selectStr)>-1 || usersStr.age.indexOf(selectStr)>-1 || usersStr.truename.indexOf(selectStr)>-1 || usersStr.authority.indexOf(selectStr)>-1){
		            			userArray.push(usersStr);
		            		}
		            	}
		            	usersData = userArray;
		            	usersList(usersData);
					},
					error: function(){
            		alert("获取数据错误！");
       			}
				})
            	
                layer.close(index);
            },2000);
		}else{
			layer.msg("请输入需要查询的内容");
		}
	})


	function usersList(){
		//渲染数据
		function renderDate(data,curr){
			var dataHtml = '';
			currData = usersData.concat().splice(curr*nums-nums, nums);
			if(currData.length != 0){
				for(var i=0;i<currData.length;i++){
					dataHtml += '<tr>'
			    	+  '<td>'+currData[i].name+'</td>'
			    	+  '<td>'+currData[i].num+'</td>'
			    	+  '<td>'+currData[i].sex+'</td>'
			    	+  '<td>'+currData[i].age+'</td>'
			    	+  '<td>'+currData[i].truename+'</td>'
			    	+  '<td>'+currData[i].authority+'</td>'
			    	+'</tr>';
				}
			}else{
				dataHtml = '<tr><td colspan="8">暂无数据</td></tr>';
			}
		    return dataHtml;
		}

		//分页
		var nums = 5; //每页出现的数据量
		laypage({
			cont : "page",
			pages : Math.ceil(usersData.length/nums),
			jump : function(obj){
				$(".users_content").html(renderDate(usersData,obj.curr));
				$('.users_list thead input[type="checkbox"]').prop("checked",false);
		    	form.render();
			}//Math.ceil()执行向上舍入，即它总是将数值向上舍入为最接近的整数；
		})
	}
        
})
$(function(){ 
	$('#sub_btn').click(function(){ 
		var adminName=document.getElementById("adminName").value;
		var email = document.getElementById("re_email").value; 
		var regex=/^[/s]+$/; //声明一个判断用户名前后是否有空格的正则表达式
		var preg=/^[0-9a-z_]+@(([0-9a-z]+)[.]){1,2}[a-z]{2,3}$/; //匹配Email
		if(regex.test(adminName)||adminName.length==0)//判断用户名的是否前后有空格或者用户名是否为空
				{
						alert("用户名格式不对");
						return false;
				}
		if(preg.test(email)||email.length==0)//同上述内容
				{
						alert("邮箱格式不对");
						return false;
				}
			return ture; 
	}); 
})

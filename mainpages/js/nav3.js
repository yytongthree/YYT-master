var navs3 = [{
	"title" : "个人中心",
	"icon" : "icon-computer",
	"href" : "page/main3.html",
	"spread" : false
},{
	"title" : "查看公告",
	"icon" : "icon-text",
	"href" : "page/notice/query_notice.php",
	"spread" : false
},{
	"title" : "聊天中心",
	"icon" : "icon-text",
	"href" : "page/chat/main.php",
	"spread" : false,
	"children" : [
		{
			"title" : "聊天室",
			"icon" : "&#xe631;",
			"href" : "page/chat/main.php",
			"spread" : false
		},
		{
			"title" : "留言板",
			"icon" : "&#xe631;",
			"href" : "page/comment/commentAdd.html",
			"spread" : false
		}
	]
},{
	"title" : "用户信息",
	"icon" : "icon-text",
	"href" : "page/addUser.html",
	"spread" : false,
	"children" : [
		{
			"title" : "健康档案",
			"icon" : "&#xe631;",
			"href" : "page/docter_function/query_doc.php",
			"spread" : false
		},
		{
			"title" : "药品信息",
			"icon" : "&#xe631;",
			"href" : "page/docter_function/medicine.php",
			"spread" : false
		}
		,
		{
			"title" : "电子处方",
			"icon" : "&#xe631;",
			"href" : "page/docter_function/ele_prescription.php",
			"spread" : false
		}
	]
},{
	"title" : "友情链接",
	"icon" : "icon-text",
	"href" : "page/links/linksList.html",
	"spread" : false
}]
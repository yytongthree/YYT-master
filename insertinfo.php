<?php
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	
	$sql="INSERT INTO docter_info (doc_ID,name,sex,age,num,GS,awards,RA,SN) VALUES('30001','华佗','男','50','12345678910','外科','神医','武侯区','8')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success1";
	} else {
		echo "<br>Error1: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO docter_info (doc_ID,name,sex,age,num,GS,awards,RA,SN) VALUES('30002','扁鹊','男','40','12345678910','内科','医圣','双流区','8')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success2";
	} else {
		echo "<br>Error2: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO inha_info (inha_ID,name,sex,age,num,addr,height,weight,TZZS,HR,BP,BG,BMD,SS,INPR,hear) VALUES('20001','曹操','男','45','12345678910','魏国','180','60','18.5','90','95/65','4.5','0','5.2','16','15')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success3";
	} else {
		echo "<br>Error3: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO inha_info (inha_ID,name,sex,age,num,addr,height,weight,TZZS,HR,BP,BG,BMD,SS,INPR,hear) VALUES('20002','蔡恒公','男','45','12345678910','蔡国','180','60','18.5','90','95/65','4.5','0','5.2','16','15')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success4";
	} else {
		echo "<br>Error4: " . $sql . "<br>" . mysqli_error($conn);
	}
	
		$sql="INSERT INTO medicine (MN,function,tabu,AR,notes,count) VALUES('桂枝','散寒解表；温通经脉；促阳化气。','在风温等热性传染病时，有高热、脉洪大而汗不出者，不宜用桂枝，如果错用了，即使只用上0.6~0.9g，也会引起鼻出血。至于原来已有口舌干燥、吐血、咯血等所谓内火的患者，更不宜用桂枝。','引起体内虚火','库存充裕','1000g')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success5";
	} else {
		echo "<br>Error5: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO medicine (MN,function,tabu,AR,notes,count) VALUES('川芎','活血行气，祛风止痛。用于月经不调，经闭痛经，症瘕腹痛，胸胁刺痛，跌扑肿痛，头痛，风湿痹痛。','1.阴虚火旺、气升痰喘、上盛下虚及气弱之人忌服，月经过多、出血性疾病及怀孕的妇女谨慎使用。2.川芎不可以和黄连、黄芪、山茱萸、狼毒，畏硝石、滑石，反藜芦等一起食用，所以，以上均不能一同使用。还有不可以过量使用，否则会回出现呕吐、眩晕等症状。3.火剧中满，脾虚食少，火郁头痛，呕吐咳嗽， 盗汗咽干口燥，发热作渴烦躁等症状的人群均不能食用，会对身体产生严重的副作用。','呕吐、眩晕等症状','库存紧张','150g')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success7";
	} else {
		echo "<br>Error7: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO medicine (MN,function,tabu,AR,notes,count) VALUES('黄芪','补气固表，利尿托毒，排脓，敛疮生肌。用于气虚乏力，食少便溏，中气下陷，久泻脱肛，便血崩漏，表虚自汗，气虚水肿黄芪圆片，痈疽难溃，久溃不敛，血虚痿黄，内热消渴;慢性肾炎蛋白尿，糖尿病。','肾虚慎用黄芪','呕吐、眩晕等症状','库存充裕','3000g')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success8";
	} else {
		echo "<br>Error8: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO medicine (MN,function,tabu,AR,notes,count) VALUES('熟地','具有补血滋阴作用，可用于血虚萎黄，眩晕，心悸失眠，月经不调，崩漏等症，亦可用于肾阴不足的潮热骨蒸、盗汗、遗精、消渴等症，是虚证类非处方药药品六味地黄丸主要成分之一。','凡脾胃虚弱、气滞痰多，脘腹胀满及食少便溏者忌服；脾虚痰多气郁之人慎服；服用时萝卜、葱白、韭白、薤白均不可食用','腹泻、腹痛、疲乏、心悸、面部痒、圆形风团、颈部向躯干及四肢蔓延，皮疹高出皮肤表面，散在分布。','库存充裕','2000g')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success9";
	} else {
		echo "<br>Error9: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO medicine (MN,function,tabu,AR,notes,count) VALUES('山药','清热，解毒。治温病发热，热毒血痢，痈疡，肿毒，瘰疬，痔漏。','糖尿病患者不可多食；爱吃火锅的人最好少吃山药；忌怀小苏打等碱性药；便秘者少食','吃太多山药也可能造成子宫内膜增生','库存告罄','0g')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success10";
	} else {
		echo "<br>Error10: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO medicine (MN,function,tabu,AR,notes,count) VALUES('当归','养血和血，补血调经，活血止痛，润肠通便。','湿阻中满及大便溏泄者慎服。畏葛蒲、海藻、牧蒙、生姜。热盛出血患者禁服，湿盛中满及大便溏泄者慎服。不宜於多痰、邪热、火嗽诸症','过敏反应 有报道复方当归注射液穴位注射引起过敏性休克。','库存紧张','100g')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success11";
	} else {
		echo "<br>Error11: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO medicine (MN,function,tabu,AR,notes,count) VALUES('赤芍','清热凉血、散瘀止痛。属清热药下属分类的清热凉血药。','血虚者慎服；不宜与藜芦同用。','过量口服当归煎剂、散剂偶有疲倦、嗜睡等反应，停药后可消失。当归挥发油穴位注射可使病人出现发热、头痛、口干、恶心。当归乙醚提出物毒性较强，少量即可造成死亡。','库存充裕','1000g')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success12";
	} else {
		echo "<br>Error12: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO prescription (username,PN,MCD,content,notes,docter) VALUES('曹操','颈椎病方','2011-05-05','川芎15克，黄芪30克，桂枝10克，羌活15克，当归20克，白芍15克，姜黄15克，桑枝10克，丹参15克，细辛5克，鸡血藤15克，红花15克，茯苓15克，甘草10克','水煎服。1日2次','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success13";
	} else {
		echo "<br>Error13: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO prescription (username,PN,MCD,content,notes,docter) VALUES('曹操','加味桃红四味汤','2011-05-06','当归10克，赤芍10克，红花10克，川芎10克，桃仁10克，川断10克，炒杜仲15克，木瓜10克，羌活10克，超大黄3克，制乳香6克，制没药10克，甘草10克，黄酒引','水煎服。1日2次','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success14";
	} else {
		echo "<br>Error14: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO prescription (username,PN,MCD,content,notes,docter) VALUES('曹操','麒麟散','2011-10-15','血竭60克，乳香30克，没药30克，制锦纹30克，地鳖虫30克，杜红花60克，当归尾120克，黄麻炭45克，参三七15克，煅自然铜30克，雄黄24克，辰砂6克，冰片3克。','共为细末，和匀。每日服1.5~3克，开水或黄酒送服。伤在上肢饭后服，伤在下肢饭前服，尤以晚饭前后服为宜。','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success15";
	} else {
		echo "<br>Error15: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO prescription (username,PN,MCD,content,notes,docter) VALUES('蔡恒公','珊瑚接骨丹','2011-05-07','珊瑚10克，石决明30克，降香20克，乳香20克，代赭石20克，炉甘石20克，没药20克，西红花5克，寒水石20克，杜仲20克，银珠10克，麝香1克，三七10克，黄瓜子20克，自然铜20克，石膏20克','以上十六味除麝香另研，其余粉碎成细粉，过筛，混匀；再兑入麝香细粉，混匀，制成黄豆大小丸。银珠挂衣，晾干，备用，一次9~13克，1日2次，白开水送服','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success16";
	} else {
		echo "<br>Error16: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO prescription (username,PN,MCD,content,notes,docter) VALUES('蔡恒公','腰脱方','2011-05-08','熟地20克，山药15克，山萸肉15克，茯苓20克，当归20克，鸡血藤15克，红花15克，续断15克，杜仲15克，山甲10克，黄芪30克，木瓜15克，细辛5克，没药10克','水煎服，1日2次。','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success17";
	} else {
		echo "<br>Error17: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO prescription (username,PN,MCD,content,notes,docter) VALUES('刘备','腰脱方','2011-05-06','熟地20克，山药15克，山萸肉15克，茯苓20克，当归20克，鸡血藤15克，红花15克，续断15克，杜仲15克，山甲10克，黄芪30克，木瓜15克，细辛5克，没药10克','水煎服，1日2次。','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success18";
	} else {
		echo "<br>Error18: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO prescription (username,PN,MCD,content,notes,docter) VALUES('秦襄王','加味桃红四味汤','2011-05-08','当归10克，赤芍10克，红花10克，川芎10克，桃仁10克，川断10克，炒杜仲15克，木瓜10克，羌活10克，超大黄3克，制乳香6克，制没药10克，甘草10克，黄酒引','水煎服，1日2次。','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success19";
	} else {
		echo "<br>Error19: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO inha_info (inha_ID,name,sex,age,num,addr,height,weight,TZZS,HR,BP,BG,BMD,SS,INPR,hear) VALUES('20003','刘备','男','40','12345678910','蜀国','175','50','18.5','90','95/65','4.5','0.5','5.2','16','15')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success20";
	} else {
		echo "<br>Error20: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO inha_info (inha_ID,name,sex,age,num,addr,height,weight,TZZS,HR,BP,BG,BMD,SS,INPR,hear) VALUES('20004','秦襄王','男','60','12345678910','秦国','185','70','17','90','95/65','4.5','-0.5','5.2','16','15')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success21";
	} else {
		echo "<br>Error21: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO doc_inha (doc_ID,doc_name,inha_ID,inha_name) VALUES('30001','华佗','20001','曹操')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success22";
	} else {
		echo "<br>Error22: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO doc_inha (doc_ID,doc_name,inha_ID,inha_name) VALUES('30001','华佗','20003','刘备')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success23";
	} else {
		echo "<br>Error23: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO doc_inha (doc_ID,doc_name,inha_ID,inha_name) VALUES('30002','扁鹊','20002','蔡恒公')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success24";
	} else {
		echo "<br>Error24: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO doc_inha (doc_ID,doc_name,inha_ID,inha_name) VALUES('30002','扁鹊','20004','秦襄王')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success25";
	} else {
		echo "<br>Error25: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO diagnosis (pation_ID,symptom,conclu,diag_time,doc_name) VALUES('20002','恶心、厌油腻、食欲差、全身乏力;肝区不适和肝区疼痛;牙龈出血','患有较严重的肝病','2011-05-06','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success26";
	} else {
		echo "<br>Error26: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO diagnosis (pation_ID,symptom,conclu,diag_time,doc_name) VALUES('20001','柏油便、肝脾肿大、牙龈出血、骨压痛、继发感染、眼底出血和渗出。容易发生青肿，点状出血，贫血，持续发烧，感染经久不愈。','白血病初期','2011-05-07','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success27";
	} else {
		echo "<br>Error27: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO diagnosis (pation_ID,symptom,conclu,diag_time,doc_name) VALUES('20002','上腹疼痛，疼痛多数无规律、腹胀、嗳气、反复出血','慢性浅表性胃炎','2012-05-06','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success28";
	} else {
		echo "<br>Error28: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO diagnosis (pation_ID,symptom,conclu,diag_time,doc_name) VALUES('20001','具有上腹痛、上腹胀、早饱、嗳气、食欲不振、恶心、呕吐等上腹不适症状；排除肝胃疾病','功能性消化不良','2012-08-06','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success29";
	} else {
		echo "<br>Error29: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO diagnosis (pation_ID,symptom,conclu,diag_time,doc_name) VALUES('20003','膝关节过伸，膝关节屈曲受限，股四头肌紧张呈挛缩状，髂胫束紧张','先天性膝关节脱位早期','2012-08-06','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success30";
	} else {
		echo "<br>Error30: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO diagnosis (pation_ID,symptom,conclu,diag_time,doc_name) VALUES('20004','膝关节过伸，膝关节屈曲受限，股四头肌紧张呈挛缩状，髂胫束紧张','先天性膝关节脱位早期','2012-08-06','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success31";
	} else {
		echo "<br>Error31: " . $sql . "<br>" . mysqli_error($conn);
	}
	
			$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周一','早餐','米粥，油条，豆浆，鸡蛋','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success33";
	} else {
		echo "<br>Error33: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周一','午餐','花卷，冬瓜紫花汤，肉丝炒芹菜','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success34";
	} else {
		echo "<br>Error34: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周一','晚餐','米饭，冬瓜紫菜汤，凉拌笋丝','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success35";
	} else {
		echo "<br>Error35: " . $sql . "<br>" . mysqli_error($conn);
	}
	
			$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周二','早餐','油饼，鸡蛋，牛奶，饼干','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success36";
	} else {
		echo "<br>Error36: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周二','午餐','米饭，清炒虾仁，蒜茸茄子，凉拌丝瓜','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success37";
	} else {
		echo "<br>Error37: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周二','晚餐','米饭，豆腐汤，肉丝炒豆芽，黄瓜炒鸡蛋','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success38";
	} else {
		echo "<br>Error38: " . $sql . "<br>" . mysqli_error($conn);
	}
	
			$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周三','早餐','稀饭，牛奶，煮蛋','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success39";
	} else {
		echo "<br>Error39: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周三','午餐','米饭，凉拌皮蛋，肉丝芹菜','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success40";
	} else {
		echo "<br>Error40: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周三','晚餐','馒头，清蒸鱼，冬瓜汤，香菇炒肉丝','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success41";
	} else {
		echo "<br>Error41: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周四','早餐','粥，牛奶，鸡蛋','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success42";
	} else {
		echo "<br>Error42: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周四','午餐','馒头，冬瓜汤，烧茄子，番茄炒鸡蛋','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success43";
	} else {
		echo "<br>Error43: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周四','晚餐','米饭，冬瓜紫菜汤，炸虾，毛豆炒豆腐干','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success44";
	} else {
		echo "<br>Error44: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周五','早餐','花卷，米粥，鸡蛋','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success45";
	} else {
		echo "<br>Error45: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周五','午餐','馒头，香菇炒豆腐，鱼丸汤，肉末炒豆角','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success46";
	} else {
		echo "<br>Error46: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周五','晚餐','米饭，醋溜土豆丝，炒空心菜，冬瓜骨头汤','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success47";
	} else {
		echo "<br>Error47: " . $sql . "<br>" . mysqli_error($conn);
	}
	
			$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周六','早餐','油条，鸡蛋，豆浆','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success48";
	} else {
		echo "<br>Error48: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周六','午餐','馒头，尖椒土豆丝，麻辣鸡丝，韭菜炒鱿鱼','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success49";
	} else {
		echo "<br>Error49: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周六','晚餐','米饭，冬瓜紫菜汤，香酥鸡腿，黄豆炒香干','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success50";
	} else {
		echo "<br>Error50: " . $sql . "<br>" . mysqli_error($conn);
	}
	
			$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周日','早餐','油饼，鸡蛋，豆腐脑','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success51";
	} else {
		echo "<br>Error51: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周日','午餐','米饭，炖牛肉，炒素什锦，菠菜炒鸡蛋','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success52";
	} else {
		echo "<br>Error52: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('曹操','周日','晚餐','馒头，红烧带鱼，糖醋圆白菜，炖海带','华佗')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success53";
	} else {
		echo "<br>Error53: " . $sql . "<br>" . mysqli_error($conn);
	}
	
			$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周一','早餐','馒头，牛奶，煮荷包蛋，酱黄瓜','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success54";
	} else {
		echo "<br>Error54: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周一','午餐','米饭，香菇菜心，糖醋带鱼，丝瓜汤','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success55";
	} else {
		echo "<br>Error55: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周一','晚餐','绿豆粥，白菜猪肉包子，虾皮冬瓜','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success56";
	} else {
		echo "<br>Error56: " . $sql . "<br>" . mysqli_error($conn);
	}
	
			$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周二','早餐','窝窝头，牛奶，卤蛋，豆腐乳','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success57";
	} else {
		echo "<br>Error57: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周二','午餐','米饭，肉末茄子，鸭子海带汤','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success58";
	} else {
		echo "<br>Error58: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周二','晚餐','干煸豆角，稀饭，豆沙包，青椒肉丝','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success59";
	} else {
		echo "<br>Error59: " . $sql . "<br>" . mysqli_error($conn);
	}
	
			$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周三','早餐','肉包子，牛奶，咸鸭蛋（半个）','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success60";
	} else {
		echo "<br>Error60: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周三','午餐','馒头，黄豆烧牛肉，干煸四季豆，鸡蛋汤','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success61";
	} else {
		echo "<br>Error61: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周三','晚餐','炒面，清炒菠菜，青椒土豆丝','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success62";
	} else {
		echo "<br>Error62: " . $sql . "<br>" . mysqli_error($conn);
	}
	
			$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周四','早餐','花卷，牛奶，煮荷包蛋','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success63";
	} else {
		echo "<br>Error63: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周四','午餐','米饭，黑木耳肉片，红烧平鱼，白萝卜海带排骨汤','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success64";
	} else {
		echo "<br>Error64: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周四','晚餐','豆浆或稀饭，葱花饼，青椒芹菜肉丝','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success65";
	} else {
		echo "<br>Error65: " . $sql . "<br>" . mysqli_error($conn);
	}
	
		$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周五','早餐','菜包子，牛奶','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success66";
	} else {
		echo "<br>Error66: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周五','午餐','米饭，炒菜花，辣子鸡丁，香菇青菜汤','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success67";
	} else {
		echo "<br>Error67: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周五','晚餐','芹菜肉包子，西红柿炒鸡蛋，肉末烧豆腐','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success68";
	} else {
		echo "<br>Error68: " . $sql . "<br>" . mysqli_error($conn);
	}
	
		$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周六','早餐','面包，牛奶，煎鸡蛋','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success69";
	} else {
		echo "<br>Error69: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周六','午餐','米饭，五香鱼，黄豆芽炒胡萝卜，香菇汤','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success70";
	} else {
		echo "<br>Error70: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周六','晚餐','馒头，玉米粥，番茄炒蛋，鱼香肉丝','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success71";
	} else {
		echo "<br>Error71: " . $sql . "<br>" . mysqli_error($conn);
	}
	
		$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周日','早餐','花卷，牛奶，煮鸡蛋','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success72";
	} else {
		echo "<br>Error72: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周日','午餐','米饭，黑木耳炒鸡丁，糖醋白菜，南瓜汤','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success73";
	} else {
		echo "<br>Error73: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	$sql="INSERT INTO cookbook (username,weekday,notes,content,docter) VALUES('蔡恒公','周日','晚餐','韭菜猪肉饺子，豆豉油麦菜，肉末炒豇豆','扁鹊')";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success74";
	} else {
		echo "<br>Error74: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	mysqli_close($conn);
	?>
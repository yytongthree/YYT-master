<?php
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
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
	
	mysqli_close($conn);
	?>
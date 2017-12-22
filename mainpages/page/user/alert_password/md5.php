<?php
	session_start();
	if($_GET['action']=='ok'){
	$value=$_POST['value'];
	$value=md5($value);
	echo $value;
	}
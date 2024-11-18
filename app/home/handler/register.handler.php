<?php

	// +----------------------------------------------------------------------
	// | 注册功能
	// | 设计思路，首先判断用户输入的数据是否正确，在判断用户的邮箱有没有注
	// | 过，满足条件，注册成功，ajaxReturn函数在include.php中
	// +----------------------------------------------------------------------

	//引用常用的函数
	require_once('../../../config/config.php');

	//获取前台发来的数据
	$name = $_POST['name'];//获取用户名
	$password = $_POST['password'];//获取密码
	$email = $_POST['email'];//获取游戏
	$password_o = $_POST['password_o'];//获取重复密码

	//判断用户名
	if(!$name) {
		ajaxReturn(0,'用户名格式不正确，英文加数字！');
	}
	//判断密码是否输入正确
	if(!is_password($password)) {
		ajaxReturn(0,'密码格式不正确,不少于6位！');
	}
	//判断邮箱是否输入正确
	if(!is_email($email)) {
		ajaxReturn(0,'邮箱格式不正确!');
	}
	//判断两次密码输入是否一致
	if($password != $password_o) {
		ajaxReturn(0,'两次输入的密码不一致！');
	}

	//查询数据库是否已经注册过此邮箱
	$sql = "SELECT * FROM users WHERE email='$email'";
	$result1 = fetchAll($link,$sql);

	if($result1) {
		ajaxReturn(0,'抱歉，此邮箱已经注册过！');	
	}

	$data = array(
		'name'=>$name,
		'password'=>$password,
		'email'=> $email,
		'addtime'=>date('Y-m-d H:i:s')
	);

	//保存用户的注册信息到users表,其中的$link在include.php里
	$result2 = insert($link,$data,'users');

	//注册成功和失败的话，返回提示
	if(!$result2) {
		ajaxReturn(0,'注册失败！');
	}else{
		ajaxReturn(1,'恭喜你注册成功');
	}

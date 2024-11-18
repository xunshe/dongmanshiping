<?php

	// +---------------------------------------------------------------------------------------------
	// | 修改管理员密码功能
	// +----------------------------------------------------------------------------------------------
	
	//引用常用帮助的函数
	require_once('../../../config/config.php');


	//获取发送来的数据
    $password = $_POST['password'];//获取密码
    $password_o = $_POST['password_o'];//获取重复密码
    $admin_id = $_SESSION['admin']['id'];

    //判断密码是否输入正确
	if(!$password) {
		ajaxReturn(0,'请输入密码！');
	}

	//判断两次密码输入是否一致
	if($password != $password_o) {
		ajaxReturn(0,'两次输入的密码不一致！');
	}

	$data = array(
		'password'=>$password
	);

	$where = "id=".$admin_id;

	//更新密码
	$result = update($link,$data,'users',$where);

	if($result) {
		ajaxReturn(1,'密码修改成功');
	}else{
		ajaxReturn(0,'密码修改失败');
	}
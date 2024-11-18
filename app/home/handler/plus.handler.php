<?php
	// +----------------------------------------------------------------------
	// |用户升级为会员
	// +----------------------------------------------------------------------
	
	//引用常用的函数
	require_once('../../../config/config.php');

	$user_id = $_SESSION['user']['id'];
	$sql = "SELECT * FROM users WHERE id='$user_id'";
	$user = fetchOne($link,$sql);

	if($user['is_vip'] == 1) {
		ajaxReturn(0,"已经是会员，不用再升级");
	}

	$where = 'id='.$user_id;

	$data = array(
		'is_vip'=>1
	);

	$result = update($link,$data,'users',$where);

	//判断删除成功与否，给予提示
	if($result) {
		ajaxReturn(1,'升级会员成功');
	}else{
		ajaxReturn(0,'升级失败！');
	}
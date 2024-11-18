<?php

	// +----------------------------------------------------------------------
	// | 添加分类功能
	// | 设计思路，首先判断后台输入的数据是否正确，在判断分类名有没有重名
	// | ，满足条件，添加成功，ajaxReturn函数在include.php中
	// +----------------------------------------------------------------------

	//引用常用的函数
	require_once('../../../config/config.php');

	//获取前台发来的数据
	$category_name = $_POST['category_name'];//获取用户名

	//判断分类名
	if(!$category_name) {
		ajaxReturn(0,'请输入分类名！');
	}

	//查询数据库是否已经有此分类名
	$sql = "SELECT * FROM categorys WHERE category_name='$category_name'";

	$result1 = fetchAll($link,$sql);

	if($result1) {
		ajaxReturn(0,'抱歉，分类名不能重名！');	
	}

	//组装数据
	$data = array(
		'category_name'=>$category_name,
		'addtime'=>date('Y-m-d H:i:s'),
	);

	//保存标签到tags表,其中的$link在include.php里
	$result2 = insert($link,$data,'categorys');

	//注册成功和失败的话，返回提示
	if(!$result2) {
		ajaxReturn(0,'添加失败！');
	}else{
		ajaxReturn(1,'添加成功');
	}

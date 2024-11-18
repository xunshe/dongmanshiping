<?php
	// +----------------------------------------------------------------------
	// |    后台删除用户评论功能
	// +----------------------------------------------------------------------
	

	//引用常用的函数
	require_once('../../../config/config.php');

	//获取发来的数据
	$id = $_POST['id']; //获取数据的id，比如这篇文章的id
	$table = $_POST['table']; //获取此数据对应的表名，比如此文章对应的数据库表

	//需要同时获取到两个数据，不然提示参数错误
	if(!$id && !$table) {
		ajaxReturn(0,'抱歉，参数错误！');
	}

	//删除数据操作,mysql_delete()在common/mysql.php下,我们通过require_once('../../../config/config.php')引入了进来
	 $result = mysql_delete($link,$table,'id='.$id);

	//判断删除成功与否，给予提示
	if($result) {
		ajaxReturn(1,'删除成功！');
	}else{
		ajaxReturn(0,'删除失败！');
	}
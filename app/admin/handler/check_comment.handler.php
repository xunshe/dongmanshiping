<?php
	// +----------------------------------------------------------------------
	// |    后台审核用户发布的评论
	// +----------------------------------------------------------------------
	

	//引用常用的函数
	require_once('../../../config/config.php');

	//获取发来的数据
	$id = $_POST['id']; //获取数据的id
	//检查是否正确获取到id
	if(!$id) {
		ajaxReturn(0,'抱歉，参数错误！');
	}

	//查看当前评论的状态
	$sql = "SELECT * FROM comments WHERE id='$id'";
	$result = fetchOne($link,$sql);

	if($result['status'] == 1 ) {
		//如果当前状态是审核通过状态，那么限制
		$data = array('status'=>0);
		$result2 = update($link,$data,'comments','id='.$id);
		if($result2) {
			ajaxReturn(1,'限制此评论成功！');
		}else{
			ajaxReturn(0,'审核失败，请重试！');
		}
	}

	if($result['status'] == 0 ) {
		//如果当前状态是限制状态，那么通过
		$data = array('status'=>1);
		$result2 = update($link,$data,'comments','id='.$id);
		if($result2) {
			ajaxReturn(1,'此评论通过审核！');
		}else{
			ajaxReturn(0,'审核失败，请重试！');
		}
	}

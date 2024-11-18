<?php
	// +----------------------------------------------------------------------
    // | 用户收藏电影功能
    // +----------------------------------------------------------------------
    
	//引用常用的函数
	require_once('../../../config/config.php');

	//获取音乐id
	$id = $_POST['id'];

    //获取评论的用户id
    $user_id = $_SESSION['user']['id'];

    //判断用户有没有登录，没有登录不准收藏
    if(!$user_id) {
    	ajaxReturn(0,'抱歉，请登录后在收藏！');
    }

    //判断有没有收藏过此音乐
    $sql = "SELECT * FROM collects WHERE user_id='$user_id' AND movie_id='$id'";
    $result2 = fetchOne($link,$sql);
    if($result2) {
        ajaxReturn(0,'此电影已经收藏过');
    }

    //组装数据
    $data = array(
    	'movie_id'=>$id,
    	'user_id'=>$user_id,
    	'addtime'=>date('Y-m-d H:i:s')
    );

    //把组装的数据插入到数据库collects表中
    $result = insert($link,$data,'collects');

    if($result) {
    	   ajaxReturn(1,'收藏成功！');
    }else{
    	   ajaxReturn(0,'收藏失败！');
    }

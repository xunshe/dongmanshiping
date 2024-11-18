<?php

	// +----------------------------------------------------------------------
    // | 用户评论功能
    // +----------------------------------------------------------------------
    
		
	//引用常用的函数
	require_once('../../../config/config.php');

	//获取用户的评论
	$comment_content = $_POST['comment_content'];

	//获取评论的帖子id
	$movie_id = $_POST['movie_id'];

    //获取评论的用户id
    $user_id = $_SESSION['user']['id'];

	//判断用户输入的评论内容是否为空
	if (empty($comment_content)) {
		notice("请输入评论内容");
    }

    //判断用户有没有登录，没有登录不准评论
    if(!$user_id) {
    	notice("请登录后再评论");
    }

    //判断参数
    if(!$movie_id) {
    	notice("参数错误，请刷新后重新评论");
    }

    //组装评论的数据
    $data = array(
    	'comment_content'=>$comment_content,
    	'movie_id'=>$movie_id,
    	'user_id'=>$user_id,
    	'addtime'=>date('Y-m-d H:i:s')
    );

    //把组装的数据插入到数据库commits表中
    $result = insert($link,$data,'comments');


    if($result) {
    	   noticeUrl("评论成功","/dongmanshiping/app/home/detail.php?id=".$movie_id);
    }else{
    	   ajaxReturn(0,'留言失败！');
    }

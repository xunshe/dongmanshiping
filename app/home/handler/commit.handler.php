<?php

	// +----------------------------------------------------------------------
    // | 用户评论功能
    // +----------------------------------------------------------------------
    
		
	//引用常用的函数
	require_once('../../../config/config.php');

	//获取用户的评论
	$comment_content = $_POST['comment_content'];

	//获取评论的帖子id
	$music_id = $_POST['music_id'];

    //获取评论的用户id
    $user_id = $_SESSION['user']['id'];

	//判断用户输入的评论内容是否为空
	if (empty($comment_content)) {
		//如果为空，返回提示信息
        ajaxReturn(0, '请输入评论内容');
    }

    //判断用户有没有登录，没有登录不准评论
    if(!$user_id) {
    	ajaxReturn(0,'抱歉，请登录后在评论！');
    }

    //判断参数
    if(!$music_id) {
    	ajaxReturn(0,'抱歉，留言失败，刷新后重试');
    }

    //组装评论的数据
    $data = array(
    	'comment_content'=>$comment_content,
    	'music_id'=>$music_id,
    	'user_id'=>$user_id,
    	'addtime'=>date('Y-m-d H:i:s')
    );

    //把组装的数据插入到数据库commits表中
    $result = insert($link,$data,'comments');


    if($result) {
    	   ajaxReturn(1,'留言成功！');
    }else{
    	   ajaxReturn(0,'留言失败！');
    }

<?php
	// +----------------------------------------------------------------------
	// | 后台添加视频
	// +----------------------------------------------------------------------

	//引用常用帮助的函数
	require_once('../../../config/config.php');
	//获取发送来的数据
	$title = $_POST['title'];
	$category_id = $_POST['category_id'];
	$time = $_POST['time'];
	$description = $_POST['description'];
	$status = $_POST['status'];
	$tuijian = $_POST['tuijian'];
	$where = "id=".$_POST['id'];

	//判断后台的信息有没有填写完整
	if(empty($title)) {
		notice("请输入动漫标题");
	}

	//判断有没有上传专辑
	if(empty($category_id)) {
		notice("请选择动漫分类");
	}

	//判断有没有上传歌曲时间
	if(empty($time)) {
		notice("请输入视频时长");
	}

	//判断后台的信息有没有填写完整
	if(empty($description)) {
		notice("请输入视频描述");
	}


	//组装要插入数据库的数据
	$data = array(
		'title' =>$title,                                           
		'category_id'=>$category_id,
		'time'=>$time,
		'description'=>$description,
		'status'=>$status,
		'tuijian'=>$tuijian,
		'addtime'=>date('Y-m-d H:i:s'),
	);

	$result = update($link,$data,'movies',$where);

	if($result) {
		echo "<script>alert('数据修改成功！');window.location.href='/dongmanshiping/app/admin/movies.php';</script>";
	}else{
		echo "<script>alert('修改失败，请重试！');history.back();</script>";
	}






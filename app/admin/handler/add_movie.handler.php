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
	$img = $_FILES['img'];
	$path = $_FILES['path'];
	$description = $_POST['description'];
	$tuijian = $_POST['tuijian'];
	$status = $_POST['status'];

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


	if(empty($img['tmp_name'])) {
		notice("请上传正确视频封面（JPG格式）");
	}

	if(empty($path['tmp_name'])) {
		notice("请上传正确的视频文件（MP4格式）");
	}


	
	//具体上传图片操作,其中上传图片的函数在common/helpers.php里
	// 第一个参数是文件名  ，第二个是保存的地址
	$img1 = uploadImg($img,'../../../public/uploads');

	//如果上传图片失败，提示
	if(!$img1) {
		exit('上传图片失败！');
	}

    $video = uploadVideo($path,'../../../public/uploads');
	if(!$video) {
		exit('上传动漫视频失败');
	}

	//组装要插入数据库的数据
	$data = array(
		'title' =>$title,                                           
		'category_id'=>$category_id,
		'time'=>$time,
		'img'=>$img1,
		'description'=>$description,
		'status'=>$status,
		'path'=>$video,
		'tuijian'=>$tuijian,
		'addtime'=>date('Y-m-d H:i:s'),
	);

	$result = insert($link,$data,'movies');

	if($result) {
		echo "<script>alert('数据保存成功！');window.location.href='/dongmanshiping/app/admin/movies.php';</script>";
	}else{
		echo "<script>alert('保存失败，请重试！');history.back();</script>";
	}






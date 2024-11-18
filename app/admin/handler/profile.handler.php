<?php

	// +---------------------------------------------------------------------------------------------
	// | 管理员个人资料
	// +----------------------------------------------------------------------------------------------
	
	//引用常用帮助的函数
	require_once('../../../config/config.php');


	//获取发送来的数据
	$avatar = $_FILES['avatar'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$info = $_POST['info'];
	$id = $_SESSION['admin']['id'];
	//具体上传头像操作,其中上传图片的函数在common/helpers.php里
	// 参数$avatar是文件  ，第二个是保存的地址
	if(!empty($avatar['tmp_name'])) {
		$img2 = uploadImg($avatar,'../../../public/uploads');

		//如果上传图片失败，提示
		if(!$avatar) {
			exit('上传图片失败！');
		}

		//组装数据
		$data = array(
			 'avatar' => $img2,
			 'phone'=>$phone,
			 'address'=>$address,
			 'info'=>$info,
			 'addtime'=>date('Y-m-d H:i:s'),
		);

		$where = "id=".$id;
		$result2 = update($link,$data,'users',$where);

		if($result2) {
			echo "<script>alert('信息修改成功！');window.location.href='/app/admin/admin.php';</script>";
		}else{
			echo "<script>alert('修改失败，请重试！');window.location.href='/app/admin/admin.php';</script>";
		}
	}


	//组装数据
		$data = array(
			 'phone'=>$phone,
			 'address'=>$address,
			 'info'=>$info,
			 'addtime'=>date('Y-m-d H:i:s'),
		);

		$where = "id=".$id;
		$result2 = update($link,$data,'users',$where);

		if($result2) {
			echo "<script>alert('信息修改成功！');window.location.href='/app/admin/admin.php';</script>";
		}else{
			echo "<script>alert('修改失败，请重试！');window.location.href='/app/admin/admin.php';</script>";
		}



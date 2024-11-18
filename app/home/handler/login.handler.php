<?php
    // +----------------------------------------------------------------------
    // | 登录功能
    // | 设计思路，获取到用户输入的账号和密码，验证用户输入的数据，验证通过，
    // | 保存用户的登录信息到数据库，并且生成cookie，提示用户登录成功
    // +----------------------------------------------------------------------

	//引用常用的函数
	require_once('../../../config/config.php');

	//获取登录的用户名
	$name = $_POST['name'];
	//获取用户的登录密码
	$password = $_POST['password'];
    //获取登录的角色
    $role = $_POST['role'];

	//判断用户输入的用户名是否为空
	if (!$name) {
		//如果为空，返回提示信息
        ajaxReturn(0, '请输入用户名');
    }

    //判断用户输入的密码是否为空
    if (!$password) {
    	   ajaxReturn(0,'请输入密码');
    }

    //sql语句
    $sql = "SELECT * FROM users WHERE name='$name' AND password='$password'";
    //查询数据库用户记录，fetchOne函数在mysql.php里
    $result = fetchOne($link,$sql);
    
    //如果没有查询到此用户
    if(!$result) {
    	   ajaxReturn(0,'抱歉，登录名和密码错误！');
    }else {
    	//保存用户的session
    	$user = array(
            'id'=>$result['id'],
            'name'=>$result['name'],
            'avatar' =>$result['avatar'],
            'role'=>$result['is_admin']
        );

        //如果是用户登录
        if($role == 1) {
            //设置session,失效时间1小时
            $_SESSION["user"]=$user;
            ajaxReturn(1,'恭喜你，登录成功！');
        }

        //如果是管理员登录
        if($role == 2 ) {
            //判断是否是管理员
            if($result['is_admin'] == 1) {
                //设置session,失效时间1小时
                $_SESSION["admin"]=$user;
                //提示登录成功
                ajaxReturn(2,'恭喜你，登录成功！');
            }else{
                //如果不是管理员，给予提示
                ajaxReturn(0,'抱歉，你不是管理员！');
            }
        }
        
    }
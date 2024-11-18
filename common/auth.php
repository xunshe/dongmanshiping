<?php
  	// +----------------------------------------------------------------------
    // | 用户的权限控制自定义函数
    // | 主要用于判断用户是否登录后，拥有权限，比如管理员是否有权限进入后台，
	// | 用户是否登录，是否有权限进入个人资料页面编辑等
    // +----------------------------------------------------------------------

	/**
	* 管理员验证登陆
	*/
	function validateAdmin() {
	    if (empty($_SESSION['admin']) && @$_SESSION['admin']['role'] != 1){
	        redirect('/app/home/login.php');
	    } 
	}

	//判断用户是否登录，如果没有登录，转跳到登录页面
	function validateUser() {
	    if (empty($_SESSION['user']) && @$_SESSION['user']['role'] != 0){
	        redirect('/app/home/login.php');
	    } 
	}

	//判断用户是否拥有权限
	function isPower(){
		
	}
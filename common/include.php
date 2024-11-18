<?php
    // +----------------------------------------------------------------------
    // | 包含文件
    // | 设计思路，此文件就是把common文件夹下的所有php辅助函数文件统一到一起，当我们需
    // | 引用的时候，就不用每次都要一个个引入这些文件，我们还启动了数据库链接和会话，就
    // | 无需每次写数据库时都要手动写链接 
    // +----------------------------------------------------------------------

//引入数据库函数
require_once(APP_ROOT.'/common/mysql.php');
//引入帮助函数
require_once(APP_ROOT.'/common/helpers.php');
//引入权限
require_once(APP_ROOT.'/common/auth.php');

//数据库链接开始,connect()函数在mysql.php里，用于启动链接数据库
$link=connect();

if(!isset($_SESSION)) {
    //如果没有开启，那么开启  
    session_start();  
}

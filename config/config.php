<?php
	//设置host
	define("DB_HOST","127.0.0.1");
	//设置数据库用户名
	define("DB_USER","root");
	//设置数据库密码
	define("DB_PWD","root");
	//设置数据库编码
	define("DB_CHARSET","utf8");
	//设置数据库名
	define("DB_DBNAME","dongmanshiping");

	//设置时区
	date_default_timezone_set("PRC");

	//设置网站的根目录,
	define("APP_ROOT",realpath(dirname(__FILE__).'/../'));

	date_default_timezone_set('PRC');//设置中国时区

	//引入common下的include.php，因为我们写的重要的辅助函数都在include.php下,其中include.php的辅助函数在common文件夹下
	include(APP_ROOT.'/common/include.php');

?>




<?php

	#定义系统入口
	define('THINK_PATH', './Kernel/ThinkPHP');

	#定义项目名称
	define('APP_NAME', 'home');

	#定义项目入口
	define('APP_PATH', './Home');

	#读取系统入口文件
	require(THINK_PATH."/ThinkPHP.php");

	#实例化，运行
	App::run();

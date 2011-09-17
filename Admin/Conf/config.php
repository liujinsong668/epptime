<?php
	return array(
		//'配置项'=>'配置值'
		
	
		//生产环境设置
		'APP_DEBUG'					=>	TRUE,
		'APP_AUTOLOAD_PATH'			=> 'Think.Util.,ORG.Util.',		//自带以及扩展类库的自动加载，注意有顺序区别	
		
		//URL策略设置
		'URL_MODEL'					=>	'1',						//此方式为path_info模式
		'URL_CASE_INSENSITIVE' 		=>	true,						//Url可以大小写通用
		
		//数据库相关设置
		'DB_TYPE'					=>	'mysql',   					// 数据库类型   
		'DB_HOST'					=> 	'localhost', 				// 数据库服务器地址   
		'DB_NAME'					=>	'LeafCMS',  				// 数据库名称   
		'DB_USER'					=>	'liujinsong',				// 数据库用户名   
	 	'DB_PWD'					=>	'liu871522', 				// 数据库密码   
		'DB_PORT'					=>	'3306', 					// 数据库端口   
		'DB_PREFIX'					=>	'leaf_', 					// 数据表前缀 
		'DB_FIELDS_CACHE'			=>	false,						// 数据库结构缓存，建议在开发的时候关闭
	
	   //模板替换常量 
		TMPL_PARSE_STRING  => array(   

     	'__CSS__'					=>	'/Public/Admin/Css',  		// 后台模块的CSS路径  
		'__JS__'					=>	'/Public/Admin/Js',  		// 后台模块的CSS路径 
		'__IMG__'					=>	'/Public/Admin/Images',  	// 后台模块的CSS路径  
     	'__UPLOAD__' 				=>	'/Public/Uploads/',  		// 上传文件的路径   
	
		),
	  //错误和日志处理
	   //'ERROR_PAGE' 				=>  '/Public/Html/error.html',  //在线上环境开启，编写代码关闭
	  
	   //语言设置	
	    'LANG_SWITCH_ON'   			=>  true,  
	 	'DEFAULT_LANG' 				=> 	'en-us',
		'LANG_AUTO_DETECT'  	    =>  true, 
		
	);
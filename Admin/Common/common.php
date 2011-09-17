<?php
//此为项目的常用函数库，供开发使用,只用于处理与逻辑无关系的数据
	load('extend');
	
	//判断文章状态函数
	function item_status($i){
		if($i==0){
			$status="未审核";
		}else{
			$status="已审核";
		}
		return $status;
	}
	
	//判断分类状态函数
	function category_status($i){
		if($i==0){
			$status="文章分类";
		}else{
			$status="单页面";
		}
		return $status;
	}
	
	//根据栏目的层级来给处栏目标题样式 
	function tree_title($title,$level){
		$level=$level-1;
		$str=str_repeat("&nbsp;", $level*12)."└───".$title;
		return $str;
	}
?>
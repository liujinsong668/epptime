<?php
// 此为后台内容发布类
class ItemAction extends CommonAction{
	
    /**
    +----------------------------------------------------------
    * 文章列表
    +----------------------------------------------------------
    */
    public function index(){
    	$item = new CommonModel('item');
    	$count = $item->count();
    	$p=new Page($count,10);
    	$page=$p->show();
    	$item=$item->order('item_id DESC')->limit($p->firstRow.','.$p->listRows)->select();
    	foreach($item as $key => $list){
			$item[$key]['category_title']=$this->get_category($list['category_id']);
		}
    	$this->assign('page', $page);
    	$this->assign("list",$item);
    	$this->display();
    }
    
    /**
    +----------------------------------------------------------
    * 渲染增加文章
    +----------------------------------------------------------
    */
  	public function add(){
  		$category=new CommonModel('category');
  		$category=$category->field("*,concat(level,'-',category_id) as tree")->order('tree')->select();
  		foreach ($category as $key => $list){
			$category[$key]['level']=count(explode('-', $list['level']));
		}
  		$this->assign("list",$category);
  		$this->display();
  	}
  	
  	/**
    +----------------------------------------------------------
    * 执行增加文章动作
    +----------------------------------------------------------
    */
  	public function insert(){
  		$item=new CommonModel('item');
  		if($item->create()){
  			$item->publish_time=time();
  			if($item->add()){
  				$this->redirect('item/index', array(), 2,'添加文章成功');
  			}else{
  				$this->redirect('item/add', array(), 2,'添加文章失败');
  			}
  		}else{
  			$this->redirect('item/add', array(), 2,'添加文章失败');
  		}
  	}
  	
  	/**
    +----------------------------------------------------------
    * 渲染修改文章
    +----------------------------------------------------------
    */
  	public function edit(){
  		$id=$_GET['id'];
  		$item=new CommonModel('item');
  		$item=$item->where("item_id=$id")->find();
  		$category=new CommonModel('category');
  		$category=$category->field("*,concat(level,'-',category_id) as tree")->order('tree')->select();
  		foreach ($category as $key => $list){
			$category[$key]['level']=count(explode('-', $list['level']));
		}
  		$item['category_title']=$this->get_category($item['category_id']);
  		$this->assign("list",$item);
  		$this->assign("clist",$category);
  		$this->display();
  	}
  	
	/**
    +----------------------------------------------------------
    * 执行修改文章动作
    +----------------------------------------------------------
    */
  	public function update(){
  		$id=$_GET['id'];
  		$item=new CommonModel('item');
  		if($item->create()){
  			$item->publish_time=time();
  			if($item->save()){
  				$this->redirect('item/index', array(), 2,'编辑文章成功');
  			}else{
  				$this->redirect("item/edit/id/$id", array(), 2,'编辑文章失败');
  			}
  		}else{
  			$this->redirect('item/index', array(), 2,'编辑文章失败');
  		}
  	}
  	
	/**
    +----------------------------------------------------------
    * 删除文章
    +----------------------------------------------------------
    */
  	public function delete(){
  		$id=$_GET['id'];
  		$item=new CommonModel('item');
  		$status=$item->where("item_id=$id")->delete();
  		if($status){
  			$this->redirect('item/index', array(), 2,'删除成功');
  		}else{
  			$this->redirect('item/index', array(), 2,'删除失败');
  		}
  	}
  	
  	/**
    +----------------------------------------------------------
    * 根据栏目id取得栏目名称
    +----------------------------------------------------------
    */
	protected function get_category($id){
			$cat=new CommonModel('category');
			$cat=$cat->where("category_id=$id")->find();
			return $cat['category_title'];
	}
}
	


	
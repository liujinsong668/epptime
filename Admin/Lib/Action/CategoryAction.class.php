<?php
// 此为后台内容发布类
class CategoryAction extends CommonAction{
	
    /**
    +----------------------------------------------------------
    * 渲染栏目列表
    +----------------------------------------------------------
    */
    public function index(){
		$cat=new CommonModel('category');
		$cat=$cat->field("*,concat(level,'-',category_id) as tree")->order('tree')->select();
		foreach ($cat as $key => $list){
			$cat[$key]['itemnum']=$this->get_itemnum($list['category_id']);
			$cat[$key]['level']=count(explode('-', $list['level']));
		}
    	$this->assign("list",$cat);
    	$this->display();
    }
    
    /**
    +----------------------------------------------------------
    * 渲染增加栏目
    +----------------------------------------------------------
    */
  	public function add(){
  		$cat=new CommonModel('category');
  		$cat=$cat->field("*,concat(level,'-',category_id) as tree")->order('tree')->select();
  		foreach ($cat as $key => $list){
			$cat[$key]['level']=count(explode('-', $list['level']));
		}
  		$this->assign("list",$cat);
  		$this->display();
  	}
  	
  	/**
    +----------------------------------------------------------
    * 执行增加栏目动作
    +----------------------------------------------------------
    */
  	public function insert(){
  		$cat=new CommonModel('category');
  		if($cat->create()){
  			$pid=$_POST['parent_id'];
  			if($pid==0){
  				$cat->level=0;
  			}else{
  				$parent=$this->get_cat($pid);
  				$cat->level=$parent['level']."-".$pid;
  			}
  			if($cat->add()){
  				$this->redirect('category/index', array(), 2,'添加分类成功');
  			}else{
  				$this->redirect('category/add', array(), 2,'添加分类失败');
  			}
  		}else{
  			$this->redirect('category/add', array(), 2,'添加分类失败');
  		}
  	}
  	
  	
  	/**
    +----------------------------------------------------------
    * 渲染修改栏目
    +----------------------------------------------------------
    */
  	public function edit($id){
  		$id=$_GET['id'];
  		$cat=new CommonModel('category');
  		$onecat=$cat->where("category_id=$id")->find();
  		$listcat=$cat->where("parent_id=0")->select();
  		$this->assign("list",$onecat);
  		$this->assign("clist",$listcat);
  		$this->display();
  	}
  	
  	/**
    +----------------------------------------------------------
    * 执行修改栏目动作
    +----------------------------------------------------------
    */
  	public function update(){
  		$id=$_GET['id'];
  		$cat=new CommonModel('category');
  		if($cat->create()){
  			$pid=$_POST['parent_id'];
  			if($pid==0){
  				$cat->level=0;
  			}else{
  				$parent=$this->get_cat($pid);
  				$cat->level=$parent['level']."-".$pid;
  			}
  			if($cat->save()){
  				$this->redirect('category/index', array(), 2,'编辑栏目成功');
  			}else{
  				$this->redirect("category/edit/id/$id", array(), 2,'编辑栏目失败');
  			}
  		}else{
  			$this->redirect('category/index', array(), 2,'编辑栏目失败了');
  		}
  	}
  	
  	
	/**
    +----------------------------------------------------------
    * 删除栏目
    +----------------------------------------------------------
    */
  	public function delete($id){
  		$id=$_GET['id'];
  		$cat=new CommonModel('category');
  		$child=$this->is_child($id);
  		if($child){
  			$this->redirect('category/index', array(), 2,'删除失败，此栏目存在子栏目');
  			exit();
  		}
  		$status=$cat->where("category_id=$id")->delete();
  		if($status){
  			$this->redirect('category/index', array(), 2,'删除成功');
  		}else{
  			$this->redirect('category/index', array(), 2,'删除失败');
  		}
  	}

	/**
    +----------------------------------------------------------
    * 统计栏目文章数
    +----------------------------------------------------------
    */
  	protected  function get_itemnum($id=0){
  		$item=new CommonModel('item');
  		$item=$item->where("category_id=$id")->count();
  		return $item;
  	}
  	
  	/**
    +----------------------------------------------------------
    * 查看栏目是否有子栏目
    +----------------------------------------------------------
    */
  	protected  function is_child($id){
  		$cat=new CommonModel('category');
  		$cat=$cat->where("parent_id=$id")->count();
  		if($cat){
  			return TRUE;
  		}else{
  			return FALSE;
  		}
  	}
  	
  	

	/**
    +----------------------------------------------------------
    * 取得本栏目的信息 
    +----------------------------------------------------------
    */
  	protected  function get_cat($id){
  		$cat=new CommonModel('category');
  		$cat=$cat->where("category_id=$id")->find();
  		return $cat;
  	}
  	
  	
	/**
    +----------------------------------------------------------
    * 取得父栏目的信息 
    +----------------------------------------------------------
    */
  	protected  function get_parent($id){
  		$cat=new CommonModel('category');
  		$cat=$cat->where("parent_id=$id")->find();
  		return $cat;
  	}
	
	


  	
}

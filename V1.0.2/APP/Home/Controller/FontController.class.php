<?php
namespace Home\Controller;
use Think\Controller;
use Common\Common\Category;
class FontController extends Controller {
	public function index(){
		//分类
		$data=D('Type')->select();
		$font=Category::unlimitedForLevel($data,'&nbsp;&nbsp;&nbsp;&nbsp;├─','1');
		$this->assign('data',$font);
		//查询条件
		if(I('pid')){
			$id=I('pid');
			$cids=Category::getChildsId($data,$id);
			$cids[]=$id;
			$where=array('pid'=>array('IN',$cids));
			$this->pid=I('pid');
		}else{
			$where['pid']='5';
			$this->pid='5';
		}
		$list=D('Font')->where($where)->order('id desc')->select();
		$this->type=D('Type')->where(array('id'=>I('pid')))->find();
		$this->assign('lists',$list);

		//p($where);
		$this->display();
	}
}
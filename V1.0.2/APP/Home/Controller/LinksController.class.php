<?php
namespace Home\Controller;
use Think\Controller;
use Common\Common\Category;
class LinksController extends Controller {
	public function index(){
		$type=D('Type')->where('pid=50')->select();
		$this->assign('type',$type);
		$data=D('Links')->where('state="on"')->order('sort')->relation(true)->select();
		$this->assign('data',$data);
		//p($data);die;
		$this->display();
	}
}
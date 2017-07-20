<?php
namespace Home\Controller;
use Think\Controller;
use Common\Common\Category;
class ManualController extends Controller {
    public function index(){
    	$pid=I('pid');
		$data=D('Type')->where(array('pid'=>$pid))->relation(true)->Select();
        //p($data);die;
		$this->type=D('Type')->where(array('id'=>$pid))->find();
		$this->assign('data',$data);
        $this->display();
    }
    public function main(){
    	$id=I('id');
    	$this->v=D('Manual')->where(array('id'=>$id))->find();
    	$this->display();
    }
}
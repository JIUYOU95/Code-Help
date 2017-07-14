<?php
namespace Home\Controller;
use Think\Controller;
use Common\Common\Category;
class ManualController extends Controller {
    public function index(){
    	$pid=I('pid');
    	//分类
		$data=D('Type')->select();
		$font=Category::unlimitedForLevel($data,'&nbsp;&nbsp;&nbsp;&nbsp;├─',$pid);
		//p($font);die;
		$this->assign('data',$font);
        $this->display();
    }
}
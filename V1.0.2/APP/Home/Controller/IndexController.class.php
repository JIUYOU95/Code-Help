<?php
namespace Home\Controller;
use Think\Controller;
use Common\Common\Category;
class IndexController extends Controller {
    public function index(){
    	//分类
		$data=D('Type')->select();
		$font=Category::unlimitedForLayer($data,'child','37');
		//p($font);die;
		$this->assign('data',$font);
        $this->display();
    }
}
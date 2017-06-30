<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
use Admin\Common\Opadmin;
class FrontController extends AuthController {
	public function index(){
		$this->display();
	}

	/*
	 * 图标字体
	 */
	public function font(){
		$data=D('Type')->getTreeData('tree','id','图标字体');
		p($data);die;
		$this->assign('data',$data);
		$this->display();
	}

}
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
		$this->display();
	}

}
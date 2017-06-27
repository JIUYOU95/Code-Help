<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
use Admin\Common\Opadmin;
class UserController extends AuthController {
	/*
	 *个人中心
	 */
	public function index(){
     	$this->display();
	}
}
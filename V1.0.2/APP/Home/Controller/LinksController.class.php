<?php
namespace Home\Controller;
use Think\Controller;
use Common\Common\Category;
class LinksController extends Controller {
	public function index(){
		$data=D('Links')->relation(true)->Select();
		p($data);die;
		$this->display();
	}
}
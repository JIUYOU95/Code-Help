<?php
namespace Home\Controller;
use Think\Controller;
class ColorController extends Controller {
	public function index(){
		$this->color=D('Color')->order('id')->select();
		$this->display();
	}
}
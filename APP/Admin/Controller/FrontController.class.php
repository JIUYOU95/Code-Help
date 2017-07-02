<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
use Admin\Common\Opadmin;
use Common\Common\Category;
class FrontController extends AuthController {
	public function index(){
		$this->display();
	}

	/*
	 * 图标字体
	 */
	public function font(){
		$data=D('Type')->select();
		$font=Category::unlimitedForLevel($data,'&nbsp;&nbsp;&nbsp;&nbsp;├─','1');
		$list=Category::unlimitedForLayer($data,'child','1');
		//p($list);die;
		$this->assign('data',$font);
		$this->assign('lists',$list);
		$this->display();
	}
	/*
	 * 新增图标字体
	 */
	public function add_font(){
		$data=I('post.');
		unset($data['id']);
		$result=D('Font')->addData($data);
		if ($result) {
			A('Config')->add_log('添加图标字体-'.I('name'));
			$this->success('添加成功',U('Admin/Front/font'));
		}else{
			$this->error('添加失败');
		}
	}

}

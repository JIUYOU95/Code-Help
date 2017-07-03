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
		$data=D('Type')->relation(true)->select();
		$font=Category::unlimitedForLevel($data,'&nbsp;&nbsp;&nbsp;&nbsp;├─','1');
		$list=Category::unlimitedForLayer($data,'child','1');
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
			A('Config')->add_log('添加图标字体-'.I('zh_name'));
			$this->success('添加成功',U('Admin/Front/font'));
		}else{
			$this->error('添加失败');
		}
	}
	/**
	 * 修改菜单
	 */
	public function edit_font(){
		$data=I('post.');
		$map=array(
			'id'=>$data['id']
			);
		$result=D('Font')->editData($map,$data);
		if ($result) {
			A('Config')->add_log('修改图标字体-'.I('zh_name'));
			$this->success('修改成功',U('Admin/Front/font'));
		}else{
			$this->error('修改失败');
		}
	}

}

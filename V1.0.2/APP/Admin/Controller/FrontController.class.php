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
		//分类
		$data=D('Type')->select();
		$font=Category::unlimitedForLevel($data,'&nbsp;&nbsp;&nbsp;&nbsp;├─','1');
		$this->assign('data',$font);
		//查询条件
		if(I('pid')){
			$id=I('pid');
			$cids=Category::getChildsId($data,$id);
			$cids[]=$id;
			$where=array('pid'=>array('IN',$cids));
			$this->pid=I('pid');
		}else{
			$where['pid']='5';
			$this->pid='5';
		}
		$list=D('Font')->where($where)->order('id asc')->select();
		$this->type=D('Type')->where(array('id'=>I('pid')))->find();
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
			$this->redirect('Admin/Front/font',array('pid'=>I('pid')));
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
		$pid=D('Font')->where($map)->find();
		if ($result) {
			A('Config')->add_log('修改图标字体-'.I('zh_name'));
			$this->redirect('Admin/Front/font',array('pid'=>$pid['pid']));
		}else{
			$this->error('修改失败');
		}
	}
	/*
	 * 删除字体图标
	 */
	public function del_font(){
		$id=I('get.id');
		$where['id']=$id;
		$result=D('Font')->where($where)->delete();
		if($result){
			A('Config')->add_log('删除字体图标-'.I('name'));
			$this->redirect('Admin/Front/font',array('pid'=>I('pid')));
		}else{
			$this->error('删除字体图标失败');
		}
	}

	/*
	 * 颜色
	 */
	public function color(){
		$this->color=D('Color')->order('id')->select();
		$this->display();
	}

	/*
	 * 新增颜色
	 */
	public function add_color(){
		$color=D('Color');
		$data=I('post.');
		unset($data['id']);
		if($color->create()){
			$result=$color->addData($data);
			if ($result) {
				A('Config')->add_log('添加颜色-'.I('zh_name'));
				$this->redirect('Admin/Front/color');
			}else{
				$this->error('添加失败');
			}
		}else{
			$this->error($color->getError());
		}
	}


}

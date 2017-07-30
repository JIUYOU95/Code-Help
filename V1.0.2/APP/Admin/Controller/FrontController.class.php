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
		$list=D('Font')->where($where)->order('id desc')->select();
		$this->type=D('Type')->where(array('id'=>I('pid')))->find();
		$this->assign('lists',$list);

		//p($where);
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

	/*
	 * manual手册
	 */
	public function manual(){
		//分类
		$data=D('Type')->select();
		$font=Category::unlimitedForLevel($data,'&nbsp;&nbsp;&nbsp;&nbsp;├─','37');
		$this->assign('data',$font);
		//查询条件
		if(I('pid')){
			$id=I('pid');
			$cids=Category::getChildsId($data,$id);
			$cids[]=$id;
			//$where=array('m.pid'=>array('IN',$cids));
			$this->pid=I('pid');
		}
		// else{
		// 	//$where['m.pid']='42';
		// 	$cids='42';
		// 	$this->pid='42';
		// }
		//p($cids);die;
		$manual=D('Manual')->getAllData($cids,14);
		$this->assign('list',$manual);
		$this->display();
	}

	/*
	 * manual新增手册
	 */
	public function add_manual(){
		$manual=D('Manual');
		if(IS_POST){
			if ($manual->create()){
				$result=$manual->add();
				if ($result) {
					A('Config')->add_log('添加手册资料-'.I('title'));
					$this->redirect('Admin/Front/manual',array('pid'=>I('pid')));
				}else{
					$this->error('添加失败');
				}
			}else{
				$this->error($manual->getError());
			}
		}else{
			$this->pid=I('pid');
			//分类
			$data=D('Type')->select();
			$font=Category::unlimitedForLevel($data,'&nbsp;&nbsp;&nbsp;&nbsp;├─','37');
			$this->assign('data',$font);

			$this->display();
		}
	}
	/*
	 * manual修改手册
	 */
	public function edit_manual(){
		$manual=D('Manual');
		if(IS_POST){
			if ($manual->create()){
				$result=$manual->save();
				if ($result) {
					A('Config')->add_log('更新手册资料-'.I('title'));
					$this->redirect('Admin/Front/manual',array('pid'=>I('pid')));
				}else{
					$this->error('更新失败');
				}
			}else{
				$this->error($manual->getError());
			}
		}else{
			$where['id']=I('id');
			$this->find=$manual->where($where)->find();
			//分类
			$data=D('Type')->select();
			$font=Category::unlimitedForLevel($data,'&nbsp;&nbsp;&nbsp;&nbsp;├─','37');
			$this->assign('data',$font);

			$this->display();
		}
	}
	public function sort_manual(){
		$data[I('id')]=I('sort');
		$result=D('Manual')->orderData($data,'id','sort');
		if ($result) {
			A('Config')->add_log('手册排序');
			$this->show('排序成功');
		}else{
			$this->show('排序失败');
		}
	}
	/*
	 *manual删除手册
	 */
	public function alldel(){
		$ids=explode(',',substr(I('id'),1));
		foreach($ids as $key=>$id){
			if(!$this->dellog($id)){
				$this->show(0);
			}
		}		
		$this->show(1);
	}
	private function dellog($id){
		if(!$id)
			return false;
		$where['id']=$id;
	 	$count=D('Manual')->where($where)->delete();
	 	if($count){
			return true;
	 	}else{
	 		return false;
	 	}

	}
	public function Upload_manual(){
		$upload = new \Think\Upload();
		$upload->maxSize  = 0 ;
		$upload->exts     = array('jpg', 'gif', 'png', 'jpeg');
		$upload->rootPath = 'Public/Uploads/manual/';
		$upload->autoSub  = false;
		$info = $upload->upload();
		if(!$info) {	//上传错误提示错误信息
			$data['success']=0;
			$data['message']='上传失败！';
			$data['url']='';
			$this->ajaxReturn($data);
		}else{	//上传成功
			foreach($info as $file){        
			 	$up_url='../../Public/Uploads/manual/'.$file['savename'];   
			}
			$data['success']=1;
			$data['message']='上传成功！';
			$data['url']=$up_url;
			$this->ajaxReturn($data);
		}
	}


}

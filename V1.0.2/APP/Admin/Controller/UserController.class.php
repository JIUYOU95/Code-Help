<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
use Admin\Common\Opadmin;
use Common\Common\Category;
class UserController extends AuthController {
	/*
	 *个人中心
	 */
	public function index(){
		$Opadmin=new Opadmin();
		$where['id']=$Opadmin->getUserid();
		if(IS_POST){
			$data=I('post.');
			$result=$Opadmin->updateinfo($data);
			if($result){
				A('Config')->add_log('更新个人资料-'.I('nickname'));
                $this->success('更新成功',U('Admin/User/index'));
			}else{
				$this->error('更新个人资料失败！');
			}
		}else{
			$this->data = M('Admin')->where($where)->find();
     		$this->display();
		}

	}
	/*
	 *头像更新
	 */
	public function avatar(){
		$upload = new \Think\Upload();
		$upload->maxSize  = 0 ;
		$upload->exts     = array('jpg', 'gif', 'png', 'jpeg');
		$upload->rootPath = 'Public/Uploads/avatar/';
		$upload->autoSub  = false;
		$info = $upload->uploadOne($_FILES['avatar']);
		if(!$info) {
			$this->ajaxReturn(0);
		}else{
			$Opadmin=new Opadmin();
			$where['uid']=$Opadmin->getUserid();
			$avatar = M('Admin')->where($where)->getField('avatar');
			unfile('Public/Uploads/avatar/'.$avatar);	//原始头像删除

			$datainfo['avatar']=$info['savename'];
			$Opadmin->updateinfo($datainfo);		//更新头像

			$username=$Opadmin->getUsername();
			A('Config')->add_log('更新头像-'.$username);	//写入日志
			$this->ajaxReturn($info['savename']);
		}
	}
	/*
	 * 密码修改
	 */
	public function edit_password(){
		if(IS_POST){
			$Admin=D('Admin');
			$Opadmin=new Opadmin();
			$where['id']=$Opadmin->getUserid();
			$where['password']=$Opadmin->joinmd5(I('repwd'));
			$count=$Admin->where($where)->count();
			if(!$count){
				$this->error('原始密码不正确');
			}else{
	            $data['password']=md5(I('password'));
				$whereup['id']=$Opadmin->getUserid();
				$result=$Admin->where($whereup)->save($data);
				if($result){
					A('Config')->add_log('密码修改-'.$Opadmin->getNickname());	//写入日志
					$this->success('密码修改成功',U('User/index'));
				}else{
					$this->error('密码和原始密码重复');
				}

			}
		}

	}

	/*
	 * 通讯录
	 */
	public function address(){
		$data=D('Type')->where('pid=31')->select();
		$this->assign('data',$data);
		$book=D('Address')->where($where)->select();
		$this->assign('list',$book);
		$this->display();
	}

	public function ajax_address(){
		if(is_numeric(I('pid'))){
			$where['pid']=I('pid');
			$this->pid=I('pid');
		}
		$book=D('Address')->where($where)->select();
		$this->ajaxReturn($book);
	}
	public function read_address(){
		if(I('id')){
			$id=I('id');
		}else{
			$id='3';
		}
		
		$book=D('Address')->getData($id);
		//p($book);die;
		$this->assign('list',$book);
		$this->display();
	}

	/*
	 * 通讯录新增
	 */
	public function add_address(){
		if(IS_POST){
			$address=D('Address');
			$data=I('post.');
			unset($data['id']);
			if ($address->create()){
				$data['birthday']=strtotime(I('birthday'));
				$result=$address->addData($data);
				$id=$result;
				if ($result) {
					A('Config')->add_log('新增通讯录-'.I('name'));
					$this->redirect(U('User/read_address',array('id'=>$id)));
				}else{
					$this->error('添加失败');
				}
			}else{
				$this->error($address->getError());
			}
		}else{
			$data=D('Type')->where('pid=31')->select();
			$this->assign('data',$data);
			$this->display();
		}

	}

	/*
	 * 通讯录修改
	 */
	public function edit_address(){
		$address=D('Address');
		if(IS_POST){
			if($address->create()){
				$data=I('post.');
				$map=array(
					'id'=>$data['id']
					);
				$data['birthday']=strtotime(I('birthday'));
				$result=$address->editData($map,$data);
				if ($result) {
					A('Config')->add_log('修改通讯录-'.I('name'));
					$this->redirect(U('User/read_address',array('id'=>I('id'))));
				}else{
					$this->error('修改失败');
				}
			}else{
				$this->error($address->getError());
			}
		}else{
			//p(I('id'));die;
			$data=D('Type')->where('pid=31')->select();
			$this->assign('data',$data);

			$where['id']=I('id');
			$list=$address->where($where)->find();
			//p($list);
			$this->assign('edit',$list);
			$this->display();
		}
	}

	/*
	 * 删除通讯录
	 */
	public function del_address(){
		//p(I('id'));die;
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
	 	$count=D('Address')->where($where)->delete();
	 	if($count){
			return true;
	 	}else{
	 		return false;
	 	}

	}

	/*
	 * 头像
	 */
	public function add_avatar(){
		$upload = new \Think\Upload();
		$upload->maxSize  = 0 ;
		$upload->exts     = array('jpg', 'gif', 'png', 'jpeg');
		$upload->rootPath = 'Public/Uploads/address/';
		$upload->autoSub  = false;
		$info = $upload->uploadOne($_FILES['avatar']);
		if(!$info) {
			$this->ajaxReturn(0);
		}else{
			// $Opadmin=new Opadmin();
			// $where['uid']=$Opadmin->getUserid();
			// $avatar = M('Address')->where($where)->getField('avatar');
			// unfile('Public/Uploads/address/'.$avatar);	//原始头像删除

			// $datainfo['avatar']=$info['savename'];
			// $Opadmin->updateinfo($datainfo);		//更新头像

			// $username=$Opadmin->getUsername();
			// A('Config')->add_log('更新通讯录头像-'.$username);	//写入日志
			$this->ajaxReturn($info['savename']);
		}
	}
}

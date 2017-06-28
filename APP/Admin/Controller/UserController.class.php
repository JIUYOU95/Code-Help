<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
use Admin\Common\Opadmin;
class UserController extends AuthController {
	/*
	 *个人中心
	 */
	public function index(){
		$Opadmin=new Opadmin();
		$where['uid']=$Opadmin->getUserid();
		$this->data = M('Admin')->where($where)->find();
     	$this->display();
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
		p($_POST);die;
		if(IS_POST){

			$Admin=D('Admin');
			$Opadmin=new Opadmin();
			$where['id']=$Opadmin->getUserid();
			$where['password']=$Opadmin->joinmd5(I('repassword'));
			$count=$Admin->where($where)->count();

			if(!$count&&I('password')!=''){
				$this->error('原始密码不正确');
			}else{
				// 如果修改密码则md5
	            if (!empty(I('password'))) {
	                $data=array('password'=>I('password'));
	            }
	           
				$whereup['id']=$Opadmin->getUserid();
				$Admin->where($whereup)->setField($data);
				
			}
		}
		
	}
}

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

	public function avatar(){
		$upload = new \Think\Upload();
		$upload->maxSize  = 0 ;
		$upload->exts     = array('jpg', 'gif', 'png', 'jpeg');
		$upload->rootPath = 'Public/Uploads/avatar/';
		$upload->autoSub  = false;
		$info = $upload->uploadOne($_FILES['avatar']);
		if(!$info) {
			//$this->error($upload->getError());
			$this->ajaxReturn($info);
		}else{// 上传成功
			//echo $info['rootPath'].$info['savename'];
			$this->ajaxReturn($info);
		}
	}
}

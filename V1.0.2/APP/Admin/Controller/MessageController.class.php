<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
use Admin\Common\Opadmin;
use Common\Common\Category;
class MessageController extends AuthController {
	public function index(){
		$Message=D('Message');
		if(I('name')){
			$where['uid']=I('name');
			$this->name=I('name');
		}
		$this->Messagelist=$Message->getPage($where,'id desc','14');
		$this->display();
	}
	/*详细预览*/
	public function read_msg(){
		$id=I('id');
		$Message=D('Message');
		$result=$Message->where(array('id'=>$id))->find();
		if($result){
			$this->ajaxReturn($result);
		}else{
			$this->ajaxReturn(0);
		}
	}
	/*
	 * 留言删除
	 */
	public function del_msg(){
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
	 	$count=D('Message')->where($where)->delete();
	 	if($count){
			return true;
	 	}else{
	 		return false;
	 	}

	}
}
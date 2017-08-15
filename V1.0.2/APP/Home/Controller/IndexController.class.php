<?php
namespace Home\Controller;
use Think\Controller;
use Common\Common\Category;
class IndexController extends Controller {
    public function index(){
    	layout(false); 
    	//分类
		$data=D('Type')->select();
		$font=Category::unlimitedForLayer($data,'child','37');
		$this->assign('data',$font);
		//p($font);die;	
        $this->display();
    }
    public function message(){
        layout(false); 
        $Message = M("Message");
    	$data['to_user'] = I('to_user');
        $data['email'] = I('email');
        $data['content'] = I('content');
        $data['type'] = '1';
        $data['ip'] = get_client_ip();
        $data['optime'] = time();
        if ($Message->autoCheckToken($_POST)){
            $result=$Message->add($data);
        	if ($result) {
                $this->success('留言成功',U('/Home'),3);
            }else{
                $this->error('留言失败,请重新留言！',U('index'),3);
            }
        }else{
            $this->error('重复提交',U('/Home'),3);
        }
    }
}
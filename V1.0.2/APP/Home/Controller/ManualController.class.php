<?php
namespace Home\Controller;
use Think\Controller;
use Common\Common\Category;
class ManualController extends Controller {
    public function index(){
        layout(false); 
    	$pid=I('pid');
		$data=D('Type')->where(array('pid'=>$pid))->relation(true)->select();

        if(empty($data)){
            $manual=D('Manual')->where(array('pid'=>$pid))->select();
            $this->assign('manual',$manual);
        }else{
           $this->assign('data',$data);
        }
        //p($data);die;
		$this->type=D('Type')->where(array('id'=>$pid))->find();
		
        $this->display();
    }
    public function main(){
        layout(false); 
        $where['id']=I('id');
    	$this->v=D('Manual')->where($where)->find();
        M('Manual')->where($where)->setInc('views');
    	$this->display();
    }
    public function ajax_key(){
        $key=I('key');
        $map['content'] = array('like','%'.$key.'%');
        $search=D('Manual')->field('id,title')->where($map)->select();
        //p($search);
        $this->ajaxReturn($search);
    }
}
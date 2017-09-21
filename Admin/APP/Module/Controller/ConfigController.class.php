<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29
 * Time: 13:37
 */

namespace Module\Controller;

use Common\Controller\AuthController;

class ConfigController extends AuthController {
    //菜单显示
    public function nav(){
        $data=D('Nav')->getTree('tree','order_number,id');
        $this->assign('data',$data);
        $this->display();
    }
    //新增菜单
    public function add_nav(){
        $data=I('post.');
        unset($data['id']);
        $result=D('Nav')->addData($data);
        if ($result) {
            A('Log')->add_log('添加菜单-'.I('name'));
            $this->success('添加成功',U('nav'));
        }else{
            $this->error('添加失败');
        }
    }
    //修改菜单
    public function edit_nav(){
        $data=I('post.');
        $map=array(
            'id'=>$data['id']
        );
        $result=D('Nav')->editData($map,$data);
        if ($result) {
            A('Log')->add_log('修改菜单-'.I('name'));
            $this->success('修改成功',U('nav'));
        }else{
            $this->error('修改失败');
        }
    }
    //删除菜单
    public function delete_nav(){
        $id=I('get.id');
        $map=array(
            'id'=>$id
        );
        $result=D('Nav')->deleteData($map);
        if($result){
            A('Log')->add_log('删除菜单-'.I('name'));
            $this->success('删除成功',U('nav'));
        }else{
            $this->error('请先删除子菜单');
        }
    }
    //菜单排序
    public function nav_order(){
        $data=I('post.');
        $result=D('Nav')->orderData($data);
        if ($result) {
            A('Log')->add_log('菜单排序');
            $this->success('排序成功',U('nav'));
        }else{
            $this->error('排序失败');
        }
    }

    //系统设置
    public function set() {
        $model = D('Config');
        if(IS_POST){
            $this->store($model,I('post.'));
        }
        $field=$model->find(1);
        $this->assign('field',$field);
        $this->display();
    }
    //日志列表
    public function log(){
        $Log=D('Log');
        if(I('name')){
            $where['uid']=I('name');
            $this->name=I('name');
        }
        $this->loglist=$Log->getPage($where,'id desc','14');
        $this->display();
    }
    /*
	 * 日志删除
	 */
    public function alldel(){
        $ids=explode(',',substr(I('id'),1));
        foreach($ids as $key=>$id){
            if(!$this->dellog($id)){
                $this->show(0);
            }
        }
        A('Log')->add_log('日志删除');
        $this->show(1);
    }
    private function dellog($id){
        if(!$id)
            return false;
        $where['id']=$id;
        $count=D('Log')->where($where)->delete();
        if($count){
            return true;
        }else{
            return false;
        }

    }
}
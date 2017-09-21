<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/31
 * Time: 11:41
 */

namespace Module\Controller;


use Common\Controller\AuthController;

class RuleController extends AuthController {

//****************权限***************

    //权限列表
    public function rule() {
        $data = D('AuthRule')->getTreeData('tree', 'id', 'title');
        $this->assign('data', $data);
        $this->display();
    }
    //新增权限列表
    public function add_rule() {
        $data = I('post.');
        unset($data['id']);
        $result = D('AuthRule')->addData($data);
        if ($result) {
            A('Log')->add_log('添加权限-' . I('title'));
            $this->success('添加成功', U('rule'));
        } else {
            $this->error('添加失败');
        }
    }
    //修改权限列表
    public function edit_rule() {
        $data = I('post.');
        $map = array('id' => $data['id']);
        $result = D('AuthRule')->editData($map, $data);
        if ($result) {
            A('Log')->add_log('修改权限-' . I('title'));
            $this->success('修改成功', U('rule'));
        } else {
            $this->error('修改失败');
        }
    }
    //删除权限列表
    public function delete_rule() {
        $id = I('get.id');
        $map = array('id' => $id);
        $result = D('AuthRule')->deleteData($map);
        if ($result) {
            A('Log')->add_log('删除权限-' . I('title'));
            $this->success('删除成功', U('rule'));
        } else {
            $this->error('请先删除子权限');
        }
    }

//****************用户组***************

    //用户组列表
    public function group() {
        $data = D('AuthGroup')->select();
        $this->assign('data', $data);
        $this->display();
    }
    //添加用户组
    public function add_group() {
        $data = I('post.');
        unset($data['id']);
        $result = D('AuthGroup')->addData($data);
        if ($result) {
            A('Log')->add_log('添加用户组-' . I('title'));
            $this->success('添加成功', U('group'));
        } else {
            $this->error('添加失败');
        }
    }
    //修改用户组
    public function edit_group() {
        $data = I('post.');
        $map = array('id' => $data['id']);
        $result = D('AuthGroup')->editData($map, $data);
        if ($result) {
            A('Log')->add_log('修改用户组-' . I('title'));
            $this->success('修改成功', U('group'));
        } else {
            $this->error('修改失败');
        }
    }
    //删除用户组
    public function delete_group() {
        $id = I('get.id');
        $map = array('id' => $id);
        $result = D('AuthGroup')->deleteData($map);
        if ($result) {
            A('Log')->add_log('删除用户组-' . I('title'));
            $this->success('删除成功', U('group'));
        } else {
            $this->error('删除失败');
        }
    }

//****************权限-用户组***************

    //分配权限
    public function rule_group() {
        if (IS_POST) {
            $data = I('post.');
            $map = array('id' => $data['id']);
            $data['rules'] = implode(',', $data['rule_ids']);
            $result = D('AuthGroup')->editData($map, $data);
            if ($result) {
                A('Log')->add_log('分配权限');
                $this->success('操作成功', U('rule_group',array('id'=>$data['id'])));
            } else {
                $this->error('操作失败');
            }
        } else {
            $id = I('get.id');
            // 获取用户组数据
            $group_data = M('Auth_group')->where(array('id' => $id))->find();
            $group_data['rules'] = explode(',', $group_data['rules']);
            // 获取规则数据
            $rule_data = D('AuthRule')->getTreeData('level', 'id', 'title');
            $assign = array('group_data' => $group_data, 'rule_data' => $rule_data);
            $this->assign($assign);
            $this->display();
        }
    }

//****************权限-用户组***************

    //管理员列表
    public function admin(){
        $Access=D('AuthGroupAccess')->getAllData();
        $this->assign('access',$Access);
        $Group=D('AuthGroup')->select();
        $this->assign('group',$Group);
        $this->display();
    }
    //新增管理员
    public function add_admin(){
        if(IS_POST){
            $data=I('post.');
            $result=D('Admin')->addData($data);
            if($result){
                A('Log')->add_log('添加管理员-'.I('username'));
                if (!empty($data['group_ids'])) {
                    foreach ($data['group_ids'] as $k => $v) {
                        $group=array(
                            'uid'=>$result,
                            'group_id'=>$v
                        );
                        D('AuthGroupAccess')->addData($group);
                    }
                }
                // 操作成功
                $this->success('添加成功',U('admin'));
            }else{
                $error_word=D('Admin')->getError();
                // 操作失败
                $this->error($error_word);
            }
        }
    }
    //修改管理员
    public function edit_admin(){
        if(IS_POST){
            $data=I('post.');
            // 组合where数组条件
            $uid=$data['id'];
            $map['id']=$uid;
            // 修改权限
            D('AuthGroupAccess')->deleteData(array('uid'=>$uid));
            foreach ($data['group_ids'] as $k => $v) {
                $group=array(
                    'uid'=>$uid,
                    'group_id'=>$v
                );
                D('AuthGroupAccess')->addData($group);
            }
            $data=array_filter($data);
            // 如果修改密码则md5
            if (!empty($data['password'])) {
                $data['password']=md5($data['password']);
            }

            $result=D('Admin')->save($data);
            if($result){
                A('Log')->add_log('修改管理员-'.I('nickname'));
                // 操作成功
                $this->success('修改成功',U('admin',array('id'=>$uid)));
            }else{
                $this->error('修改失败！');
            }
        }else{
            $id=I('get.id',0,'intval');
            // 获取用户数据
            $user_data=M('Admin')->find($id);
            // 获取已加入用户组
            $group_data=M('AuthGroupAccess')
                ->where(array('uid'=>$id))
                ->getField('group_id',true);
            // 全部用户组
            $data=D('AuthGroup')->select();
            $assign=array(
                'data'=>$data,
                'user_data'=>$user_data,
                'group_data'=>$group_data
            );
            $this->assign($assign);
            $this->display();
        }
    }
    //删除管理员
    public function delete_admin(){
        $id=I('get.id');
        $map=array(
            'id'=>$id
        );
        $result=D('Admin')->deleteData($map);
        if ($result) {
            A('Log')->add_log('删除管理员-'.I('username'));
            $this->success('删除成功',U('admin'));
        }else{
            $this->error('删除失败');
        }
    }
    //管理员状态更改
    public function lockHandle(){
        $id=I('id');
        $lock=I('lock');
        if($lock=='1'){
            $msg='解锁';
        }elseif($lock=='2'){
            $msg='锁定';
        }
        $count=M('Admin')->where(array('id'=>$id))->setField('status',$lock);
        if($count>0){
            A('Log')->add_log($msg.'管理员-'.I('username'));
            $this->success('用户'.$msg.'成功！',U('admin'));
        }else{
            $this->error('用户'.$msg.'失败！');
        }
    }
    //清空密码
    public function empty_password(){
        $data['id']=I('id');
        $data['password']=md5('');
        $result=D('Admin')->save($data);
        if ($result) {
            A('Log')->add_log('清空密码-'.I('username'));
            $this->success('清空密码成功',U('admin'));
        }else{
            $this->error('没有密码，不需清空！');
        }
    }
}
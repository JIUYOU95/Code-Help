<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
use Admin\Common\Opadmin;
use Common\Common\Category;
class ConfigController extends AuthController {
	/*
	 *系统设置
	 */
	public function index(){
		$data=D('Config')->select();
     	$this->assign('data',$data);
     	$this->display();
	}

	/*
	 *系统配置添加
	 */
	public function add(){
		$data=I('post.');
		$Config=D('Config');
		if($Config->create()){
			$lastid=$Config->addData($data);
 			if($lastid){
 				A('Config')->add_log('配置变量添加-'.I('configname'));
 				$url = C('cfg_conf');
 	 			$result=$Config->ReWriteConfig($url);
 	 			if ($result) {
 	 				$this->success('变量添加成功',U('Admin/Config/index'));
				}else{
					$this->error('配置文件写入失败');
				}
 			}else{
	 			$this->error('变量添加失败');
	 		}	 	 	
 	 	}else{
 	 		$this->error($Config->getError());
 	 	}
	}

	/*
	 *系统参数更新
	 */
	public function edit(){
		$Config=D('Config');
		if($Config->create()){
			foreach(I('post.') as $k=>$v){
		        $data["content"]=$v;
		        $data["optime"]=time();
		        $where['configname']=$k;
		        $Config->where($where)->save($data);       	
    		}
    		A('Config')->add_log('系统配置更新');
			$url = C('cfg_conf');
	    	$result=$Config->ReWriteConfig($url);
	    	if ($result) {
	    		$this->success('配置修改成功',U('Admin/Config/index'));
	    	}else{
	    		$this->error('配置文件写入失败');
	    	}
		}else{
			$this->error($Config->getError());
		}
	}

	/*
	 *系统配置删除
	 */
	public function delete(){

	}

	/*
	 * 链接
	 */
	public function link(){
		//分类
		$type=D('Type')->select();
		$font=Category::unlimitedForLevel($type,'&nbsp;&nbsp;&nbsp;&nbsp;├─','50');
		$this->assign('type',$font);

		// $data=D('Links')->getPage('','sort','10');
		$data=D('Links')->getAllData('10');
		//p($data);die;
		$this->assign('data',$data);
		$this->display();
	}
	public function add_link(){
		$data=I('post.');
		unset($data['id']);
		$result=D('Links')->addData($data);
		if ($result) {
			A('Config')->add_log('添加链接-'.I('name'));
			$this->success('添加成功',U('Config/link'));
		}else{
			$this->error('添加失败');
		}
	}
	public function edit_link(){
		$data=I('post.');
		$map=array(
			'id'=>$data['id']
			);
		$result=D('Links')->editData($map,$data);
		if ($result) {
			A('Config')->add_log('修改链接-'.I('name'));
			$this->redirect('Config/link');
		}else{
			$this->error('修改失败');
		}
	}
	public function sort_link(){
		$data[I('id')]=I('sort');
		$result=D('Links')->orderData($data,'id','sort');
		if ($result) {
			A('Config')->add_log('链接排序');
			$this->show('排序成功');
		}else{
			$this->show('排序失败');
		}
	}
	public function all_link(){
		$ids=explode(',',substr(I('id'),1));
		foreach($ids as $key=>$id){
			if(!$this->del_link($id)){
				$this->show(0);
			}
		}		
		$this->show(1);
	}
	private function del_link($id){
		if(!$id)
			return false;
		$where['id']=$id;
	 	$count=D('Links')->where($where)->delete();
	 	if($count){
			return true;
	 	}else{
	 		return false;
	 	}
	}
	public function state_link(){
		$id=I('id');
        $state=I('state');
        if($state=='on'){
            $msg='显示';
        }elseif($state=='off'){
            $msg='隐藏';
        }
        $count=M('Links')->where(array('id'=>$id))->setField('state',$state);
        if($count>0){
            A('Config')->add_log($msg.'链接-'.I('name'));
            $this->redirect('Config/link');
        }else{
            $this->error('链接'.$msg.'失败！');
        }
	}

	/*
	 * 分类列表
	 */
	public function type(){
		$data=D('Type')->getTreeData('tree','id');
		$this->assign('data',$data);
		$this->display();
	}

	/*
	 * 分类新增
	 */
	public function add_type(){
		$data=I('post.');
		unset($data['id']);
		$result=D('Type')->addData($data);
		if ($result) {
			A('Config')->add_log('添加分类-'.I('name'));
			$this->success('添加成功',U('Config/type'));
		}else{
			$this->error('添加失败');
		}
	}

	/**
	 * 分类修改
	 */
	public function edit_type(){
		$data=I('post.');
		$map=array(
			'id'=>$data['id']
			);
		$result=D('Type')->editData($map,$data);
		if ($result) {
			A('Config')->add_log('修改分类-'.I('name'));
			$this->success('修改成功',U('Config/type'));
		}else{
			$this->error('修改失败');
		}
	}

	/**
	 * 删除菜单
	 */
	public function del_type(){
		$id=I('get.id');
		$map=array(
			'id'=>$id
			);
		$result=D('Type')->deleteData($map);
		if($result){
			A('Config')->add_log('删除分类-'.I('name'));
			$this->success('删除成功',U('Config/type'));
		}else{
			$this->error('请先删除子菜单');
		}
	}

	/**
	 * 分类排序
	 */
	public function order_type(){
		$data=I('post.');
		$result=D('Type')->orderData($data,'id','sort');
		if ($result) {
			A('Config')->add_log('分类排序');
			$this->success('排序成功',U('Config/type'));
		}else{
			$this->error('排序失败');
		}
	}

	/*
	 * 日志列表
	 */
	public function log(){
		$Log=D('Log');
		if(I('name')){
			$where['uid']=I('name');
			$this->name=I('name');
		}
		$this->loglist=$Log->getPage($where,'id desc','14');
		$this->display();
	}

	/**
     * 添加日志
     */
    public function add_log($content){
    	$Opadmin=new Opadmin();
	 	if(C('cfg_log')=='N')
	 		return true;
	   	$data['uid']=$Opadmin->getUsername();
		$data['time']=time();
		$data['ip']=get_client_ip();
	 	$data['logtext']=$content;
		$result=D('Log')->add($data);
	    if($result)
			return true;
		else
			return false;
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
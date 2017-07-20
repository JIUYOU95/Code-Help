<?php
namespace Admin\Model;
use Common\Model\BaseModel;
use Admin\Common\Opadmin;
class ManualModel extends BaseModel {
	protected $_validate = array(
		array('title','require','标题必须！'), //默认情况下用正则进行验证
	);
	protected $_auto = array (
		array('optime','strtotime',3,'function'),
		array('uid','getUid',3,'callback'), 
	);
	//获取当前用户ID
	protected function getUid(){
		$Opadmin=new Opadmin();
		$uid=$Opadmin->getUserid();
		return $uid;
	}
	//关联Admin,Type表，分页
	public function getAllData($map,$limit){

		//if(count($map)>1){
		if(is_array($map)){
			$where=array('m.pid'=>array('IN',$map));
			$whered=array('pid'=>array('IN',$map));
		}else{
			$where['m.pid']=$map;
			$whered['pid']=$map;
			
		}
		//数据条数
		$count=$this->where($whered)->count();
         //p($count);die;
        $page=new \Think\Page($count,$limit);
        $page->setConfig('prev','«');
        $page->setConfig('next','»');
        $page->setConfig('header','条');
		// 获取分页数据
		$list=$this
			->field('m.id,m.type,m.title,m.en_title,m.link,m.optime,m.content,m.views,m.sort,ag.name,u.username')
			->alias('m')
			->join('__ADMIN__ u ON m.uid=u.id','LEFT')
			->join('__TYPE__ ag ON m.pid=ag.id','LEFT')
			->where($where)
			->order('m.sort desc')
			->limit($page->firstRow.','.$page->listRows)
			->select();
		$data=array(
          	'data'=>$list,
           	'page'=>$page->show()
            );
		//echo $this->_sql();die;
		return $data;
	}
}
<?php
namespace Admin\Model;
use Common\Model\BaseModel;
class LinksModel extends BaseModel {
	//关联Links,Type表，分页
	public function getAllData($limit,$pid){
		if(!empty($pid)){
			$where['m.pid']=$pid;
			$whered['pid']=$pid;
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
			->field('m.id,m.name,m.url,m.state,m.sort,m.pid,ag.name as type,ag.id as type_id')
			->alias('m')
			->join('__TYPE__ ag ON m.pid=ag.id','LEFT')
			->where($where)
			->order('m.sort')
			->limit($page->firstRow.','.$page->listRows)
			->select();
		//echo $this->_sql();die;
		$data=array(
          	'data'=>$list,
           	'page'=>$page->show()
            );
		//echo $this->_sql();die;
		return $data;
	}
}

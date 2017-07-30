<?php
namespace Home\Model;
use Think\Model\RelationModel;
class TypeModel extends RelationModel {
	protected $_link=array(
		'Manual'=> array(
			'mapping_type'=>self::HAS_MANY,
			'class_name'=>'Manual',
			'foreign_key'=>'pid',
			'mapping_name'=>'list',
			'mapping_order'=>'sort',
			'condition'=>'type=1',
			'mapping_fields'=>'id,pid,title,en_title,sort',
	    ),
	);


	public function getLinks($pid){
		$data=$this
			->field('f.id,f.pid,f.name,f.url,f.state,t.name as type')
			->alias('t')
			->join('__LINKS__ f ON t.id=f.pid','LEFT')
			->where(array('t.pid'=>$pid))
			->select();
		echo $this->_sql();
		return $data;
	}

}

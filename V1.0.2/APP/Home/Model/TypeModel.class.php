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

	// public function getManual($pid){
	// 	$data=$this
	// 		->alias('t')
	// 		->join('__MANUAL__ f ON t.id=f.pid','RIGHT')
	// 		->where(array('t.pid'=>$pid))
	// 		->select();
	// 	echo $this->_sql();die;
	// 	return $data;
	// }

}

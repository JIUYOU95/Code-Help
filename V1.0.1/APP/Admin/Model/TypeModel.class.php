<?php
namespace Admin\Model;
use Common\Model\BaseModel;
use Admin\Common\Opadmin;
class TypeModel extends BaseModel {
	// protected $_link=array(
	// 	'Font'=> array(
	//     	  'mapping_type'=>self::HAS_MANY,
	//           'class_name'=>'Font',
	//           'foreign_key'=>'pid',
	//           'mapping_name'=>'type',
	//           //'condition'=>'pid=5',
	//           'mapping_fields'=>'id,pid,zh_name,en_name',
	//     ),
	// );

	// public function getDate(){
	// 	$data=$this
	// 		->alias('t')
	// 		->join('__FONT__ f ON t.id=f.pid','RIGHT')
	// 		->select();
	// 	return $data;
	// }

}

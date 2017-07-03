<?php
namespace Admin\Model;
use Think\Model\RelationModel;
use Admin\Common\Opadmin;
class TypeModel extends RelationModel {
	protected $_link=array(
		'Font'=> array(  
	    	  'mapping_type'=>self::HAS_MANY,
	          'class_name'=>'Font',
	          'foreign_key'=>'pid',
	          'mapping_name'=>'type',
	          'mapping_fields'=>'id,zh_name,en_name',
	    ),
	);

}
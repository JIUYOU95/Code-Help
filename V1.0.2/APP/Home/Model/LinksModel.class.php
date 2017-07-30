<?php
namespace Home\Model;
use Think\Model\RelationModel;
class LinksModel extends RelationModel {
	protected $_link=array(
		'Type'=> array(
	    	  'mapping_type'=>self::BELONGS_TO,
	          'class_name'=>'Type',
	          'foreign_key'=>'pid',
	          'mapping_order'=>'sort',
	          'as_fields'=>'name:type'
	    ),
	);
	
}
<?php
namespace Home\Model;
use Think\Model\RelationModel;
class LinksModel extends RelationModel {
	protected $_link=array(
		'Type'=> array(
	    	  'mapping_type'=>self::BELONGS_TO,
	          'class_name'=>'Type',
	          'foreign_key'=>'pid',
	          'mapping_name'=>'list',
	          'mapping_order'=>'sort',
	          'condition'=>'pid=50',
	          //'mapping_fields'=>'id,pid,name,url,sort',
	    ),
	);
}
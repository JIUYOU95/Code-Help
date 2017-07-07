<?php
namespace Admin\Model;
use Common\Model\BaseModel;
use Admin\Common\Opadmin;
class AddressModel extends BaseModel {
	protected $_validate = array(
		array('name','require','姓名必须！'), //默认情况下用正则进行验证
	);

	protected $_link = array(
		'Type'=>array(
			'mapping_type' => self::BELONGS_TO,
			'class_name'   => 'Type',
			'foreign_key'  => 'pid',
			'mapping_name' => 'type',
			'mapping_fields'=>'name',
			'as_fields'	=>'name:type',
		),
	);
}

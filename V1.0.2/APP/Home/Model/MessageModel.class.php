<?php
namespace Home\Model;
use Think\Model\RelationModel;
class MessageModel extends RelationModel {
	protected $_auto = array (           
		array('optime','time',1,'function'), //对optime字段在新增的时候写入当前时间戳    
	);
}
<?php
namespace Admin\Model;
use Common\Model\BaseModel;
use Admin\Common\Opadmin;
class ColorModel extends BaseModel {
	protected $_validate = array(     
		array('color','require','RGB颜色必须！'), //默认情况下用正则进行验证 
		array('color','','RGB颜色已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
	);
}

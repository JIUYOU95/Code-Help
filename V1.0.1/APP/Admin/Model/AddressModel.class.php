<?php
namespace Admin\Model;
use Common\Model\BaseModel;
use Admin\Common\Opadmin;
class AddressModel extends BaseModel {
	protected $_validate = array(
		array('name','require','姓名必须！'), //默认情况下用正则进行验证
	);

	public function getData($id){
		$data=$this
			->field('aga.*,u.name as type')
			->alias('aga')
			->where(array('aga.id'=>$id))
			->join('__TYPE__ u ON aga.pid=u.id','RIGHT')
			->find();
		return $data;
	}
}

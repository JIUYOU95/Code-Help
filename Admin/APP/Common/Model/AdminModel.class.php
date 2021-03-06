<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/30
 * Time: 15:07
 */

namespace Common\Model;


class AdminModel extends BaseModel {
    protected $pk = 'id';
    protected $tableName = 'admin';
    protected $_validate=[
        ['username','require','用户名必须',0,'',3],
    ];
    protected $_auto=[
        ['password','md5',3,'function'],
        ['regtime','time',1,'function'],
    ];

    /**
     * 新增用户
     * @param array $data
     *
     * @return bool|mixed
     */
    public function addData($data){
        // 对data数据进行验证
        if(!$data=$this->create($data)){
            // 验证不通过返回错误
            return false;
        }else{
            // 验证通过
            $result=$this->add($data);
            return $result;
        }
    }

    /**
     * 删除用户
     * @param   array   $map    where语句数组形式
     * @return  boolean         操作是否成功
     */
    public function deleteData($map){
        $result=$this->where($map)->delete();
        return $result;
    }
}
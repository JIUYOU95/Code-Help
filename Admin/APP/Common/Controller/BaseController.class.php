<?php namespace Common\Controller;

use Think\Controller;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/29
 * Time: 11:55
 */
class BaseController extends Controller {
    public function __construct() {
        parent::__construct();
        if (method_exists($this, '__init')) {
            $this->__init();
        }
    }

    //保存数据
    public function store(Model $model, $data, \Closure $callback = null) {
        $res = $model->store($data);
        if ($res['status'] == 'success' && $callback instanceof \Closure) {
            $callback($res);
        } else {
            $this->message($res);
        }

    }

    //响应信息
    protected function message(array $data) {
        if ($data['status'] == 'success') {
            $this->success($data['message']);
        } else {
            $this->error($data['message']);
        }
        exit;
    }

    //分配菜单
    public function assignModuelMenu() {
        $nav_data=D('Nav')->getTree('level','order_number,id');
        $this->assign('nav_data',$nav_data);
    }

    /* 处理上传exl数据
     * $file_name  文件路径
     */
    public function import_exl($file_name){
        Vendor("PHPExcel.PHPExcel");   // 这里不能漏掉
        Vendor("PHPExcel.PHPExcel.IOFactory");
        Vendor("PHPExcel.PHPExcel.Reader.Excel2007");
        $objReader =\PHPExcel_IOFactory::createReader('Excel2007');
        $objPHPExcel = $objReader->load($file_name,$encode='utf-8');
        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        $highestColumn = $sheet->getHighestColumn(); // 取得总列数

        $data=array();
        //从第二行开始读取数据
        for($j=2;$j<=$highestRow;$j++){
            //从A列读取数据
            for($k='A';$k<$highestColumn;$k++){
                // 读取单元格
                $data[$j][]=$objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue();
            }
        }
        return $data;
    }

}
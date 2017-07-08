<?php
namespace Admin\Controller;
use Common\Controller\AuthController;
use Admin\Common\Opadmin;
class IndexController extends AuthController {
    public function index(){
    	$Opadmin=new Opadmin();
    	$this->nickname=$Opadmin->getNickname();
    	$config=$Opadmin->config();
        $this->assign('config',$config);
    	// 分配菜单数据
		$nav_data=D('Nav')->getTree('level','order_number,id');
		$this->assign('data',$nav_data);
        $this->display();
    }

    public function Welcome(){
       $sysdata['host']= isset($_SERVER['HTTP_X_FORWARDED_HOST']) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '');    //访问网址
        $sysdata['ip']=get_server_ip();                         //服务器IP
        $sysdata['port']=$_SERVER["SERVER_PORT"];               //端口号  
        $Agent=$_SERVER['HTTP_USER_AGENT'];
        //以下两条获取服务器时间，中国大陆采用的是东八区的时间,设置时区写成Etc/GMT-8
        date_default_timezone_set("Etc/GMT-8");
        $sysdata['systemtime'] = date("Y-m-d H:i:s",time());    //服务器时间
        $sysdata['sysversion']= PHP_VERSION;                    //PHP版本
        $sysdata['mysqlinfo']=$this-> _mysql_version();         //Mysql版本
        $sysdata['browser']=get_broswer();                      //浏览器
        $sysdata['system']=get_os();                            //操作系统 

        $this->assign('sysdata',$sysdata);
    	$this->display();
    }

    protected function _model(){
        return new \Think\Model();
    }
    private function _mysql_version(){
        $Model = self::_model();
        $version = $Model->query("select version() as ver");
        return $version[0]['ver'];
    }
}

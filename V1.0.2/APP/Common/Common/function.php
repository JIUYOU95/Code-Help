<?php

function p($array){
	dump($array,true,'<pre>',0);
}
/**
 * [writeArr 写入配置文件方法]
 * @param  [type] $arr      [要写入的数据]
 * @param  [type] $filename [文件路径]
 * @return [type]           [description]
 */
function writeArr($arr, $filename) {
    return file_put_contents($filename, "<?php\r\nreturn " . var_export($arr, true) . ";");
}
/**
 * 删除文件
 * @param  [type] $url      [文件路径]
 */
function unfile($url){
	if (file_exists($url) == true) {
		return unlink($url);
	}
}
//获取浏览器
function get_broswer(){  
     $sys = $_SERVER['HTTP_USER_AGENT'];  //获取用户代理字符串  
     if (stripos($sys, "Firefox/") > 0) {  
         preg_match("/Firefox\/([^;)]+)+/i", $sys, $b);  
         $exp[0] = "Firefox";  
         $exp[1] = $b[1];  //获取火狐浏览器的版本号  
     } elseif (stripos($sys, "Maxthon") > 0) {  
         preg_match("/Maxthon\/([\d\.]+)/", $sys, $aoyou);  
         $exp[0] = "傲游";  
         $exp[1] = $aoyou[1];  
     } elseif (stripos($sys, "MSIE") > 0) {  
         preg_match("/MSIE\s+([^;)]+)+/i", $sys, $ie);  
         $exp[0] = "IE";  
         $exp[1] = $ie[1];  //获取IE的版本号  
     } elseif (stripos($sys, "OPR") > 0) {  
             preg_match("/OPR\/([\d\.]+)/", $sys, $opera);  
         $exp[0] = "Opera";  
         $exp[1] = $opera[1];    
     } elseif(stripos($sys, "Edge") > 0) {  
         //win10 Edge浏览器 添加了chrome内核标记 在判断Chrome之前匹配  
         preg_match("/Edge\/([\d\.]+)/", $sys, $Edge);  
         $exp[0] = "Edge";  
         $exp[1] = $Edge[1];  
     } elseif (stripos($sys, "Chrome") > 0) {  
             preg_match("/Chrome\/([\d\.]+)/", $sys, $google);  
         $exp[0] = "Chrome";  
         $exp[1] = $google[1];  //获取google chrome的版本号  
     } elseif(stripos($sys,'rv:')>0 && stripos($sys,'Gecko')>0){  
         preg_match("/rv:([\d\.]+)/", $sys, $IE);  
             $exp[0] = "IE";  
         $exp[1] = $IE[1];  
     }else {  
        $exp[0] = "未知浏览器";  
        $exp[1] = "";   
     }  
     return $exp[0].'('.$exp[1].')';  
}  


// 获取操作系统
function get_os() {
	$Agent=$_SERVER['HTTP_USER_AGENT'];  //获取用户代理字符串  
	$browserplatform=='';
	if (eregi('win',$Agent) && strpos($Agent, '95')) {
		$browserplatform="Windows 95";
	}
	elseif (eregi('win 9x',$Agent) && strpos($Agent, '4.90')) {
		$browserplatform="Windows ME";
	}
	elseif (eregi('win',$Agent) && ereg('98',$Agent)) {
		$browserplatform="Windows 98";
	}
	elseif (eregi('win',$Agent) && eregi('nt 5.0',$Agent)) {
		$browserplatform="Windows 2000";
	}
	elseif (eregi('win',$Agent) && eregi('nt 5.1',$Agent)) {
		$browserplatform="Windows XP";
	}
	elseif (eregi('win',$Agent) && eregi('nt 6.0',$Agent)) {
		$browserplatform="Windows Vista";
	}
	elseif (eregi('win',$Agent) && eregi('nt 6.1',$Agent)) {
		$browserplatform="Windows 7";
	}
	elseif (eregi('win',$Agent) && ereg('32',$Agent)) {
		$browserplatform="Windows 32";
	}
	elseif (eregi('win',$Agent) && eregi('nt',$Agent)) {
		$browserplatform="Windows NT";
	}elseif (eregi('Mac OS',$Agent)) {
		$browserplatform="Mac OS";
	}
	elseif (eregi('linux',$Agent)) {
		$browserplatform="Linux";
	}
	elseif (eregi('unix',$Agent)) {
		$browserplatform="Unix";
	}
	elseif (eregi('sun',$Agent) && eregi('os',$Agent)) {
		$browserplatform="SunOS";
	}
	elseif (eregi('ibm',$Agent) && eregi('os',$Agent)) {
		$browserplatform="IBM OS/2";
	}
	elseif (eregi('Mac',$Agent) && eregi('PC',$Agent)) {
		$browserplatform="Macintosh";
	}
	elseif (eregi('PowerPC',$Agent)) {
		$browserplatform="PowerPC";
	}
	elseif (eregi('AIX',$Agent)) {
		$browserplatform="AIX";
	}
	elseif (eregi('HPUX',$Agent)) {
		$browserplatform="HPUX";
	}
	elseif (eregi('NetBSD',$Agent)) {
		$browserplatform="NetBSD";
	}
	elseif (eregi('BSD',$Agent)) {
		$browserplatform="BSD";
	}
	elseif (ereg('OSF1',$Agent)) {
		$browserplatform="OSF1";
	}
	elseif (ereg('IRIX',$Agent)) {
		$browserplatform="IRIX";
	}
	elseif (eregi('FreeBSD',$Agent)) {
		$browserplatform="FreeBSD";
	}
	if ($browserplatform=='') {
		$browserplatform = "Unknown";
	}
	return $browserplatform;
}
//服务器IP
function get_server_ip(){
    if(isset($_SERVER)){
        if($_SERVER['SERVER_ADDR']){
            $server_ip=$_SERVER['SERVER_ADDR'];
        }else{
            $server_ip=$_SERVER['LOCAL_ADDR'];
        }
    }else{
        $server_ip = getenv('SERVER_ADDR');
    }
    return $server_ip;
}

<?php
//安装检查开始：如果您已安装过ThinkSNS，可以删除本段代码
if(is_dir('install') && !file_exists('install/install.lock')){
	header("Content-type: text/html; charset=utf-8");
	die ("<div style='border:2px solid green; background:#f1f1f1; width:800px;color:green;text-align:center;top: 40%;position: absolute;left: 50%;margin: -30px 0 0 -400px;'>"
		."<h1>您尚未安装tweibo系统，<a href='install/install.php'>请点击进入安装页面</a></h1>"
		."</div> <br /><br />");
}
//定义项目名称和路径

define('ROOT', getcwd());
define('APP_NAME', 'tweibo1.0beta');
define('APP_PATH', './');

require_once '/Conf/paths.php';
require_once 'Tencent.php';

//填写自己的appid
$client_id = '801323796';
//填写自己的appkey
$client_secret = '156f7633ab8626e9a6fa23e9ab201e13';

OAuth::init($client_id, $client_secret);
Tencent::$debug = false;
// 加载框架入口文件
require("/ThinkPHP/ThinkPHP.php");
//error_reporting(0);

?>

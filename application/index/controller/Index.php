<?php
namespace app\index\controller;
use Think\Config;
use Think\Env;
class Index
{
    public function index()
    {
    	//$config = ['fieldA'=>'aaaaa','fieldB'=>'bbbbbb','sum'=>11111];
    	//config($config);
    	//Config::set($config);
    	//Config::set('database.type','mongodb');
    	//config('my_site_name','new.site.com');//["my_site_name"]=> string(12) "new.site.com" }
    	//$conf = \Think\Config::get();
    	//加载配置
    	//$conf = Config::get();
    	//加载特定配置
    	//$conf = Config::get('route_config_file');
    	//判断是否存在配置项
    	//$re = Config::has('route_config_file');
    	//var_dump($re);//true/false
    	//print_r($conf);
    	
    	//读取二级配置
    	//echo Config::get("database.type")."\n";//mysql
        //Config::set('default_return_type','json');
    	//$res = config();//助手函数=Config::get()
    	//$res = config('database.type');
        //Config::load(APP_PATH.'myconfig.php', 'test', 'user');
        //$res = Config::get('','user');
	   // $res = Config::get();
	   $res = Env::get('myenv');
    	var_dump($res)."\n";
    	//批量设置配置
    	
        //return 'hello';
    }
}

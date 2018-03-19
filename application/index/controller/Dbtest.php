<?php
namespace app\index\controller;

use think\Db;

class Dbtest{
    //连接数据库
    //1.config/database.php
    public function test1(){
        $re = Db::table('oa_user')
            ->where(['id'=>1])
            ->value('username');
        dump($re);
        return $re;
    }
    //2.动态配置 一次性生效
    public function test2(){
        $re = Db::connect([
            'type'=>'mysql',
            'hostname'=>'127.0.0.1',
            'database'=>'oa',
            'username'=>'root',
            'password'=>''])
            ->table('oa_user')
            ->where(['id' => 1])
            ->value('username');
        dump($re);
    }
    //3. dsn连接
    public function test3(){
        //格式： 数据库类型://username:pwd@数据库地址:端口号/数据库名称#字符集
        $dsn = "mysql://root:@127.0.0.1:3306/oa#utf8";
        $re = Db::connect($dsn)
            ->table('oa_user')
            ->where(['id' => 1])
            ->value('username');
        dump($re);
    }

}
<?php
namespace app\index\controller;
//use Think\Controller;
use app\common\Test1;//依赖注入 将类的对象当作参数传入类的方法

class Demo1{
    public function getname($name="Jack"){
        return 'hello '.$name."\n";
    }

    //自动触发依赖注入,实例化对象
    public function getmethod(Test1 $test){
        //Test1 $test = $test = new Test1()
        $test->setname("Alpah");
        return $test->getname();//app\common\Test1::getname name:Alpah
    }

    //绑定一个类
    public function bindClass(){
        \think\Container::set('test1','app\common\Test1');
        //$temp = new \app\common\Test1;
        //bind('test1', $temp);
        //实例化容器中的类并初始化使用
        $var = ['name'=>'Google'];
        //return $temp->getname();
        //app('test1');
        $temp = \think\Container::get('test1',$var);
        return $temp->getname();
    }
    //绑定一个闭包
    public function bindClosure()
    {
        //闭包放入容器
        \think\Container::set('test1', function($domain){
            return 'content is '.$domain;
        });
        //获取闭包
        $temp = \think\Container::get('test1', ['domain'=>'www.google.com']);
        return $temp;
    }
}
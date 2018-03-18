<?php
namespace app\index\controller;
//use app\facade\Test;
class Demo2{
    public function index(){
        /* $temp = new \app\common\Test2();
        return $temp->hello("mike"); */

        /* Facade 概念 以静态的方式访问动态方法 */
        /*facade/Test类代理app\common\Test2类 实现静态调用*/
        //return Test::hello("mike");
        //return \app\facade\Test::hello("Jack");

        //动态绑定
        \think\Facade::bind('\app\facade\Test','\app\common\Test2');
        return \app\facade\Test::hello('Jack');
    } 
    /* public function index(\app\common\Test2 $temp)
    {
       // $temp = new \app\common\Test2();
        return $temp->hello("mike");
    } */
}
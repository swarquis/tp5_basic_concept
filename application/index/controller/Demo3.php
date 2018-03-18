<?php

namespace app\index\controller;
//tp5.1不依赖父类controller
use think\facade\Request;
class Demo3 extends \think\Controller{
    public function index(){
        return __METHOD__;//or dump(result)
    }
    //Request 对象
    public function test(\think\Request $temp){
        //dump(Request::get());
        //$temp = new \think\Request();
        dump($temp->get());
    }

    public function test2(){
        //dump($this->request->get());
        return json_encode($this->request->get());
    }
}
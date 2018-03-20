<?php
namespace app\index\controller;
use think\Controller;
class Demo5 extends Controller{
    public function test1(){
        return $this->view->fetch();
    }
    public function test2(){
        return $this->view->fetch();
    }
}
<?php
namespace app\index\controller;
use think\Controller;
use think\Facade\View;
class View1 extends Controller{
    public function test1(){
        $content = '<h3 style="color:red"> Test </h3>';
        //return $this->view->display($content);
        return View::display($content);
        //return $this->display($content);
        //$this->view == new View();
    }

    public function test2(){
        //assign
        $name = "Mike";
        $this->view->assign('name', $name);
        $this->view->assign('age', 100);
        //assign in batch
        $this->view->assign([
        'sex'=>'male',
        'salary'=>100
        ]);
        //array
        $data = [
            ['id'=>1,'name'=>'aaa','price'=>111],
            ['id'=>2,'name'=>'bbb','price'=>1111],
            ['id'=>3,'name'=>'ccc','price'=>11112],
            ['id'=>4,'name'=>'ddd','price'=>1333],
            ['id'=>5,'name'=>'eee','price'=>11412],
        ];
        $this->view->assign('goods', $data);
        //output object
        $obj = new \stdClass();
        $obj->name = "Ken";
        $obj->age = 999;
        $this->view->assign('obj', $obj);
        //output constant
        define("NAME","ROY");
        //output variable in template
        //view dir in current module, file in current module/controller/method...
        return $this->view->fetch();
    }

    public function test3(){
        $data = \app\index\model\Oa_user::all();
        //$this->view->assign('title','test3');
        $this->view->assign('data', $data);
        return $this->view->fetch();
    }
    public function test4(){
        //think\db\query  -> paginate
        $data = \app\index\model\Oa_user::paginate(5);
        $prev = $_SERVER['HTTP_REFERER'];
        $this->view->assign('prev', $prev);
        //$this->view->assign('title','test3');
        $this->view->assign('data', $data);
        return $this->view->fetch();

    }
}
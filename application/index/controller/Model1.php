<?php
namespace app\index\controller;
use app\index\model\Oa_user;
//a model is bound to a table
class Model1{
    public function get(){
        $re = Oa_user::get(3);
        //dump($re);
        //查询构造器
        //return Oa_user::field('id, username')->
        //        where('id',3)
          //      ->find();
        //return Db::table('oa_user')->field('id, username')->where('id', 3)
            //->find();
           // return Oa_user::all();
            return Oa_user::all([1,2,3]);
    }
}
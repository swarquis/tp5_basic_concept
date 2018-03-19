<?php
namespace app\index\controller;
use think\Db;
use think\Config;
class Dbcurd{
    //1.单条查询
    public function test1(){
        //db类调用think\db\Query.php
        $temp = Db::table('oa_user')
            //->field('id,username')
            ->field(['id'=>'编号','username'=>'用户名'])//filter field and give alias
            ->where(['id'=>1])
            ->find();//retrieve one record only!
        dump(is_null($temp)?'no record':$temp);//null or one row of array
        //return json_encode($temp);
    }

    public function test2(){
        $temp = Db::table('oa_user')
            //->field('id,username')
            ->field(['id' => '编号', 'username' => '用户名'])//filter field and give alias
            //->where('id',1)//where('id','=',4) 一个条件，多个条件用数组
            ->find(1);//retrieve one record only!
            //如果where根据主键查询，可将主键id放入find方法直接查询
        dump($temp);
    }
    public function select(){
        $temp = Db::table('oa_user')
                    ->field('id,username')
                    ->select();
        foreach($temp as $k=>$v){
            //...
        }
        dump($temp);
    }
    public function insert(){
        $data['username'] = 'Tom2';
        $data['password'] = 'dadwqeqw';
        $data['dep_no'] = 1;
        //$re = Db::table('oa_user')->insert($data, true);//true for replace into for mysql db
        //$re = Db::table('oa_user')->data($data)->insert();//
        $re = Db::table('oa_user')->insertGetId($data);//insert and return mysql_insert_id
        return $re;//affected row number or false
        
    }

    public function insertbatch(){
        $data = [
            ['username'=>'Gen1','password'=>'rqwqw','dep_no'=>3],
            ['username'=>'Tan1','password'=>'rqw1223qw','dep_no'=>5],
            ['username'=>'Uiis1','password'=>'rqwqqwewqew','dep_no'=>2],
        ];
        //return Db::table('oa_user')->insertAll($data);//return affected rows or false
        return Db::table('oa_user')->data($data)->insertAll();//return affected rows or false
    }

    public function update(){
        //更新条件
        /* return Db::table('oa_user')
                    ->where('id','=',10)
                    ->update(['username'=>'update10']); *///1
        //以主键为条件更新
        return Db::table('oa_user')
                    ->update(['username' => 'update8','id'=>8]);
    }

    public function delete(){
        //return Db::table('oa_user')->delete(10);//1
        return Db::table('oa_user')->where('id','=',9)->delete();//1 or 0
    }

    //原生sql语句
    public function exec(){
        $sql = "select * from oa_user where id <= 6";
        //$re = Db::query($sql);
        //dump($re);
        return Db::execute("update oa_user set username='dasdwqe' where id=3");
    }

}
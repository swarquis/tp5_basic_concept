<?php
namespace app\index\controller;
//use app\validate\User;//自定义验证器
use app\facade\User;
use think\Controller;
/*验证数据*/
class Demo6 extends Controller{
    //验证器类的使用
    public function test1(){
        //指定要验证的数据
        $data = [
            'name'=>'Jackee',
            'email'=>'abc@qq.com',
            'password'=>'aaaaaa',
            'mobile'=>'13658043427'
        ];
        $validate = new User();
        $re = $validate->check($data);
        dump($re);
        if(!$re){
            return $validate->getError();
        }
        return "验证通过";
    }

    public function test2(){
        $data = [
            'name' => 'Jackee',
            'email' => 'abc@qq.com',
            'password' => 'aaaaaa',
            'mobile' => '13658043427'
        ];
        //$validate = new User();
        $re = User::check($data);
        //$re = $validate->check($data);
        dump($re);
        if (!$re) {
            return User::getError();
        }
        return "验证通过";
    }
    //controller validate方法验证
    public function test3(){
        //$this->validate($data, $validate)
        $data = [
            'name' => 'Jack',
            'email' => 'abc@qq.com',
            'password' => 'aaaaaa',
            'mobile' => '13658043427'
        ];
        $validate = 'app\validate\User';
        $re = $this->validate($data, $validate);
        //dump($re);//true or error message
        if(true !== $re){
            return $re;
        }
        return "验证通过";
    }

    public function test4(){
        //think\Validate rule()方法初始化$rule
        $rule = [
            'name|姓名' => [
                'require',
                'min' => 6,
                'max' => 20,
            ],
            'email|邮箱' => [
                'require',
                'email',
            ],
            'password|密码' => [
                'require',
                'min' => 6,
                'max' => 20,
                'alphaNum'
            ],
            'mobile|手机' => [
                'require',
                'mobile'
            ],
        ];
        $data = [
            'name' => 'Jackee',
            'email' => 'abc@qq.com',
            'password' => 'aaaaaa',
            'mobile' => '13658043427'
        ];
        \think\facade\Validate::rule($rule);
        $re = \think\facade\Validate::check($data);
        if(!$re){
            return \think\facade\Validate::getError();
        }
        return "验证成功";
    }
}
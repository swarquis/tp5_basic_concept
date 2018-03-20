<?php
namespace app\validate;
//用户验证类
use think\Validate;
class User extends Validate{
    protected $rule = [
        'name|姓名'=>[
            'require',
            'min'=>6,
            'max'=>20,
        ],
        'email|邮箱'=>[
            'require',
            'email',
        ],
        'password|密码'=>[
            'require',
            'min'=>6,
            'max'=>20,
            'alphaNum'
        ],
        'mobile|手机'=>[
            'require',
            'mobile'
        ],
    ];
}
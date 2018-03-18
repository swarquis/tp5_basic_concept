<?php
namespace app\facade;

class Test extends \think\Facade{
    protected static function getFacadeClass()
    {
        return '\app\common\Test2';
    }
}
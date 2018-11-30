<?php
namespace app\index\controller;

use think\swoole\facade\Timer;

class Index
{
    public function index($name = 'ThinkPHP5')
    {
        //使用定时器模板
        $t=new \app\lib\TestTimer(['name'=>$name]);
        Timer::tick(1000,$t);
        return 'hello,' . $name;
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}

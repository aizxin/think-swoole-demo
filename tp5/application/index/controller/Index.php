<?php
namespace app\index\controller;

use app\job\Hello;
use think\Queue;
use think\swoole\facade\Timer;

class Index
{
    public function index($name = 'ThinkPHP5')
    {
        //使用定时器模板
        $t=new \app\lib\TestTimer(['name'=>$name]);
        Timer::tick(1000,$t);

        // 1.当前任务将由哪个类来负责处理。
        //   当轮到该任务时，系统将生成一个该类的实例，并调用其 fire 方法
        $jobHandlerClassName  = Hello::class;
        // // 2.当前任务归属的队列名称，如果为新队列，会自动创建
        $jobQueueName       = "helloJobQueue";
        // // // 3.当前任务所需的业务数据 . 不能为 resource 类型，其他类型最终将转化为json形式的字符串
        // // //   ( jobData 为对象时，需要在先在此处手动序列化，否则只存储其public属性的键值对)
        $jobData  = [ 'userEmail' => "459894336@qq.com", 'title' => "类型最终将转化为json形式" , 'contents' => "obData 为对象时，需要在先在此处手动序列化，否则只存储其public属性的键值对" ] ;
        // // 4.将该任务推送到消息队列，等待对应的消费者去执行
        // $isPushed = Queue::push( $jobHandlerClassName , $jobData , $jobQueueName );
        $isPushed = Queue::later(60*60, $jobHandlerClassName , $jobData , $jobQueueName );
        // database 驱动时，返回值为 1|false  ;   redis 驱动时，返回值为 随机字符串|false
        if( $isPushed !== false ){
            echo date('Y-m-d H:i:s') . " a new Hello Job is Pushed to the MQ"."<br>";
        }else {
            echo 'Oops, something went wrong.';
        }
        return 'hello,' . $name;
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}

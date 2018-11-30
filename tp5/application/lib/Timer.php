<?php
/**
 * FileName: Timer.php
 * ==============================================
 * Copy right 2016-2017
 * ----------------------------------------------
 * This is not a free software, without any authorization is not allowed to use and spread.
 * ==============================================
 * @author: kong | <iwhero@yeah.com>
 * @date  : 2018-11-30 09:45
 */

namespace app\lib;

use think\swoole\template\Timer as TimerC;

class Timer extends TimerC
{
    public function initialize($arg)
    {
        var_dump($arg);
        // TODO: Implement _initialize() method.
    }

    public function run()
    {
        var_dump(date('H:i:s',time()));
        var_dump('timer');
    }
}
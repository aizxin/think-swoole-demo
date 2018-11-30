<?php
/**
 * FileName: TestTask.php
 * ==============================================
 * Copy right 2016-2017
 * ----------------------------------------------
 * This is not a free software, without any authorization is not allowed to use and spread.
 * ==============================================
 * @author: kong | <iwhero@yeah.com>
 * @date  : 2018-11-30 10:00
 */

namespace app\lib;


use think\swoole\template\Task;

class TestTask extends Task
{
    protected function initialize($args)
    {
        // TODO: Implement initialize() method
    }

    public function run($serv, $task_id, $fromWorkerId)
    {
        var_dump($serv, $task_id, $fromWorkerId);
    }
}
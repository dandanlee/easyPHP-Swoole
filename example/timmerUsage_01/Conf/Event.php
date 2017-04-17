<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2017/1/23
 * Time: 上午12:06
 */

namespace Conf;


use Core\AbstractInterface\AbstractEvent;
use Core\Component\Logger;
use Core\Http\Request\Request;
use Core\Http\Response\Response;
use Core\Swoole\Timer;

class Event extends AbstractEvent
{
    function frameInitialize()
    {
        // TODO: Implement frameInitialize() method.
        date_default_timezone_set('Asia/Shanghai');
    }

    function beforeWorkerStart(\swoole_http_server $server)
    {
        // TODO: Implement beforeWorkerStart() method.
    }

    function onStart(\swoole_http_server $server)
    {
        // TODO: Implement onStart() method.
    }

    function onShutdown(\swoole_http_server $server)
    {
        // TODO: Implement onShutdown() method.
    }

    function onWorkerStart(\swoole_server $server, $workerId)
    {
        // TODO: Implement onWorkerStart() method.
        //为worker id为0的进程加入定时器。
        if($workerId == 0){
            //每五秒执行一次
            Timer::loop(5000,function (){
               Logger::console(time());
            });
        }
        //为所有的worker进程加入定时器
        Timer::loop(10000,function ()use($workerId){
            Logger::console("worker id is {$workerId} ".time());
        });
    }

    function onWorkerStop(\swoole_server $server, $workerId)
    {
        // TODO: Implement onWorkerStop() method.
    }

    function onRequest(Request $request, Response $response)
    {
        // TODO: Implement onRequest() method.
    }

    function onDispatcher(Request $request, Response $response, $targetControllerClass, $targetAction)
    {
        // TODO: Implement onDispatcher() method.
    }

    function afterResponse(Request $request)
    {
        // TODO: Implement afterResponse() method.
    }

    function onTask(\swoole_http_server $server, $taskId, $fromId, $taskObj)
    {
        // TODO: Implement onTask() method.
    }

    function onFinish(\swoole_http_server $server, $taskId, $fromId, $taskObj)
    {
        // TODO: Implement onFinish() method.
    }

    function onWorkerError(\swoole_http_server $server, $worker_id, $worker_pid, $exit_code)
    {
        // TODO: Implement onWorkerError() method.
    }

    function onWorkerFatalError(\swoole_http_server $server)
    {
        // TODO: Implement onWorkerFatalError() method.
    }

}

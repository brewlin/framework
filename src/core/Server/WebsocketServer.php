<?php
/**
 * Created by PhpStorm.
 * User: brewlin
 * Date: 2019/6/15
 * Time: 12:00
 */

namespace Core\Server;

use Core\Container\Mapping\Bean;
use Core\Listener\MessageListener;
use Core\Listener\ReceiveListener;
use Core\Listener\RequestListener;
use Core\Server\Server;
use Core\Swoole\SwooleEvent;
use Core\Server\TcpServer;

/**
 * Class WebsocketServer
 * @package Core\Server
 * @Bean()
 */
class WebsocketServer extends Server
{
    protected $port = 9090;
    protected $serverType = 'Websocket';
    protected $host = "127.0.0.1";
    public function __construct()
    {
        $this->port = env("WS_PORT");
        $this->host = env("WS_PORT");

        parent::__construct();
    }
    public function defaultSetting():array
    {
        $serverConfig = config("server");
        $default = [
            'daemonize' => (int)env("DAEMONIZE", 0),
            'worker_num' => (int)env("WORKER_NUM", 4),
            'open_http2_protocol' => (bool)env("ENABLE_GRPC",false),
        ];
        if(!empty($serverConfig['setting']))
            $default = array_merge($serverConfig['setting'],$default);
        return $default;
    }
    /**
     * start http server
     */
    public function start():void
    {
        $this->swooleServer = new \Swoole\Websocket\Server($this->host,$this->port,$this->mode,$this->type);
        $this->setPanel();
        $this->setListener();
        $this->startSwoole();
    }

    /**
     * set console log
     */
    public function setPanel()
    {
        //console log
        if(env("ENABLE_HTTP",false)) {
            $this->panel["HTTP"] = [
                'listen' => env("WS_HOST") . ':' . env("WS_PORT"),
                'type' => "HTTP",
                'mode' => env("HTTP_MODE", "process"),
                'worker' => env("WORKER_NUM"),
            ];
        }
        if(env("ENABLE_GRPC",false)){
            $this->panel["GRPC"] = [
                'listen' => env("GRPC_HOST") . ':' . env("GRPC_PORT"),
                'type'   => "HTTP2",
                'mode'   => env("HTTP_MODE","process"),
                'worker' => env("WORKER_NUM"),
            ];
        }
            $this->panel["WEBSOCKET"] = [
                'listen' => env("WS_HOST") . ':' . env("WS_PORT"),
                'type'   => "WEBSOCKET",
                'mode'   => env("HTTP_MODE","process"),
                'worker' => env("WORKER_NUM"),
            ];
    }
    /**
     * set http & tcp on listener
     */
    public function setListener(): void
    {
        $this->httpListener = [
            SwooleEvent::MESSAGE => new MessageListener(),
        ];
        if(env("ENABLE_GRPC",false) || env("ENABLE_HTTP",false)){
            $this->httpListener[SwooleEvent::REQUEST] = new RequestListener();
        }
        if(env("ENABLE_TCP",false)){
            $this->listener = [
                "TCP" =>  new TcpServer()
            ];
        }
        $this->mergerListener();
    }

    /**
     * merger config root/config/event.php
     * @return void
     */
    public function mergerListener():void
    {
        $event = config("event");
        $this->httpListener = array_merge($this->httpListener,$event);

    }

}
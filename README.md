# framework
PHP Coroutine Framework

# demo & docs
- examples/api 完整的framework使用示例
-- sdf
- @[im-cloud](https://github.com/brewlin/im-cloud) 基于当前框架设计的一个im分布式中间件
    - appm 多进程模式
    - apps 单进程全协程化模式
# component
## @[core](src/core)  核心架构
## @[grpc](src/grpc)  grpc包依赖 grpc-client连接池
## @[discovery](src/discovery)  服务发现注册
## @[process](src/process) 自定义进程管理器
## @[redis](src/redis) redis连接池
## @[queue](src/queue) 消息队列连接池
## @[database](src/database) db连接池
## @[memory](src/memory)swoole 相关内存操作封装
## @[task](src/task) 异步任务投递组件

# console
- start   `php bin/app --start`
- restart `php bin/app --restart`
- stop    `php bin/app --stop`
- daemon  `php bin/app --start --d`
- debug   `php bin/app --start --debug --log=true`
```
 _                  _                 _                           _      
(_)_ __ ___     ___| | ___  _   _  __| |  _____      _____   ___ | | ___ 
| | '_ ` _ \   / __| |/ _ \| | | |/ _` | / __\ \ /\ / / _ \ / _ \| |/ _ \
| | | | | | | | (__| | (_) | |_| | (_| | \__ \ V  V / (_) | (_) | |  __/
|_|_| |_| |_|  \___|_|\___/ \__,_|\__,_| |___/ \_/\_/ \___/ \___/|_|\___|

im-cloud console (Version: 2.2.0)

Usage:
  php bin/app OPTIONS --opt -v -h ...

Options:
  --start      start the server 启动服务
  --restart    restart the server 重启服务
  --stop       stop the server  kill服务
  --reload     reload the server 重启worker
  --d          with deamon      守护模式
  --debug      start debug     开启debug
  --log=bool   true start log,false stop log 是否开启日志记录
  --h          Display this help message
  --v          Show application version information

                                       Cloud
  *********************************************************************************
  * GRPC      | Listen: 0.0.0.0:9500, type: HTTP2, mode: process, worker: 2
  * WEBSOCKET | Listen: 0.0.0.0:9500, type: WEBSOCKET, mode: process, worker: 2
  * TCP       | Listen: 0.0.0.0:9501, type: Tcp, model: TCP, worker: 2
  *********************************************************************************
```
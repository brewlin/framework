<?php
/**
 * Created by PhpStorm.
 * User: brewlin
 * Date: 2020/1/16 0016
 * Time: 上午 11:29
 */

namespace Database\Event;

use Core\Container\Mapping\Bean;
use Core\Event\EventDispatcherInterface;
use Core\Event\EventEnum;
use Core\Event\EventManager;
use Core\Event\Mapping\Event;
use Hyperf\Database\Events\StatementPrepared;
use Log\Helper\Log;
use PDO;
use Hyperf\Database\Events\QueryExecuted;
/**
 * Class FetchModeEvent
 * @package App\Event
 * @Event(alias=EventEnum::DbFetchMode)
 */
class FetchModeEvent implements EventDispatcherInterface
{
    /**
     * @param $event
     */
    public function dispatch(...$param){
        $event = $param[0];
        if ($event instanceof StatementPrepared) {
            Log::debug("fetch mode event");

//            EventManager::trigger(EventEnum::DbFetchMode,$event);
        }
    }
}
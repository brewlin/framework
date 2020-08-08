<?php
/**
 * Created by PhpStorm.
 * User: brewlin
 * Date: 2020/1/16 0016
 * Time: 上午 11:29
 */

namespace App\Event;

use Core\Event\EventDispatcherInterface;
use Core\Event\EventEnum;
use Core\Event\Mapping\Event;
use Hyperf\Database\Events\StatementPrepared;
use PDO;

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
            $event->statement->setFetchMode(PDO::FETCH_ASSOC);
        }
    }
}
<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: logic.proto

namespace Im\Logic;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>im.logic.PushRoomReq</code>
 */
class PushRoomReq extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string room = 1;</code>
     */
    private $room = '';
    /**
     * Generated from protobuf field <code>string type = 2;</code>
     */
    private $type = '';
    /**
     * Generated from protobuf field <code>bytes msg = 3;</code>
     */
    private $msg = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $room
     *     @type string $type
     *     @type string $msg
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Logic::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string room = 1;</code>
     * @return string
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Generated from protobuf field <code>string room = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setRoom($var)
    {
        GPBUtil::checkString($var, True);
        $this->room = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string type = 2;</code>
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Generated from protobuf field <code>string type = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkString($var, True);
        $this->type = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>bytes msg = 3;</code>
     * @return string
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * Generated from protobuf field <code>bytes msg = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setMsg($var)
    {
        GPBUtil::checkString($var, False);
        $this->msg = $var;

        return $this;
    }

}

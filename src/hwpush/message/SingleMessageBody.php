<?php
/**
 * Created by IntelliJ IDEA.
 *
 * Time: 下午2:18
 *
 * @author keal<qihanw@medlinker.com>
 */

namespace hwpush;

class SingleMessageBody
{

    /**
     * 客户端通过华为sdk申请的push token.
     *
     * @var string.
     */
    public $deviceToken;

    /**
     * 透传消息体.
     *
     * @var string.
     */
    public $message;

    /**
     * 0：高优先级,1：普通优先级,缺省值为1
     *
     * @var integer.
     */
    public $priority = 1;

    /**
     * 消息是否需要缓存:0：不缓存,1：缓存,缺省值为0
     *
     * @var integer.
     */
    public $cacheMode = 0;

    /**
     * 标识消息类型（缓存机制），由调用端赋值，取值范围（1~100）。当TMID+msgType的值一样时，仅缓存最新的一条消息
     *
     * @var integer.
     */
    public $msgType;

    /**
     * 开发者填写了该字段，则需要保证该字段唯一.
     *
     * @var string.
     */
    public $requestID;

    /**
     * unix时间戳,格式：2013-08-29 19:55.
     *
     * @var string.
     */
    public $expire_time;

    /**
     * SingleMessage constructor.
     * @param $deviceToekn
     * @param $message
     * @param $priority
     * @param $cacheMode
     * @param $msgType
     * @param $requestId
     * @param $expireTime //unix时间戳.
     */
    public function __construct($deviceToekn, $message, $priority, $cacheMode, $msgType, $requestId, $expireTime)
    {
        $this->deviceToken = $deviceToekn;
        $this->message = $message;
        $this->priority = $priority;
        $this->cacheMode = $cacheMode;
        $this->msgType = $msgType;
        $this->requestID = $requestId;
        $this->expire_time = date('Y-m-d H:i', $expireTime);
    }

}

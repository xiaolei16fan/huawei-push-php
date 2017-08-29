<?php
/**
 * Created by IntelliJ IDEA.
 *
 * Time: 上午11:51
 *
 * @author keal<qihanw@medlinker.com>
 */

namespace hwpush\message;

class BatchMessageBody
{

    /**
     * Device token列表，最多填1000个.
     *
     * @var string.
     */
    public $deviceTokenList;

    /**
     * 发送到设备上的消息，最长为4096 字节
     *
     * @var string.
     */
    public $message;

    /**
     * 消息是否需要缓存
     * 0：不缓存
     * 1：缓存
     * 缺省值为0
     *
     * @var integer
     */
    public $cacheMode;

    /**
     * 标识消息类型（缓存机制），由调用端赋值，取值范围（1~100）。当TMID+msgType的值一样时，仅缓存最新的一条消息
     *
     * @var integer.
     */
    public $msgType;

    /**
     * 过期时间.
     *
     * @var false|string
     */
    public $expire_time;

    /**
     * BatchMessageBody constructor.
     * @param $deviceTokenList
     * @param $message
     * @param $cacheMode
     * @param $msgType
     * @param $expire_time
     */
    public function __construct($deviceTokenList, $message, $cacheMode, $msgType, $expire_time)
    {
        $this->deviceTokenList = json_encode($deviceTokenList, JSON_UNESCAPED_UNICODE);
        $this->message = $message;
        $this->cacheMode = $cacheMode;
        $this->msgType = $msgType;
        $this->expire_time = date('Y-m-d H:i', $expire_time);
    }


}

<?php
/**
 * Created by IntelliJ IDEA.
 *
 * Time: 下午2:23
 *
 * @author keal<qihanw@medlinker.com>
 */

namespace hwpush\message;

class NoticeBody
{

    /**
     * 推送范围:
     * 1：指定用户，必须指定tokens字段
     * 2：所有人，无需指定tokens，tags，exclude_tags
     * 3：一群人，必须指定tags或者exclude_tags字段
     *
     * @var integer.
     */
    public $push_type;

    /**
     * 用户标识
     * 样例： xxx, ddd
     * 多个token用","分隔
     *
     * @var string.
     */
    public $tokens;

    /**
     * 用户标签，目前仅对android用户生效
     * 样例：{"tags":[{"location":["ShangHai","GuangZhou"]},}"age":["20","30"]}]}
     *
     * @var string.
     */
    // public $tags;

    /**
     * 需要剔除的用户的标签，目前仅对android用户生效
     * 样例：{"exclude_tags":[{"music":["blue"]},{"fruit":["apple"]}]}
     *
     * @var string.
     */
    // public $exclude_tags;

    /**
     * android 结构体.
     *
     * @var AndroidBody.
     */
    public $android;

    /**
     * 消息生效时间。如果不携带该字段，则表示消息实时生效。实际使用时，该字段精确到分,消息发送时间戳，timestamp格式ISO 8601：2013-06-03T17:30:08+08:00
     *
     * @var string.
     */
    // public $send_time;

    /**
     * 消息过期删除时间，消息过期时间，timestamp格式ISO 8601：2013-06-03T17:30:08+08:00
     *
     * @var string.
     */
    // public $expire_time;

    /**
     * 目标设备类型
     * 1：android
     * 2：ios
     * 默认为android
     *
     * @var integer.
     */
    // public $device_type;

    /**
     * 消息结构体
     * 发送给非android设备的消息内容
     * 样例：
     * {"ios":{"aps" : { "alert" : "Message received from Bob" },"acme2" : [ "bang", "whiz" ], "doings":1 }}
     *
     * @var string.
     */
    // public $message;

    /**
     * 1：IOS开发用户
     * 2：IOS生产用户
     * 目前仅给IOS设备发送消息需要填写该字段
     *
     * @var integer.
     */
    // public $target_user_type;

    /**
     * 消息允许展示时间段，时间精确到半小时，24小时制，可以填写一个或者多个时间段
     * 消息到达客户端后，由客户端决定是否将消息弹出或展示
     * 时间段样例：[[09:30,12:00],[15:00,16:00]]
     *
     * @var string.
     */
    // public $allow_periods;

    /**
     * Notice constructor.
     * @param int $push_type
     * @param string $tokens
     * @param string $tags
     * @param $exclude_tags
     * @param AndroidBody $android
     * @param string $send_time
     * @param string $expire_time
     * @param int $device_type
     * @param string $message
     * @param int $target_user_type
     * @param string $allow_periods
     */
    public function __construct()
    {
    }

}

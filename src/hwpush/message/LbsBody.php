<?php
/**
 * Created by IntelliJ IDEA.
 *
 * Time: 下午2:23
 *
 * @author keal<qihanw@medlinker.com>
 */

namespace hwpush\message;

class LbsBody
{

    /**
     * 经纬度信息,样例：{"location":{"type":"1","coordinates":[{"lat":"32.656293","lng":"119.580981"}]}}
     *
     * @var string.
     */
    public $location;

    /**
     * 用户标识,样例： xxx, ddd
     *
     * @var string.
     */
    public $tokens;

    /**
     * 用户标签,样例：{"tags":[{"location":["ShangHai","GuangZhou"]},}"age":["20","30"]}]}
     *
     * @var string.
     */
    public $tags;

    /**
     * 需要剔除的用户的标签,样例：{"exclude_tags":[{"music":["blue"]},{"fruit":["apple"]}]}
     *
     * @var string.
     */
    public $exclude_tags;

    /**
     * 消息内容,样例：{" notification_title":"the good news!","notification_content":"Price reduction!","doings":3,"url":"vmall.com"}
     *
     * @var AndroidBody.
     */
    public $android;

    /**
     * 消息生效时间。如果不携带该字段，则表示消息实时生效。实际使用时，该字段精确到分,消息发送时间戳，timestamp格式ISO 8601：2013-06-03T17:30:08+08:00
     *
     * @var string.
     */
    public $send_time;

    /**
     * 消息过期删除时间,消息过期时间，timestamp格式ISO 8601：2013-06-03T17:30:08+08:00
     *
     * @var string.
     */
    public $expire_time;

    /**
     * 消息允许展示时间段，时间精确到半小时，24小时制，可以填写一个或者多个时间段，消息到达客户端后，由客户端决定是否将消息弹出或展示，时间段样例：[[09:30,12:00],[15:00,16:00]]
     *
     * @var string.
     */
    public $allow_periods;

    /**
     * LbsBody constructor.
     * @param string $location
     * @param string $tokens
     * @param string $tags
     * @param string $exclude_tags
     * @param AndroidBody $android
     * @param string $send_time
     * @param string $expire_time
     * @param string $allow_periods
     */
    public function __construct($location, $tokens, $tags, $exclude_tags, AndroidBody $android, $send_time, $expire_time, $allow_periods)
    {
        $this->location = $location;
        $this->tokens = $tokens;
        $this->tags = $tags;
        $this->exclude_tags = $exclude_tags;
        $this->android = $android;
        $this->send_time = $send_time;
        $this->expire_time = $expire_time;
        $this->allow_periods = $allow_periods;
    }

}

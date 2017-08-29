<?php
/**
 * Created by IntelliJ IDEA.
 *
 * Time: 下午2:25
 *
 * @author keal<qihanw@medlinker.com>
 */

namespace hwpush\message;

class AndroidBody
{

    /**
     * Notification bar上显示的标题.(必选)
     *
     * @var string.
     */
    public $notification_title;

    /**
     * Notification bar上显示的内容.(必选)
     *
     * @var string.
     */
    public $notification_content;

    /**
     * 系统小图标名称,该图标预置在客户端，在通知栏顶部展示.(可选)
     *
     * @var string.
     */
    // public $notification_status_icon;

    /**
     * 仅富媒体消息需要填写该字段.(可选).
     *
     * @var string.
     */
    // public $content_file_url;

    /**
     * 1：直接打开应用
     * 2：通过自定义动作打开应用
     * 3：打开URL
     * 4：富媒体消息
     * 5：短信收件箱广告
     * 6：彩信收件箱广告
     * (必选)
     *
     * @var integer.
     */
    public $doings;

    /**
     * 短信收件箱广告内容,当doings的取值为5时，该字段必须填写
     *
     * @var string.
     */
    // public $smsContent;

    /**
     * 彩信收件箱广告附件链接,当doings的取值为6时，该字段必须填写
     *
     * @var string.
     */
    // public $mmsUrl;

    /**
     * 链接,当doings的取值为3时，必须携带该字段
     *
     * @var string.
     */
    // public $url;

    /**
     * 自定义打开应用动作，当doings的取值为2时，必须携带该字段
     *
     * @var string.
     */
    // public $intent;

    /**
     * 用户自定义键值对:"extras":[{"season":"Spring"},{"weather":"raining"}]
     *
     * @var json array.
     */
    // public $extra;

    /**
     * AndroidBody constructor.
     * @param string $notification_title
     * @param string $notification_content
     * @param string $notification_status_icon
     * @param string $content_file_url
     * @param int $doing
     * @param string $smsContent
     * @param string $mmsUrl
     * @param string $url
     * @param string $intent
     * @param $extra
     */
    public function __construct()
    {
    }

    /**
     * 检测是否填完必选参数.
     *
     * @throws \Exception
     */
    public function checkParmas()
    {
        if (empty($this->doings) || empty($this->notification_title) || empty($this->notification_content)) {
            throw new \Exception('缺少必填参数', 0);
        }
    }

}

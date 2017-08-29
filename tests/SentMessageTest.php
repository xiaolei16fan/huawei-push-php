<?php

use hwpush\Api;
use hwpush\message\BatchMessageBody;
use hwpush\message\NoticeBody;
use hwpush\message\QueryMsgBody;
use PHPUnit\Framework\TestCase;

class SentMessageTest extends TestCase
{
    protected $appId;
    protected $appSecret;

    public function setUp()
    {
        $this->appId = '';
        $this->appSecret = '';
    }

    public function testApi()
    {
        $deviceTokenList = array('0864264020863996300000649100CN01');
        $_message = 'hello world';
        $cacheMode = 0;
        $msgType = 1;
        $expire_time = '1502763840'; // 2017/08/15 20:00:00

        $hwpush = new Api($this->appId, $this->appSecret);
        $message = new BatchMessageBody($deviceTokenList, $_message, $cacheMode, $msgType, $expire_time);
        $res = json_decode($hwpush->BatchSend($message), true);
        $this->assertEquals($res['resultcode'], 0);
    }

    public function testQueryMsg()
    {
        $requestId = '1502677570381217448';
        $token = '0864264020863996300000649100CN01';
        $queryMsgBody = new QueryMsgBody($requestId, $token);

        $hwpush = new Api($this->appId, $this->appSecret);
        $hwpush->QueryMsgResult($queryMsgBody);
        var_dump($hwpush);
    }

    public function testSendNotice()
    {
        // $android = new AndroidBody();
        // $android->notification_title = 'hello world';
        // $android->notification_content = 'hello world content';
        // $android->notification_status_icon = '';
        // $android->content_file_url = '';
        // $android->doings = 2;
        // $android->smsContent = '';
        // $android->mmsUrl = '';
        // $android->url = '';
        // $android->intent = 'intent://push16fan/notification?';
        // $android->extra = '';

        $message = new NoticeBody();
        $message->push_type = 2;
        // $message->tokens = "";
        // $message->tags = "";
        // $message->exclude_tags = "";
        $message->android = '{"notification_title":"文章1","notification_content":"文章内容1","doings":2,"intent":"intent://push16fan/notification?title=测试标题&content=测试内容&extraMsg=测试额外数据&keyValue={exttype:article,pushid:708309}&#Intent;scheme=app16fan;launchFlags=0x10000000;end"}';
        // $message->send_time = strval(time());
        // $message->expire_time = strval(time() + 86400);
        // $message->device_type = 1;
        // $message->message = '';
        // $message->allow_periods = '';
        // $message->target_user_type = '';

        $hwpush = new Api($this->appId, $this->appSecret);
        $res = $hwpush->SendNotice($message);
        var_dump($res);exit;
        // $res = json_decode($hwpush->SendNotice($message), true);
        // $this->assertEquals($res['resultcode'], 0);
    }
}

<?php
/**
 * Created by IntelliJ IDEA.
 *
 * Time: 下午5:22
 *
 * @author keal<qihanw@medlinker.com>
 */

namespace hwpush;

use hwpush\message\BatchMessageBody;
use hwpush\message\LbsBody;
use hwpush\message\NoticeBody;
use hwpush\message\QueryMsgBody;

class Api
{

    private $requestData;

    /**
     * Api constructor.
     * @param $clientId
     * @param $clientSecret
     */
    public function __construct($clientId, $clientSecret)
    {
        $token = new Token($clientId, $clientSecret);
        $this->requestData = array(
            'nsp_ts' => strval(time()),
            'nsp_fmt' => 'JSON',
            'access_token' => $token->requestAccess(),
        );
    }

    /**
     * 透传单发.
     *
     * @param SingleMessageBody $singleMessageBody
     * @return string
     */
    public function SingleSend(SingleMessageBody $singleMessageBody)
    {
        $info = json_decode(json_encode($singleMessageBody, JSON_UNESCAPED_UNICODE), true);
        $this->requestData = array_merge($this->requestData, $info);
        $this->requestData['nsp_svc'] = Constant::SINGLE_SEND_URL;
        $res = Http::post(Constant::BASE_API, $this->requestData);
        return $res;
    }

    /**
     * 透传群发.
     *
     * @param BatchMessageBody $batchMessageBody
     * @return string
     */
    public function BatchSend(BatchMessageBody $batchMessageBody)
    {
        $info = $this->objectToArray($batchMessageBody);
        $this->requestData = array_merge($this->requestData, $info);
        $this->requestData['nsp_svc'] = Constant::BATCH_SEND_URL;
        print_r($this->requestData);
        $res = Http::post(Constant::BASE_API, $this->requestData);
        return $res;
    }

    /**
     * 发送通知栏消息.
     *
     * @param NoticeBody $noticeBody
     * @return string
     */
    public function SendNotice(NoticeBody $noticeBody)
    {
        $this->requestData = array_merge($this->requestData, (array)$noticeBody);
        $this->requestData['nsp_svc'] = Constant::NOTIFICATION_SEND_URL;
        $res = Http::post(Constant::BASE_API, $this->requestData);
        return $res;
    }

    /**
     * 发送地理位置消息.
     *
     * @param LbsBody $lbsBody
     * @return string
     */
    public function SendLbs(LbsBody $lbsBody)
    {
        $info = json_decode(json_encode($lbsBody, JSON_UNESCAPED_UNICODE), true);
        $this->requestData = array_merge($this->requestData, $info);
        $this->requestData['nsp_svc'] = Constant::LBS_SEND_URL;
        $res = Http::post(Constant::BASE_API, $this->requestData);
        return $res;
    }

    public function QueryMsgResult(QueryMsgBody $qmsgBody)
    {
        $info = json_decode(json_encode($qmsgBody, JSON_UNESCAPED_UNICODE), true);
        $this->requestData = array($this->requestData, $info);
        $this->requestData['nsp_svc'] = Constant::QUERY_MSG_RESULT_URL;
        $res = Http::post(Constant::BASE_API, $this->requestData);
        print($res);
        echo "\n";
        return $res;
    }

    /**
     * 对象转数组.
     *
     * @param $obj
     * @return array
     */
    private function objectToArray($obj)
    {
        return json_decode(json_encode($obj), true);
    }

}

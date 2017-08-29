<?php
/**
 * Created by IntelliJ IDEA.
 *
 * Time: 下午5:23
 *
 * @author keal<qihanw@medlinker.com>
 */

namespace hwpush;

class Token
{

    private $clientId;
    private $clientSecret;

    /**
     * Token constructor.
     * @param $clientId
     * @param $clientSecret
     */
    public function __construct($clientId, $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    public function requestAccess()
    {
        // todo add token expire;
        $postData = array(
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type' => 'client_credentials'
        );
        $res = Http::post(Constant::ACCESS_TOKEN_API, $postData);
        $tokenInfo = json_decode($res, true);
        $token = $tokenInfo['access_token'];
        $expireIn = $tokenInfo['expires_in'];
        return $token;
    }

}
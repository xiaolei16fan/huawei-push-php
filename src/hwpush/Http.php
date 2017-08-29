<?php
/**
 * Created by IntelliJ IDEA.
 *
 * Time: 下午5:19
 *
 * @author keal<qihanw@medlinker.com>
 */

namespace hwpush;

class Http
{

    /**
     * @var string
     * @author suchong
     */
    private static $_userAgent = 'MedLinker UA /1.0';

    /**
     * @var int
     * @author suchong
     */
    private static $_connectTimeout = 5;

    /**
     * @var int
     * @author suchong
     */
    private static $_timeout = 5;

    /**
     * @var int
     * @author suchong
     */
    private static $_httpCode;

    /**
     * @var string
     * @author suchong
     */
    private static $_httpInfo;

    /**
     * @var int
     * @author suchong
     */
    private static $_errorCode;

    /**
     * @var string
     * @author suchong
     */
    private static $_errorInfo;

    /**
     * @var string
     * @author suchong
     */
    private static $_url;

    /**
     * @var string
     * @author suchong
     */
    private static $_header;

    /**
     * 发送get请求
     * @author suchong
     * @param string $url
     * @param array $data
     * @param array $header
     * @return string $response
     */
    public static function get($url, $data = array(), $header = null, $userpwd = null)
    {
        return self::_sendHttpRequest('GET', $url, $data, $header, $userpwd);
    }

    /**
     * 发送post请求
     * @author suchong
     * @param string $url
     * @param array $data
     * @param array $header
     * @return string $response
     */
    public static function post($url, $data = array(), $header = null, $userpwd = null)
    {
        return self::_sendHttpRequest('POST', $url, $data, $header, $userpwd);
    }

    /**
     * 发送curl http请求
     * @author suchong
     * @param string $method
     * @param string $url
     * @param array $data
     * @param array $header
     * @return string $response
     */
    private static function _sendHttpRequest($method, $url, $data = null, $header = array(), $userpwd = null)
    {
        self::init();
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($curl, CURLOPT_USERAGENT, self::$_userAgent);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, self::$_connectTimeout);
        curl_setopt($curl, CURLOPT_TIMEOUT, self::$_timeout);
        curl_setopt($curl, CURLOPT_ENCODING, '');
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $method = strtoupper($method);
        if ('GET' === $method) {
            if (strpos($url, '?')) {
                $url .= '&';
            } else {
                $url .= '?';
            }
            $url .= http_build_query($data);
        } elseif ('POST' === $method) {
            curl_setopt($curl, CURLOPT_POST, true);
            if (!empty($data)) {
                if (is_string($data)) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                } else {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
                }
            }
        }

        if (null !== $userpwd) {
            curl_setopt($curl, CURLOPT_USERPWD, $userpwd);
        }

        if (null !== $header) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLINFO_HEADER_OUT, true);
        $response = curl_exec($curl);
        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        self::$_header = $header;
        self::$_httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        self::$_httpInfo = curl_getinfo($curl);
        self::$_errorCode = curl_errno($curl);
        self::$_errorInfo = curl_error($curl);
        self::$_url = $url;
        curl_close($curl);
        return $body;
    }

    /**
     * 获取http状态码
     * @author yangyang3
     * @return int self::$_httpCode
     */
    public static function getHttpCode()
    {
        return self::$_httpCode;
    }

    /**
     * 获取http信息
     * @author yangyang3
     * @return int self::$_httpInfo
     */
    public static function getHttpInfo()
    {
        return self::$_httpInfo;
    }

    /**
     * 获取头信息
     * @return string
     * @author suchong
     */
    public static function getHeader()
    {
        return self::$_header;
    }

    /**
     * 获取错误码
     * @author yangyang3
     * @return int self::$_errorCode
     */
    public static function getErrorCode()
    {
        return self::$_errorCode;
    }

    /**
     * 获取错误信息
     * @author yangyang3
     * @return int self::$_errorInfo
     */
    public static function getErrorInfo()
    {
        return self::$_errorInfo;
    }

    public static function init()
    {
        self::$_errorCode = 0;
        self::$_errorInfo = '';
        self::$_httpCode = 0;
        self::$_httpInfo = '';
        self::$_header = '';
    }


    /**
     * 根据get param 转换 url方便get & post数据同时存在
     * @param $url
     * @param $get_param
     *
     * @return string
     */
    public static function getUrlByParam($url, array $get_param)
    {
        if (empty($get_param)) {
            return $url;
        }
        $query = http_build_query($get_param);
        $url .= strpos($url, '?') ? '&' : '?';
        return $url . $query;
    }

    /**
     * post json
     *
     * @param $url
     * @param $json
     * @return mixed
     */
    public static function postJson($url, $json)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($json))
        );
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

}

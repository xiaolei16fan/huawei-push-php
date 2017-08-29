<?php
/**
 * Created by IntelliJ IDEA.
 *
 * Time: 下午5:24
 *
 * @author keal<qihanw@medlinker.com>
 *
 */

namespace hwpush;

class Constant
{

    const ACCESS_TOKEN_API          =   "https://login.vmall.com/oauth2/token";
    // const BASE_API                  =   "https://api.push.hicloud.com/pushsend.do";
    const BASE_API                  =   "https://api.vmall.com/rest.php";
    const SINGLE_SEND_URL           =   "openpush.message.single_send";
    const BATCH_SEND_URL            =   "openpush.message.batch_send";
    const LBS_SEND_URL              =   "openpush.openapi.lbs_send";
    const NOTIFICATION_SEND_URL     =   "openpush.openapi.notification_send";
    const SET_USER_TAG_URL          =   "openpush.openapi.set_user_tag";
    const QUERY_APP_TAGS_SEND_URL   =   "openpush.openapi.query_app_tags";
    const DELETE_USER_TAG_URL       =   "openpush.openapi.delete_user_tag";
    const QUERY_USER_TAG_SEND_URL   =   "openpush.openapi.query_user_tag";
    const QUERY_MSG_RESULT_URL      =   "openpush.openapi.query_msg_result";
    const GET_TOKEN_BY_DATE_URL     =   "openpush.openapi.get_token_by_date";

}

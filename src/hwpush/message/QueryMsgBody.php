<?php

namespace hwpush\message;

class QueryMsgBody
{
    public $requestId;
    public $token;
    
    public function __construct($requestId, $token = null)
    {
        $this->requestId = $requestId;
        $this->token = $token;
    }
}

# huawei-push-php
华为渠道push php版本

[相关文档](http://developer.huawei.com/cn/consumer/wiki/index.php?title=接口文档)

<pre>
	require_once "./autoload.php";
	$test = new Api($appId, $appSecret);
	$message = new BatchMessage($tokens...);
	$test->BatchSend($message);
</pre>

## composer 

<pre>
	composer require kaelwu/huawei-push
</pre>
	
#   h u a w e i - p u s h - p h p  
 
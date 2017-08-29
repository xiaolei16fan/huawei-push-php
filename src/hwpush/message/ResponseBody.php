<?php
/**
 * Created by IntelliJ IDEA.
 *
 * Time: 上午11:31
 *
 * @author keal<qihanw@medlinker.com>
 */

namespace hwpush\message;

class ResponseBody
{

    /**
     * 0:成功.
     *
     * @var string.
     */
    public $result_code;

    /**
     * 由服务器生成，方便用户问题追查与定位.
     *
     * @var string.
     */
    public $request_id;

    /**
     * 失败原因.
     *
     * @var string.
     */
    public $result_desc;

    /**
     * ResponseBody constructor.
     * @param string $result_code
     * @param string $request_id
     * @param string $result_desc
     */
    public function __construct($result_code, $request_id, $result_desc)
    {
        $this->result_code = $result_code;
        $this->request_id = $request_id;
        $this->result_desc = $result_desc;
    }


}

<?php
/**
 * greentea.
 *
 * Author: wudi <wudi23@baidu.com>
 * Date: 2015/09/21
 */

namespace App\Controller;


use App\Model\Model;
use App\Protocol\JsonProtocol;
use \Slim\Http\Response;
use \Illuminate\Validation\Validator;

abstract class BaseController
{

    /**
     * successWithJson
     *
     * @param Response $response
     * @param $result
     * @param string $msg
     * @param int $code
     * @return Response
     */
    public function successWithJson(Response $response, $result = 'ok', $msg = 'success', $code = 0, $status = 200)
    {
        if ($result instanceof Model) {
            $result = $result->toArray();
        }

        return JsonProtocol::success($response, $result, $msg, $code, $status);
    }


    /**
     * failWithJson
     *
     * @param Response $response
     * @param $msg
     * @param int $code
     * @param null $result
     * @param int $status
     * @return Response
     */
    public function failWithJson(Response $response, $result = null, $msg = 'fail', $code = -1,  $status = 500)
    {
        if (is_object($msg) && $msg instanceof Validator) {
            $result = $msg->messages()->getMessages();
            $msg = $msg->messages()->first();
        }

        return JsonProtocol::fail($response, $result, $msg, $code, $status);
    }

}

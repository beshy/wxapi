<?php

/**
 * 
 * 
 * Author: beShy <i@beshy.net>
 * Date: Mon Jan 18 15:29:13 2016
 */

namespace App\Protocol;

use \Slim\Http\Response;

class JsonProtocol
{

    /**
     * success
     *
     * @param Response $response
     * @param string $result
     * @param string $msg
     * @param int $code
     * @param int $status
     * @return Response
     */
    public static function success(Response $response, $result, $msg = 'success', $code = 0, $status = 200)
    {
        $response = self::withJson(
            $response,
            self::pack($code, $msg, $result),
            $status,
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR
        );

        return $response;
    }


    /**
     * fail
     *
     * @param Response $response
     * @param $msg
     * @param int $code
     * @param null $result
     * @param int $status
     * @return Response
     */
    public static function fail(Response $response, $result = null, $msg = 'fail', $code = -1, $status = 500)
    {
        $response = self::withJson(
            $response,
            self::pack($code, $msg, $result),
            $status,
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR
        );

        return $response;
    }

    /**
     * withJson
     * support JSONP
     *
     * @return void
     */
    public static function withJson(Response $response, $data, $status = 200, $encodingOptions = 0 )
    {

        $body = $response->getBody();
        $body->rewind();
        $s = json_encode($data, $encodingOptions);

        $type = "application/json";

        // check jsonp callback
        if (!empty($_GET) && !empty($_GET['callback'])) {
            $s = $_GET['callback']."($s);";
            $type = "text/javascript";
        }

        $body->write($s);

        return $response->withStatus($status)->withHeader('Content-Type', $type.';charset=utf-8');
    }


    /**
     * data pack
     *
     * @param $code
     * @param $msg
     * @param $result
     * @return string
     */
    public static function pack($code, $msg, $result)
    {
        return [
            'code'   => (int)$code,
            'msg'    => (string)$msg,
            'result' => ($result === null) ? new \stdClass() : $result,
        ];
    }

}
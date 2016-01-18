<?php
/**
 * Wxapi
 * 
 * Author: beShy <i@beshy.net>
 * Date: Mon Jan 18 15:57:48 2016
 */

namespace App\Controller\Wxapi;

/**
 * Wxapi
 */
class Wxapi extends WxBaseController
{

    /**
     * valid
     *
     * @return void
     */
    public function valid($req, $res, $args)
    {
        $s = empty($_GET["echostr"]) ? '' : $_GET["echostr"] ;

        //valid signature , option
        if($this->_checkSignature()){
            echo $s;
        } else {
            echo 'Invalid';
        }
    }


    /**
     * parse
     *
     * @param Request 
     * @param Response 
     * @param array 
     * @return Response
     */
    public function parse($req, $res, $args)
    {
        $parsedBody = $req->getParsedBody();
        $this->logger->alert( print_r($parsedBody, true) );
    }



    // ====================

    private function _checkSignature()
    {
        
        $signature = empty($_GET["signature"]) ? '' : $_GET["signature"];
        $timestamp = empty($_GET["timestamp"]) ? '' : $_GET["timestamp"];
        $nonce = empty($_GET["nonce"]) ? '' : $_GET["nonce"];
                
        $token = "innocence";
        $tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
        
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }

}


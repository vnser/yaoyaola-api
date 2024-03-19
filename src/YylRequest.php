<?php
/**
 * User: Vring
 * Date: 2024/3/19
 * Email: <971626354@qq.com>
 */

namespace vring\yaoyaolaApi;
use vring\http\Curl;

class YylRequest
{
    /**
     * @param ExapiParamInterface $param
     * @return array|mixed
     * @throws YylApiResponseException
     */
    public function send(ExapiParamInterface $param)
    {
      $sendParam = get_object_vars($param);
      $sendParam['reqtick'] = time();
      $sendParam['uid'] = Config::$uid;
      if ($param::$isSign){
          $sendParam['sign'] = Sign::hash($sendParam);
      }
      $result =  (new Curl())->url($param::APIPATH)->{$param::APIMETHOD}($sendParam);
//      var_dump($result);
      return $this->verifyResponse($result);
    }

    /**
     * 验证摇摇拉响应数据
     * @param string $result
     * @return mixed
     * @throws YylApiResponseException
     */
    public function verifyResponse(string $result): array
    {
        $data  = json_decode($result,true);
        if ("0" != $data['errcode']){
            throw new YylApiResponseException($data['errmsg'],$data['errcode']);
        }
        unset($data['errcode'],$data['errmsg']);
        return $data;
    }
}
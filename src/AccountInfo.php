<?php
/**
 * Author: vring
 * Date: 2024/3/25
 * Email: <971626354@qq.com>
 */

namespace vring\yaoyaolaApi;

class AccountInfo implements ExapiParamInterface
{
    const APIPATH = ApiPath::ACCOUNTINFO;
    const APIMETHOD = 'get';
    public $uid;
    static public $isSign = false;
    public function __construct()
    {
        $this->uid = Config::$uid;
    }


}
<?php

namespace vring\yaoyaolaApi;

class Sign
{
    static public function hash(array $param)
    {
        return md5($param['uid'].$param['type'].$param['orderid'].$param['money'].$param['reqtick'].($param['openid']??($param['account']??'')).Config::$apiKey);
    }
}
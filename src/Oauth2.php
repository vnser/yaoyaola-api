<?php
/**
 * Author: vring
 * Date: 2024/3/19
 * Email: <971626354@qq.com>
 */

namespace vring\yaoyaolaApi;

class Oauth2
{

    /**
     * @param string $backUrl 获取到openid后的跳转url，如果有带参数，可先对整个url做下urlencode编码
     * @param int $flag 0表示静默获取openid，1表示需要用户授权获取详细信息
     * @param int $mp (可选)设置mp为非0，则url参数可使用小程序路径如"/pages/login/login"，
     * mp=1使用reLaunch，
     * mp=2使用navigateTo,
     * mp=3使用redirectTo.
     * @return string
     */
    static public function getOauth2Url(string $backUrl = '', int $flag = 0, int $mp = 0): string
    {
        return ApiPath::CHECKUSER . "?" . http_build_query(['url' => urlencode($backUrl), 'flag' => $flag, 'mp' => $mp]);
    }
}
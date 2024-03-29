<?php
/**
 * Author: vring
 * Date: 2024/3/19
 * Email: <971626354@qq.com>
 */

namespace vring\yaoyaolaApi;

use vring\util\Url;

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

    /**
     * @param string $url 获取到openid后的跳转url，如果有带参数，可先对整个url做下urlencode编码
     * @param int $flag 0表示静默获取openid，1表示需要用户授权获取详细信息
     * @return void
     */
    static public function oauth2(string $url,int $flag = 0)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $aUrl = self::getOauth2Url($url,$flag);
        $auth_user  = $_SESSION["yyl_wechat_user"]??null;
        if ($auth_user){
            return $auth_user;
        }
        if (!isset($_GET['openid'])){
            header('location: '.$aUrl);
            exit;
        }
        $openid = $_GET['openid'] ?? '';
        if ($openid){
            if (isset($_GET['userinfo'])){
                $_GET['userinfo'] = json_decode(base64_decode($_GET['userinfo']),true);
            }
            $_SESSION["yyl_wechat_user"] = $_GET;
            return $_GET;
        }
        throw new \Exception("授权异常，".Url::instance()->url());
    }


    /**
     * 非微信用户是否获取详情授权模式
     * @param array $userinfo
     * @return bool 没有详情授权时，true，则false
     */
    static public function isNotAuthUserInfo(array $userinfo):bool
    {
        return (empty($userinfo['headimgurl']) || md5(file_get_contents($userinfo['headimgurl']) === 'c6aa423da40b267b7e1ee98b1ed2ee23') and $userinfo['nickname'] === '微信用户');
    }


}
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
        session_start();
//        $url = Url::instance()->url();
        $aUrl = self::getOauth2Url($url,$flag);
        $auth_user  = $_SESSION["yyl_wechat_user"];
        if ($auth_user){
            return $auth_user;
        }
/*        $url = url('','',true,true).'?'.http_build_query($_GET);
        $wxOauth2 = $->getOAuthRedirectUrl($url);*/
        if (!isset($_GET['openid'])){
//            echo $wxOauth2;
            header('location: '.$aUrl);
            exit;
        }
        $openid = $_GET['openid'] ?? '';
//        $authUser = $this->weWork->getAuthUser($get_code);
        if ($openid){
//            $userid = $authUser['openid'] ;
            if (isset($_GET['userinfo'])){
                $_GET['userinfo'] = json_decode(base64_decode($_GET['userinfo']),true);
            }
            $_SESSION["yyl_wechat_user"] = $_GET;
            return $_GET;
        }
        throw new \Exception("授权异常,".json_encode($authUser,256));
    }
}
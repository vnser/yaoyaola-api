# yaoyaola-api
瑶瑶啦红包代发php接口包
# 直发用法例子
```php
use vring\yaoyaolaApi\{Config, SendRedPackOpenid, YylRequest};
Config::$apiKey = '商户apikey';
Config::$uid = '商户号';
$param = new SendRedPackOpenid();
$param->setOpenid("odTNwwexohxc4mbFf3e9djv3e7e0")
      ->setMoney(30)
      ->setOrderid(uniqid())
      ->setSendname("伊姿漾")
      ->setWishing("祝你万事大吉")
       ->setTitle("来自观看直播的红包");

$yreq = new YylRequest();
$res = $yreq->send($param);
/**
Array
(
    [ticket] => 193b0446dcc4538f2a7e318911cc4471
    [retmoney] => 30
    [retmsg] => 发放成功
)
 */
```
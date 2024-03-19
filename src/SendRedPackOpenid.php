<?php

namespace vring\yaoyaolaApi;

class SendRedPackOpenid implements ExapiParamInterface
{
    const APIPATH = ApiPath::SENDREDPACKTOOPENID;
    const APIMETHOD = 'get';
    static public $isSign = true;

    /**
     * 发送者openid
     * */
    public $openid = '';

    /**
     * 红包类型，0使用红包接口，1表示使用企业付款接口
     * @var int
     * */
    public $type = 0;

    /**
     * 红包金额，单位为分，不能低于30
     * @var int
     */
    public $money = 0;

    /**
     * 自定义订单编号
     * @var string
     */
    public $orderid  = '';

    /**
     * 校验实名，在类型为企业付款时有效，若指定了该参数，则与该实名不符的微信号无法接收红包
     * @var string
     */
    public $tousername = '';
    /**
     * 红包活动名称
     * @var string
     */
    public $title = '';

    /**
     * 发送方名称
     * @var string
     */
    public $sendname = '';

    /**
     * 红包祝福语
     * @var string
     */
    public $wishing = '';

    public function setOpenid(string $openid): SendRedPackOpenid
    {
        $this->openid = $openid;
        return $this;
    }

    public function setType(int $type): SendRedPackOpenid
    {
        $this->type = $type;
        return $this;
    }

    public function setMoney(int $money): SendRedPackOpenid
    {
        $this->money = $money;
        return $this;
    }

    public function setOrderid(string $orderid): SendRedPackOpenid
    {
        $this->orderid = $orderid;
        return $this;
    }

    public function setTousername(string $tousername): SendRedPackOpenid
    {
        $this->tousername = $tousername;
        return $this;
    }

    public function setTitle(string $title): SendRedPackOpenid
    {
        $this->title = $title;
        return $this;
    }

    public function setSendname(string $sendname): SendRedPackOpenid
    {
        $this->sendname = $sendname;
        return $this;
    }

    public function setWishing(string $wishing): SendRedPackOpenid
    {
        $this->wishing = $wishing;
        return $this;
    }
}
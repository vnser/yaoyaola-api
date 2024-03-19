<?php
/**
 * Author: vring
 * Date: 2024/3/19
 * Email: <971626354@qq.com>
 */

namespace vring\yaoyaolaApi;

class QueryRedPack implements ExapiParamInterface
{
    const APIPATH = ApiPath::QUERYREDPACK;
    const APIMETHOD = 'get';

    static public $isSign = false;

    /**
     * 红包ticket
     * @var string
     */
    public $ticket = '';

    /**
     * 红包orderid
     * @var string
     */
    public $orderid;

    public function setTicket(string $ticket): QueryRedPack
    {
        $this->ticket = $ticket;
        return $this;
    }

    public function setOrderid(string $orderid): QueryRedPack
    {
        $this->orderid = $orderid;
        return $this;
    }


}
<?php

namespace kjpos\TerpService;

use kjpos\TerpClient\Application;
use kjpos\TerpClient\Base\Exceptions\ClientError;
use kjpos\TerpClient\Order\Client as Order;

/**
 * 订单信息批量同步服务
 */
class OrderService
{
    /**
     * @var Order
     */
    private $orderClient;

    public function __construct(Application $app)
    {
        $this->orderClient = $app['order'];
    }

}

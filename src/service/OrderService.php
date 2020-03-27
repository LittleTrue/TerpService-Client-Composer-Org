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

    /**
     * 订单批量同步.
     *
     * @throws ClientError
     */
    public function batchPushOrder(array $infos) : array
    {
        if (empty($infos)) {
            throw new ClientError('参数缺失', 1000001);
        }

        //校验必须字段与数据

        return $this->orderClient->batchPushOrder($infos);
    }
}

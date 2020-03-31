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
     * 销售订单批量同步.
     *
     * @throws ClientError
     */
    public function batchPushOrder(array $infos)
    {
        if (empty($infos)) {
            throw new ClientError('参数缺失', 1000001);
        }

        //校验必须字段与数据, 数据结构
        if (!isset($infos['retail_bill']) || !is_array($infos['retail_bill'])) {
            throw new ClientError('数组参数缺失', 1000001);
        }

        $response =  $this->orderClient->batchPushOrder($infos);
        return $response['data'];
    }
}

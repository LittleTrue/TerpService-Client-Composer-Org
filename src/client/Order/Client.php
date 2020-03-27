<?php

namespace kjpos\TerpClient\Order;

use kjpos\TerpClient\Application;
use kjpos\TerpClient\Base\BaseClient;
use kjpos\TerpClient\Base\Exceptions\ClientError;

/**
 * 门店销售订单请求客户端.
 */
class Client extends BaseClient
{
    public function __construct(Application $app)
    {
        parent::__construct($app);
    }

    /**
     * 订单批量同步.
     *
     * @throws ClientError
     */
    public function batchPushOrder(array $infos)
    {
        $this->setParams($infos);

        return $this->httpPostJson('/api/cross_border/retailbill');
    }
}

<?php

namespace kjpos\TerpService;

use kjpos\TerpClient\Application;
use kjpos\TerpClient\Base\Exceptions\ClientError;
use kjpos\TerpClient\Purchase\Client as Purchase;

/**
 * 采购单同步请求服务
 */
class PurchaseService
{
    /**
     * @var Purchase
     */
    private $purchaseClient;

    public function __construct(Application $app)
    {
        $this->purchaseClient = $app['purchase'];
    }

    /**
     * 采购单批量同步.
     *
     * @throws ClientError
     * @throws \Exception
     */
    public function batchPushPurchase(array $infos)
    {
        if (empty($infos)) {
            throw new ClientError('参数缺失', 1000001);
        }

        //校验必须字段与数据
        $response =  $this->purchaseClient->batchPushPurchase($infos);

        return $response['data'];
    }
}

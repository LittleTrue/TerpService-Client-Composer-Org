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

}

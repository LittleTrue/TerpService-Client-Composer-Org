<?php

namespace kjpos\TerpService;

use kjpos\TerpClient\SaleReturn\Client as Returned;
use kjpos\TerpClient\Application;
use kjpos\TerpClient\Base\Exceptions\ClientError;

/**
 * 调拨单批量同步服务
 */
class SaleReturnService
{
    /**
     * @var Returned
     */
    private $returnClient;

    public function __construct(Application $app)
    {
        $this->returnClient = $app['sale_return'];
    }

    /**
     * 调拨单批量同步.
     *
     * @throws ClientError
     * @throws \Exception
     */
    public function batchPushSaleReturn(array $infos)
    {
        if (empty($infos)) {
            throw new ClientError('参数缺失', 1000001);
        }

        $response = $this->returnClient->batchPushSaleReturn($infos);

        return $response['data'];
    }
}

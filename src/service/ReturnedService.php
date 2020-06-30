<?php

namespace kjpos\TerpService;

use kjpos\TerpClient\Returned\Client as Returned;
use kjpos\TerpClient\Application;
use kjpos\TerpClient\Base\Exceptions\ClientError;

/**
 * 调拨单批量同步服务
 */
class ReturnedService
{
    /**
     * @var Returned
     */
    private $returnClient;

    public function __construct(Application $app)
    {
        $this->returnClient = $app['returned'];
    }

    /**
     * 调拨单批量同步.
     *
     * @throws ClientError
     * @throws \Exception
     */
    public function batchPushReturned(array $infos)
    {
        if (empty($infos)) {
            throw new ClientError('参数缺失', 1000001);
        }

        //校验必须字段与数据, 数据结构
        if (!isset($infos['returned_bill']) || !is_array($infos['returned_bill'])) {
            throw new ClientError('数组参数缺失', 1000001);
        }
        
        $response = $this->returnClient->batchPushReturned($infos);

        return $response['data'];
    }
}

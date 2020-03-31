<?php

namespace kjpos\TerpService;

use kjpos\TerpClient\Allocate\Client as Allocate;
use kjpos\TerpClient\Application;
use kjpos\TerpClient\Base\Exceptions\ClientError;

/**
 * 调拨单批量同步服务
 */
class AllocateService
{
    /**
     * @var Allocate
     */
    private $allocateClient;

    public function __construct(Application $app)
    {
        $this->allocateClient = $app['allocate'];
    }

    /**
     * 调拨单批量同步.
     *
     * @throws ClientError
     * @throws \Exception
     */
    public function batchPushAllocate(array $infos)
    {
        if (empty($infos)) {
            throw new ClientError('参数缺失', 1000001);
        }

        //校验必须字段与数据, 数据结构
        if (!isset($infos['delivery_bill']) || !is_array($infos['delivery_bill'])) {
            throw new ClientError('数组参数缺失', 1000001);
        }
        
        $response = $this->allocateClient->batchPushAllocate($infos);

        return $response['data'];
    }
}

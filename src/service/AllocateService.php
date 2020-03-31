<?php

namespace kjpos\TerpService;

use kjpos\TerpClient\Application;
use kjpos\TerpClient\Base\Exceptions\ClientError;
use kjpos\TerpClient\Allocate\Client as Allocate;

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
        
        //校验必须字段与数据
        $response = $this->allocateClient->batchPushAllocate($infos);
        
        return $response['data'];
    }
}

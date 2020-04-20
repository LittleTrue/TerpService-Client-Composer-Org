<?php

namespace kjpos\TerpService;

use kjpos\TerpClient\AllocateTime\Client as AllocateTime;
use kjpos\TerpClient\Application;
use kjpos\TerpClient\Base\Exceptions\ClientError;

/**
 * 调拨单批量同步服务
 */
class AllocateTimeService
{
    /**
     * @var AllocateTime
     */
    private $allocateClient;

    public function __construct(Application $app)
    {
        $this->allocateTimeClient = $app['allocate_time'];
    }

    /**
     * 调拨单批量同步.
     *
     * @throws ClientError
     * @throws \Exception
     */
    public function putAllocateTime(array $infos)
    {
        if (empty($infos)) {
            throw new ClientError('参数缺失', 1000001);
        }

        //校验必须字段与数据, 数据结构
        if (!isset($infos['notice_in_stock']) || !is_array($infos['notice_in_stock'])) {
            throw new ClientError('数组参数缺失', 1000001);
        }
        
        $response = $this->allocateTimeClient->putAllocateTime($infos);

        return $response['data'];
    }
}

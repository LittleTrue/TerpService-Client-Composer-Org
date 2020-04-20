<?php

namespace kjpos\TerpClient\AllocateTime;

use kjpos\TerpClient\Application;
use kjpos\TerpClient\Base\BaseClient;
use kjpos\TerpClient\Base\Exceptions\ClientError;

/**
 * 调拨单请求客户端.
 */
class Client extends BaseClient
{
    public function __construct(Application $app)
    {
        parent::__construct($app);
    }

    /**
     * 采购单批量同步.
     *
     * @throws ClientError
     */
    public function putAllocateTime(array $infos)
    {
        $this->setParams($infos);

        return $this->httpPostJson('/api/cross_border/noticeInStock');
    }
}

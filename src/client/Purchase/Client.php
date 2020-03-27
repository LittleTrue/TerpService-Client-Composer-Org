<?php

namespace kjpos\TerpClient\Purchase;

use kjpos\TerpClient\Application;
use kjpos\TerpClient\Base\BaseClient;
use kjpos\TerpClient\Base\Exceptions\ClientError;

/**
 * 采购单请求客户端.
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
    public function batchPushPurchase(array $infos)
    {
        $this->setParams($infos);

        return $this->httpPostJson('/api/cross_border/instockbill');
    }
}

<?php

namespace kjpos\TerpClient\Goods;

use kjpos\TerpClient\Application;
use kjpos\TerpClient\Base\BaseClient;
use kjpos\TerpClient\Base\Exceptions\ClientError;

/**
 * 商品请求客户端.
 */
class Client extends BaseClient
{
    public function __construct(Application $app)
    {
        parent::__construct($app);
    }

    /**
     * 商品信息批量同步.
     *
     * @throws ClientError
     */
    public function batchPushGoods(array $infos): array
    {
        $this->setParams($infos);

        return $this->httpPostJson('/api/cross_border/savenewgoods');
    }
}

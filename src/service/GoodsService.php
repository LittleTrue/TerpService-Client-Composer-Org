<?php

namespace kjpos\TerpService;

use kjpos\TerpClient\Application;
use kjpos\TerpClient\Base\Exceptions\ClientError;
use kjpos\TerpClient\Goods\Client as Goods;

/**
 * 商品接口请求服务
 */
class GoodsService
{
    /**
     * @var Goods
     */
    private $goodsClient;

    public function __construct(Application $app)
    {
        $this->goodsClient = $app['goods'];
    }

    /**
     * 商品信息批量同步.
     *
     * @throws ClientError
     * @throws \Exception
     */
    public function batchPushGoods(array $infos): array
    {
        if (empty($infos)) {
            throw new ClientError('参数缺失', 1000001);
        }

        return $this->goodsClient->batchPushGoods($infos);
    }
}

<?php

namespace kjpos\PosService;

use kjpos\TerpServiceClient\Application;
use kjpos\TerpServiceClient\Base\Exceptions\ClientError;
use kjpos\TerpServiceClient\Goods\Client as Goods;

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
    public function batchPushGoods(array $infos, array $config): array
    {
        if (empty($infos) || empty($config)) {
            throw new ClientError('参数缺失', 1000001);
        }

        return $this->goodsClient->batchPushGoods($infos, $config);
    }

    /**
     * 商品条码批量同步.
     *
     * @throws ClientError
     * @throws \Exception
     */
    public function batchPushBarcodes(array $infos, array $config): array
    {
        if (empty($infos) || empty($config)) {
            throw new ClientError('参数缺失', 1000001);
        }

        return $this->goodsClient->batchPushBarcodes($infos, $config);
    }

    /**
     * 商品条码批量删除同步.
     *
     * @throws ClientError
     * @throws \Exception
     */
    public function batchDeleteBarCode(array $infos, array $config): array
    {
        if (empty($infos) || empty($config)) {
            throw new ClientError('参数缺失', 1000001);
        }

        return $this->goodsClient->batchPushDeteleBarcodes($infos, $config);
    }
}

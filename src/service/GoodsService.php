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
    public function batchPushGoods(array $infos)
    {
        if (empty($infos)) {
            throw new ClientError('参数缺失', 1000001);
        }

        //校验必须字段与数据, 数据结构
        if (!isset($infos['goods']) || !is_array($infos['goods'])) {
            throw new ClientError('商品数组参数缺失', 1000001);
        }

        if (!isset($infos['user_info']) || !is_array($infos['user_info'])) {
            throw new ClientError('用户信息数组参数缺失', 1000001);
        }

        $response = $this->goodsClient->batchPushGoods($infos);
        return $response['data'];
    }

    /**
     * 商品采购价格的同步.
     *
     * @throws ClientError
     * @throws \Exception
     */
    public function batchGoodsPurchasePrice(array $infos)
    {
        if (empty($infos)) {
            throw new ClientError('参数缺失', 1000001);
        }

        //校验必须字段与数据, 数据结构
        if (!isset($infos['sale_price']) || !is_array($infos['sale_price'])) {
            throw new ClientError('商品数组参数缺失', 1000001);
        }

        $response = $this->goodsClient->batchGoodsPurchasePrice($infos);

        return true;
    }

    /**
     * 商品门店配送价格同步.
     *
     * @throws ClientError
     * @throws \Exception
     */
    public function batchGoodsDeliveryPrice(array $infos)
    {
        if (empty($infos)) {
            throw new ClientError('参数缺失', 1000001);
        }

        //校验必须字段与数据, 数据结构
        if (!isset($infos['purchase_price']) || !is_array($infos['purchase_price'])) {
            throw new ClientError('商品数组参数缺失', 1000001);
        }

        $response = $this->goodsClient->batchGoodsDeliveryPrice($infos);

        return true;
    }
}

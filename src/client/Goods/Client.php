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
    public function batchPushGoods(array $infos)
    {
        $this->setParams($infos);

        return $this->httpPostJson('/api/cross_border/savenewgoods');
    }

    /**
     * 商品采购价格的同步.
     *
     * @throws ClientError
     */
    public function batchGoodsPurchasePrice(array $infos)
    {
        $this->setParams($infos);

        return $this->httpPostJson('/api/cross_border/goodsPurchasePriceAdjust');
    }

    /**
     * 商品门店配送价格同步.
     *
     * @throws ClientError
     */
    public function batchGoodsDeliveryPrice(array $infos)
    {
        $this->setParams($infos);

        return $this->httpPostJson('/api/cross_border/goodsSalePriceAdjust');
    }


}

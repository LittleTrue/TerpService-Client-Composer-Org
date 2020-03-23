<?php

namespace kjpos\TerpServiceClient\Goods;

use kjpos\TerpServiceClient\Application;
use kjpos\TerpServiceClient\Base\BaseClient;
use kjpos\TerpServiceClient\Base\Exceptions\ClientError;

/**
 * 店铺请求客户端.
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
    public function batchPushGoods(array $infos, array $config): array
    {
        $this->setParams($infos);
        $this->app['config']->set('service_host', $config);  //更新配置

        $this->baseUri = $this->app['config']->get('service_host.bill_uri'); //设置接口host

        return $this->httpPostJson('sync/batchProduct');
    }

    /**
     * 商品条码批量同步.
     *
     * @throws ClientError
     */
    public function batchPushBarcodes(array $infos, array $config): array
    {
        $this->setParams($infos);
        $this->app['config']->set('service_host', $config); //更新配置

        $this->baseUri = $this->app['config']->get('service_host.bill_uri'); //设置接口host

        return $this->httpPostJson('sync/batchBarCode');
    }

    /**
     * 商品条码批量删除同步.
     *
     * @throws ClientError
     */
    public function batchPushDeteleBarcodes(array $infos, array $config): array
    {
        $this->setParams($infos);
        $this->app['config']->set('service_host', $config); //更新配置

        $this->baseUri = $this->app['config']->get('service_host.bill_uri'); //设置接口host
        return $this->httpDeleteJson('sync/batchBarCode');
    }
}

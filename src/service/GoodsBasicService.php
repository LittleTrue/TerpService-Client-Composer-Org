<?php

namespace kjpos\PosService;

use kjpos\TerpServiceClient\Application;
use kjpos\TerpServiceClient\Base\Exceptions\ClientError;
use kjpos\TerpServiceClient\GoodsBasic\Client as GoodsBasic;

class GoodsBasicService
{
    /**
     * @var GoodsBasic
     */
    private $goodsBasicClient;

    public function __construct(Application $app)
    {
        $this->goodsBasicClient = $app['goods_basic'];
    }

    /**
     * 同步分类信息.
     *
     * @throws ClientError
     */
    public function syncCategory(array $categoryInfos, array $serverConfig)
    {
        if (empty($categoryInfos) || empty($serverConfig)) {
            throw new ClientError('参数缺失', 1000001);
        }

        return $this->goodsBasicClient->syncCategory($categoryInfos, $serverConfig);
    }

    /**
     * 同步品牌信息.
     *
     * @param array $brandInfos 品牌信息
     *                          code string 品牌编码
     *                          name string 品牌名称
     *
     * @throws ClientError
     */
    public function syncBrand(array $brandInfos, array $serverConfig)
    {
        if (empty($brandInfos) || empty($serverConfig)) {
            throw new ClientError('参数缺失', 1000001);
        }

        return $this->goodsBasicClient->syncBrand($brandInfos, $serverConfig);
    }

    /**
     * 同步品牌信息.
     *
     * @param array $unitInfos 单位信息
     *                         code string 单位编码
     *                         name string 单位名称
     *
     * @throws \Exception
     */
    public function syncUnit(array $unitInfos, array $serverConfig)
    {
        if (empty($unitInfos) || empty($serverConfig)) {
            throw new ClientError('参数缺失', 1000001);
        }

        return $this->goodsBasicClient->syncUnit($unitInfos, $serverConfig);
    }
}

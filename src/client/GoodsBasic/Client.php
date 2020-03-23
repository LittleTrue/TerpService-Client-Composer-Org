<?php

namespace kjpos\TerpServiceClient\GoodsBasic;

use kjpos\TerpServiceClient\Application;
use kjpos\TerpServiceClient\Base\BaseClient;
use kjpos\TerpServiceClient\Base\Config;
use kjpos\TerpServiceClient\Base\Exceptions\ClientError;

/**
 * Class Client.
 */
class Client extends BaseClient
{
    /**
     * @var Config
     */
    private $serverConfig;

    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->serverConfig = $app['config'];
    }

    /**
     * @throws ClientError
     */
    public function syncCategory(array $cateGoryInfos = [], array $serverConfig = []): array
    {
        $this->serverConfig->set('service_host', $serverConfig);
        $this->setParams($cateGoryInfos);
        $this->setBaseUri($serverConfig['bill_uri']);

        return $this->httpPostJson('sync/batchCategory');
    }

    /**
     * @throws ClientError
     */
    public function syncBrand(array $brandInfos = [], array $serverConfig = []): array
    {
        $this->serverConfig->set('service_host', $serverConfig);
        $this->setParams($brandInfos);
        $this->setBaseUri($serverConfig['bill_uri']);

        return $this->httpPostJson('sync/batchBrand');
    }

    /**
     * @throws ClientError
     */
    public function syncUnit(array $syncUnitInfos = [], array $serverConfig = []): array
    {
        $this->serverConfig->set('service_host', $serverConfig);
        $this->setParams($syncUnitInfos);
        $this->setBaseUri($serverConfig['bill_uri']);

        return $this->httpPostJson('sync/batchUnit');
    }
}

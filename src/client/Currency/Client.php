<?php

namespace kjpos\TerpServiceClient\Currency;

use kjpos\TerpServiceClient\Application;
use kjpos\TerpServiceClient\Base\BaseClient;
use kjpos\TerpServiceClient\Base\Exceptions\ClientError;

/**
 * 货币请求客户端.
 */
class Client extends BaseClient
{
    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->baseUri = $this->app['config']->get('service_host.basics_uri');
    }

    /**
     * 获取币种列表.
     *
     * @throws ClientError
     */
    public function getCurrencyList(): array
    {
        return $this->httpGet('currency/getCurrencyList');
    }
}

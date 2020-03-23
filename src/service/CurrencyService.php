<?php

namespace kjpos\PosService;

use kjpos\TerpServiceClient\Application;
use kjpos\TerpServiceClient\Base\Exceptions\ClientError;
use kjpos\TerpServiceClient\Currency\Client;

/**
 * 货币服务
 */
class CurrencyService
{
    /**
     * @var Client
     */
    private $currencyClient;

    public function __construct(Application $app)
    {
        $this->currencyClient = $app['currency'];
    }

    /**
     * 获取币种.
     *
     * @throws ClientError
     */
    public function getCurrencyList(): array
    {
        return $this->currencyClient->getCurrencyList();
    }
}

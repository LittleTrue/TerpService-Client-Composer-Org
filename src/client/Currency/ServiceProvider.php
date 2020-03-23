<?php

namespace kjpos\TerpServiceClient\Currency;

use kjpos\TerpServiceClient\Goods\Client;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['currency'] = function ($app) {
            return new Client($app);
        };
    }
}

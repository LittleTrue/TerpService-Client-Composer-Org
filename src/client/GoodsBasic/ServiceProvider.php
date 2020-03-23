<?php

namespace kjpos\TerpServiceClient\GoodsBasic;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['goods_basic'] = function ($app) {
            return new Client($app);
        };
    }
}

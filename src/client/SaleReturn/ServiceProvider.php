<?php

namespace kjpos\TerpClient\SaleReturn;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 */
class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['sale_return'] = function ($app) {
            return new Client($app);
        };
    }
}

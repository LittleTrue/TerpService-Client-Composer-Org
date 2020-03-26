<?php

namespace kjpos\TerpClient\Purchase;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 */
class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['purchase'] = function ($app) {
            return new Client($app);
        };
    }
}

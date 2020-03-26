<?php

namespace kjpos\TerpClient\Allocate;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 */
class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['allocate'] = function ($app) {
            return new Client($app);
        };
    }
}

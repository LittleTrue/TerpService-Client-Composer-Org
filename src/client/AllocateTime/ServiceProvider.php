<?php

namespace kjpos\TerpClient\AllocateTime;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 */
class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['allocate_time'] = function ($app) {
            return new Client($app);
        };
    }
}

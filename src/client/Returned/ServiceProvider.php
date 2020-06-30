<?php

namespace kjpos\TerpClient\Returned;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 */
class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['returned'] = function ($app) {
            return new Client($app);
        };
    }
}

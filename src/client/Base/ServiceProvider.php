<?php

namespace kjpos\TerpClient\Base;

use GuzzleHttp\Client as GuzzleHttp;
use GuzzleHttp\RequestOptions;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Symfony\Component\Cache\Simple\RedisCache;

/**
 * Class ServiceProvider.
 */
class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['http_client'] = function ($app) {
            return new GuzzleHttp([
                RequestOptions::TIMEOUT => 60,
            ]);
        };

        $app['credential'] = function ($app) {
            return new Credential($app);
        };

        //token机制暂时持久化
        // $app['cache'] = function ($app) {
        //     return new RedisCache($app['config']['redis_client']);
        // };
    }
}

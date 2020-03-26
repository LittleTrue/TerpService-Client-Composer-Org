<?php

namespace kjpos\TerpClient\Base;

use GuzzleHttp\RequestOptions;
use kjpos\TerpClient\Application;
use kjpos\TerpClient\Base\Exceptions\ClientError;

/**
 * 身份验证.
 */
class Credential
{
    use MakesHttpRequests;

    /**
     * @var Application
     */
    protected $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Get token.
     *
     * @throws ClientError
     */
    public function token(): string
    {
        if ($value = $this->app['cache']->get($this->cacheKey())) {
            return $value;
        }

        $result = $this->request(
            'POST',
            $this->app['config']->get('basics_uri') . '/login/login',
            [
                RequestOptions::JSON    => $this->credentials(),
            ]
        );
        $this->setToken($token = $result['data']['token'], 7000);

        return $token;
    }

    /**
     * Set token.
     *
     * @param null $ttl
     */
    public function setToken(string $token, $ttl = null): Credential
    {
        $this->app['cache']->set($this->cacheKey(), $token, $ttl);

        return $this;
    }

    /**
     * Get credentials.
     */
    protected function credentials(): array
    {
        return [
            'username'  => $this->app['config']->get('user_name'),
            'passwd'    => $this->app['config']->get('passwd'),
        ];
    }

    /**
     * Get cachekey.
     */
    protected function cacheKey(): string
    {
        return 'terp-service-client:' . md5(json_encode($this->credentials()));
    }
}

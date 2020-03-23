<?php

namespace kjpos\TerpServiceClient\Base;

use GuzzleHttp\RequestOptions;
use kjpos\TerpServiceClient\Application;
use kjpos\TerpServiceClient\Base\Exceptions\ClientError;

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
            $this->app['config']->get('service_host.basics_uri') . 'login/login',
            [
                RequestOptions::JSON    => $this->credentials(),
                RequestOptions::HEADERS => ['Sign-Type'=> 1],
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
            'server_id' => $this->app['config']->get('service_host.id'),
            'username'  => $this->app['config']->get('service_host.user_name'),
            'passwd'    => $this->app['config']->get('service_host.passwd'),
        ];
    }

    /**
     * Get cachekey.
     */
    protected function cacheKey(): string
    {
        return 'TerpServiceClient.Token.' . md5(json_encode($this->credentials()));
    }
}

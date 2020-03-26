<?php

namespace kjpos\TerpClient\Base;

use GuzzleHttp\Psr7\Response;
use kjpos\TerpClient\Base\Exceptions\ClientError;

/**
 * Trait MakesHttpRequests.
 */
trait MakesHttpRequests
{
    /**
     * @var bool
     */
    protected $transform = true;

    /**
     * @var string
     */
    protected $baseUri = '';

    /**
     * @throws ClientError
     */
    public function request(string $method, string $uri, array $options = []): array
    {
        $uri = $this->app['config']->get('base_uri') . $uri;

        $response = $this->app['http_client']->request($method, $uri, $options);

        return $this->transform ? $this->transformResponse($response) : $response;
    }

    /**
     * @throws ClientError
     */
    protected function transformResponse(Response $response): array
    {
        $result = json_decode($response->getBody()->getContents(), true);

        switch ($result['code']) {
            /* 3002、3003 <==> 无效、过期 */
            case 3002:
            case 3003:
                /** @var Credential $credential */
                $credential = $this->app['credential'];
                $credential->setToken('');
                $credential->token();
                throw new ClientError($result['message'], $result['code']);
            case 200:

                return $result;
            default:
                throw new ClientError($result['message'], $result['code']);
        }
    }
}

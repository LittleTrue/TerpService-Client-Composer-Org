<?php

namespace kjpos\TerpServiceClient\Base;

use GuzzleHttp\RequestOptions;
use kjpos\TerpServiceClient\Application;
use kjpos\TerpServiceClient\Base\Exceptions\ClientError;

/**
 * 底层请求.
 */
class BaseClient
{
    use MakesHttpRequests;

    /**
     * @var Application
     */
    protected $app;

    /**
     * @var array
     */
    protected $json = [];

    /**
     * @var string
     */
    protected $language = 'zh-cn';

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Set baseUri params.
     *
     * @param string $baseUri 基础URI
     */
    public function setBaseUri(string $baseUri): void
    {
        $this->baseUri = $baseUri;
    }

    /**
     * Set json params.
     *
     * @param array $json Json参数
     */
    public function setParams(array $json): void
    {
        $this->json = $json;
    }

    /**
     * Set Headers Language params.
     *
     * @param string $language 请求头中的语种标识
     */
    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    /**
     * Make a post request.
     *
     * @throws ClientError
     */
    public function httpPostJson(string $uri): array
    {
        return $this->requestPost($uri, [RequestOptions::JSON => $this->json]);
    }

    /**
     * Make a delete request.
     *
     * @throws ClientError
     */
    public function httpDeleteJson(string $uri): array
    {
        return $this->requestDelete($uri, [RequestOptions::JSON => $this->json]);
    }

    /**
     * Make a Put request.
     */
    public function httpPutJson(string $uri): array
    {
        return $this->requestPut($uri, [RequestOptions::JSON=>$this->json]);
    }

    /**
     * Make a get request.
     *
     * @throws ClientError
     */
    public function httpGet(string $uri): array
    {
        return $this->request('GET', $uri, [
            RequestOptions::HEADERS=> [
                'Account-Token' => $this->app['credential']->token(),
            ],
        ]);
    }

    /**
     * @throws ClientError
     */
    protected function requestPost(string $uri, array $options = []): array
    {
        $options = $this->_headers($options);

        return $this->request('POST', $uri, $options);
    }

    /**
     * @throws ClientError
     */
    protected function requestDelete(string $uri, array $options = []): array
    {
        $options = $this->_headers($options);

        return $this->request('DELETE', $uri, $options);
    }

    /**
     * @throws ClientError
     */
    protected function requestPut(string $uri, array $options = []): array
    {
        $options = $this->_headers($options);

        return $this->request('PUT', $uri, $options);
    }

    /**
     * set Headers.
     *
     * @return array
     */
    private function _headers(array $options = [])
    {
        $options[RequestOptions::HEADERS] = [
            'Account-Token' => $this->app['credential']->token(),
            'Content-Type'  => 'application/json',
            'Language'      => $this->language,
            'Sign-Type'     => 1,
        ];
        return $options;
    }
}

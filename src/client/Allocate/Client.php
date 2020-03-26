<?php

namespace kjpos\TerpClient\Allocate;

use kjpos\TerpClient\Application;
use kjpos\TerpClient\Base\BaseClient;
use kjpos\TerpClient\Base\Exceptions\ClientError;

/**
 * 调拨单请求客户端.
 */
class Client extends BaseClient
{
    public function __construct(Application $app)
    {
        parent::__construct($app);
    }
}

<?php

namespace kjpos\TerpService;

use kjpos\TerpClient\Application;
use kjpos\TerpClient\Base\Exceptions\ClientError;
use kjpos\TerpClient\Allocate\Client as Allocate;

/**
 * 调拨单批量同步服务
 */
class AllocateService
{
    /**
     * @var Allocate
     */
    private $allocateClient;

    public function __construct(Application $app)
    {
        $this->allocateClient = $app['allocate'];
    }

}

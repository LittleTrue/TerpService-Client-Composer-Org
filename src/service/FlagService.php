<?php
namespace kjpos\PosService;

use kjpos\TerpServiceClient\Application;
use kjpos\TerpServiceClient\Base\Exceptions\ClientError;
use kjpos\TerpServiceClient\Flag\Client;

class FlagService
{
    /**
     * @var Client
     */
    private $flagClient;

    public function __construct(Application $app)
    {
        $this->flagClient = $app['flag'];
    }

    /**
     * 批量同步.
     *
     * @param array $flagInfo
     *                        code        string    唯一标识(如果数据存在就是修改)
     *                        flag        string    显示值
     *                        translates  array     翻译
     *                        []language  string    语言
     *                        []flag      string    显示值
     *                        type        int       (1:盘盈;2:盘亏)
     *                        deleted     int       (1:删除;0:未删除)
     * @param array $serverConfig 服务器配置信息
     *
     * @return array
     * @throws ClientError
     */
    public function batchSync(array $flagInfo, array $serverConfig): array
    {
        if (empty($flagInfo) || empty($serverConfig)) {
            throw new ClientError('参数缺失',1000001);
        }

        return $this->flagClient->batchSync($flagInfo, $serverConfig);
    }
}

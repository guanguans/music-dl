<?php
/**.-----------------------------------------------
 * |   Author: guanguans <yzmguanguan@gmail.com>
 * |   Date: 2019-05-24 17:31
 * '---------------------------------------------*/

namespace Guanguans\Tests;

use Guanguans\MusicPhp\MusicPhp;
use GuzzleHttp\ClientInterface;

class MusicPhpTest extends TestCase
{
    public function testGetHttpClient()
    {
        $musicPhp = new MusicPhp();
        // 断言返回结果为 GuzzleHttp\ClientInterface 实例
        $this->assertInstanceOf(ClientInterface::class, $musicPhp->getHttpClient());
    }

    public function testSetGuzzleOptions()
    {
        $musicPhp = new MusicPhp();
        // 设置参数前，timeout 为 null
        $this->assertNull($musicPhp->getHttpClient()->getConfig('timeout'));
        // 设置参数
        $musicPhp->setGuzzleOptions(['timeout' => 3000]);
        // 设置参数后，timeout 为 3000
        $this->assertSame(3000, $musicPhp->getHttpClient()->getConfig('timeout'));
    }
}

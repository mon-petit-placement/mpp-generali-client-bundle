<?php

namespace Mpp\GeneraliClientBundle\Tests\Unit\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\Fonds;

class GeneraliFundsClientTest extends GeneraliClientTest
{
    public function testGetData()
    {
        $result = self::$registry->getFunds()->getData('PREIMIUM', ['avenant']);

        $this->assertInstanceOf(ApiResponse::class, $result);
        $this->assertInstanceOf(Fonds::class, $result->getFonds());
    }
}

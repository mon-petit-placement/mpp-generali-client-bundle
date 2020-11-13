<?php

namespace Mpp\GeneraliClientBundle\Tests\Unit\Client;

class GeneraliScheduledFreePaymentSuspendClientTest extends GeneraliClientTest
{
    public function setUp()
    {
        $this->client = self::$registry->getScheduledFreePaymentSuspend();
    }

    public function testInit()
    {
        $data = $this->client->init();
    }
}

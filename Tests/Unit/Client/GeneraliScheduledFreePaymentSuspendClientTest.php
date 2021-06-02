<?php

namespace Mpp\GeneraliClientBundle\Tests\Unit\Client;

class GeneraliScheduledFreePaymentSuspendClientTest extends GeneraliClientTest
{
    private $client;

    public function setUp(): void
    {
        $this->client = self::$registry->getScheduledFreePaymentSuspend();
    }

    public function testInit()
    {
        $data = $this->client->init();
    }
}

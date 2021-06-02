<?php

namespace Mpp\GeneraliClientBundle\Tests\Unit\Client;

class GeneraliScheduledFreePaymentEditClientTest extends GeneraliClientTest
{
    private $client;

    public function setUp(): void
    {
        $this->client = self::$registry->getScheduledFreePaymentEdit();
    }

    public function testInit()
    {
        $data = $this->client->init();
    }

    public function testCheck()
    {
        $data = $this->client->check();
    }

    public function testConfirm()
    {
        $data = $this->client->confirm();
    }
}

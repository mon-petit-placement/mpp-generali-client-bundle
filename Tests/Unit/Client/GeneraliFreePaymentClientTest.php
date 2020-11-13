<?php

namespace Mpp\GeneraliClientBundle\Tests\Unit\Client;

class GeneraliFreePaymentClientTest extends GeneraliClientTest
{
    public function setUp()
    {
        $this->client = self::$registry->getFreePayment();
    }

    public function testGetData()
    {
        $data = $this->client->getData();
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

    public function testFinalize()
    {
        $data = $this->client->finalize();
    }
}

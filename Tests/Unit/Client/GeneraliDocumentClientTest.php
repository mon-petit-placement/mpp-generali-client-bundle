<?php

namespace Mpp\GeneraliClientBundle\Tests\Unit\Client;

class GeneraliArbitrationClientTest extends GeneraliClientTest
{
    public function setUp()
    {
        $this->client = self::$registry->getDocument();
    }

    public function testUploadDocument()
    {
        $data = $this->client->uploadDocument();
    }

    public function listArbitrationFiles()
    {
        return $this->client->listArbitrationFiles();
    }

    public function listSubscriptionFiles()
    {
        return $this->client->listSubscriptionFiles();
    }

    public function listFreePaymentFiles()
    {
        return $this->client->listFreePaymentFiles();
    }

    public function listScheduledFreePaymentFiles()
    {
        return $this->client->listScheduledFreePaymentFiles();
    }
}

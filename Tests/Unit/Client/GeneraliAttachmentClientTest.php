<?php

namespace Mpp\GeneraliClientBundle\Tests\Unit\Client;

class GeneraliAttachmentClientTest extends GeneraliClientTest
{
    private $client;

    public function setUp(): void
    {
        $this->client = self::$registry->getAttachment();
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

    public function listKycUpdateFiles()
    {
        return $this->client->listKycUpdateFiles();
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

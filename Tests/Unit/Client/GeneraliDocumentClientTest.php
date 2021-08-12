<?php

namespace Mpp\GeneraliClientBundle\Tests\Unit\Client;

class GeneraliDocumentClientTest extends GeneraliClientTest
{
    private $client;

    public function setUp(): void
    {
        $this->client = self::$registry->getDocument();
    }

    public function testGetAmendment()
    {
        return $this->client->getAmendment();
    }

    public function testGetDocument()
    {
        return $this->client->getDocument();
    }
}

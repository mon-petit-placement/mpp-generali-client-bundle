<?php

namespace Mpp\GeneraliClientBundle\Tests\Unit\Client;

use Mpp\GeneraliClientBundle\Model\ApiResponse;
use Mpp\GeneraliClientBundle\Model\Contrat;

class GeneraliContractClientTest extends GeneraliClientTest
{
    public function setUp(): void
    {
        $this->client = self::$registry->getContract();
    }

    public function testGetData()
    {
        $result = $this->client->getData();

        $this->assertInstanceOf(ApiResponse::class, $result);
        $this->assertInstanceOf(Contrat::class, $result->getContrat());
    }
}

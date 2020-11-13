<?php

namespace Mpp\GeneraliClientBundle\Tests\Unit\Client;

use Mpp\GeneraliClientBundle\Model\Referentiel;

class GeneraliClientRegistryTest extends GeneraliClientTest
{
    public function testGetReferential()
    {
        $referential = self::$referentialHandler->getReferential();

        $this->assertInstanceOf(Referentiel::class, $referential);
    }
}

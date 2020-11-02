<?php

namespace Mpp\GeneraliClientBundle\Tests\Unit\Client;

use Mpp\GeneraliClientBundle\Client\GeneraliClientRegistryInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

abstract class GeneraliClientTest extends KernelTestCase
{
    /**
     * @var GeneraliClientRegistryInterface
     */
    protected static $registry;

    public static function setUpBeforeClass()
    {
        self::bootKernel();

        self::$registry = self::$container->get(GeneraliClientRegistryInterface::class);
    }
}

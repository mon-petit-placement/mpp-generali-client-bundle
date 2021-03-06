<?php

namespace Mpp\GeneraliClientBundle\Tests\Unit\Client;

use Mpp\GeneraliClientBundle\Client\GeneraliClientRegistryInterface;
use Mpp\GeneraliClientBundle\Factory\ModelFactory;
use Mpp\GeneraliClientBundle\Handler\ReferentialHandler;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

abstract class GeneraliClientTest extends KernelTestCase
{
    /**
     * @var GeneraliClientRegistryInterface
     */
    protected static $registry;

    /**
     * @var ReferentialHandler
     */
    protected static $referentialHandler;

    /**
     * @var ModelFactory
     */
    protected static $factory;

    public static function setUpBeforeClass(): void
    {
        self::bootKernel();

        self::$registry = self::getContainer()->get(GeneraliClientRegistryInterface::class);
        self::$referentialHandler = self::getContainer()->get(ReferentialHandler::class);
        self::$factory = self::getContainer()->get(ModelFactory::class);
    }
}

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

    public static function setUpBeforeClass()
    {
        self::bootKernel();

        self::$registry = self::$container->get(GeneraliClientRegistryInterface::class);
        self::$referentialHandler = self::$container->get(ReferentialHandler::class);
        self::$factory = self::$container->get(ModelFactory::class);
    }
}

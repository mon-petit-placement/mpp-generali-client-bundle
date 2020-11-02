<?php

namespace Mpp\GeneraliClientBundle\Tests;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class TestKernel extends Kernel
{
    public function registerBundles()
    {
        return [
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Mpp\GeneraliClientBundle\MppGeneraliClientBundle(),
            new \EightPoints\Bundle\GuzzleBundle\EightPointsGuzzleBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/Resources/config.test.yaml');
    }
}

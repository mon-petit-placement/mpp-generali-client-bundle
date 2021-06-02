<?php

namespace Mpp\GeneraliClientBundle\Tests;

use EightPoints\Bundle\GuzzleBundle\EightPointsGuzzleBundle;
use Mpp\GeneraliClientBundle\MppGeneraliClientBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

class TestKernel extends Kernel
{
    public function registerBundles()
    {
        return [
            new FrameworkBundle(),
            new MppGeneraliClientBundle(),
            new EightPointsGuzzleBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/Resources/config.test.yaml');
    }
}

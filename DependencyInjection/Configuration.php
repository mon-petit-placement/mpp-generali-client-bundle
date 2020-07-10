<?php

declare(strict_types=1);

namespace MppGeneraliClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package MppGeneraliClientBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    const CONFIGURATION_ROOT = 'mpp_generali_client';

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(self::CONFIGURATION_ROOT);
        $treeBuilder->getRootNode();
    }
}
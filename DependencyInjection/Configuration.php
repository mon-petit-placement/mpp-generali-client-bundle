<?php

declare(strict_types=1);

namespace Mpp\GeneraliClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    const CONFIGURATION_ROOT = 'mpp_generali_client';

    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(self::CONFIGURATION_ROOT);

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('intermediary_code')->isRequired()->end()
                ->scalarNode('app_code')->isRequired()->end()
                ->scalarNode('subscription_code')->isRequired()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
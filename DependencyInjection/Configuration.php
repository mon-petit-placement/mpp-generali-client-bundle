<?php

declare(strict_types=1);

namespace Mpp\GeneraliClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration.
 */
class Configuration implements ConfigurationInterface
{
    const CONFIGURATION_ROOT = 'mpp_generali_client';

    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder(self::CONFIGURATION_ROOT);

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('http_client')->isRequired()->end()
                ->scalarNode('intermediary_code')->isRequired()->end()
                ->scalarNode('app_code')->isRequired()->end()
                ->scalarNode('subscription_code')->isRequired()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}

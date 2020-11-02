<?php

namespace Mpp\GeneraliClientBundle\DependencyInjection\Compiler;

use Mpp\GeneraliClientBundle\Client\GeneraliClientRegistry;
use Mpp\GeneraliClientBundle\DependencyInjection\Configuration;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class MppGeneraliClientCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        $config = $container->getParameter(Configuration::CONFIGURATION_ROOT);

        if (!$container->hasDefinition(GeneraliClientRegistry::class)) {
            return;
        }

        $registryDefinition = $container->getDefinition(GeneraliClientRegistry::class);
        $taggedServices = $container->findTaggedServiceIds(sprintf('%s.client', Configuration::CONFIGURATION_ROOT));
        foreach ($taggedServices as $class => $tags) {
            $container->getDefinition($class)->setArgument('$httpClient', $container->getDefinition($config['http_client']));

            foreach ($tags as $attributes) {
                $registryDefinition->addMethodCall(
                    'set',
                    [
                        $class::getClientAlias(),
                        new Reference($class),
                    ]
                );
            }
        }
    }
}

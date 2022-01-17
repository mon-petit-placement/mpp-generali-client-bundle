<?php

namespace Mpp\GeneraliClientBundle\DependencyInjection;

use Mpp\GeneraliClientBundle\Client\GeneraliClientInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class MppGeneraliClientExtension.
 */
class MppGeneraliClientExtension extends Extension
{
    /**
     * @param array            $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration($container->getParameter('kernel.debug'));
        $config = $this->processConfiguration($configuration, $configs);
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');

        $container
            ->registerForAutoconfiguration(GeneraliClientInterface::class)
            ->addTag(sprintf('%s.client', Configuration::CONFIGURATION_ROOT))
        ;

        $container->setParameter(Configuration::CONFIGURATION_ROOT, $config);
        $container->setParameter(
            sprintf('%s.app_code', Configuration::CONFIGURATION_ROOT),
            $config['app_code']
        );
        $container->setParameter(
            sprintf('%s.default_context', Configuration::CONFIGURATION_ROOT),
            $config['default_context']
        );
    }
}

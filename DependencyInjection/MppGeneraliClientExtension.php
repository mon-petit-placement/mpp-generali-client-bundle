<?php

declare(strict_types=1);

namespace Mpp\GeneraliClientBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class MppGeneraliClientExtension extends Extension
{
    /**
     * @param array $configs
     * @param ContainerBuilder $container
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration($container->getParameter('kernel.debug'));
        $config = $this->processConfiguration($configuration, $configs);
        //$loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        //$loader->load('services.yaml');

        $container->setParameter(
            sprintf('%s.intermediary_code', Configuration::CONFIGURATION_ROOT),
            $config['intermediary_code']
        );
        $container->setParameter(
            sprintf('%s.app_code', Configuration::CONFIGURATION_ROOT),
            $config['app_code']
        );
        $container->setParameter(
            sprintf('%s.subscription_code', Configuration::CONFIGURATION_ROOT),
            $config['subscription_code']
        );
    }
}

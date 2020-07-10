<?php

declare(strict_types=1);

namespace MppGeneraliClientBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class MppGeneraliClientBundle
 * @package MppGeneraliClientBundle\DependencyInjection
 */
class MppGeneraliClientBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
    }

    /**
     * @return MppGenraliClientExtension
     */
    public function getContainerExtension()
    {
        return new MppGenraliClientExtension();
    }
}
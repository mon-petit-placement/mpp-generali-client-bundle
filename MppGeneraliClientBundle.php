<?php

declare(strict_types=1);

namespace Mpp\GeneraliClientBundle;

use Mpp\GeneraliClientBundle\DependencyInjection\Compiler\MppGeneraliClientCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class MppGeneraliClientBundle.
 */
class MppGeneraliClientBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new MppGeneraliClientCompilerPass());
    }
}

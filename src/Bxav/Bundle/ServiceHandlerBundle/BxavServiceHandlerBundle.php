<?php

namespace Bxav\Bundle\ServiceHandlerBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;


use Symfony\Component\DependencyInjection\ContainerBuilder;
use Bxav\Bundle\ServiceHandlerBundle\DependencyInjection\CompilerPass\ServiceProviderCompilerPass;

class BxavServiceHandlerBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
    
        $container->addCompilerPass(new ServiceProviderCompilerPass());
    }
}

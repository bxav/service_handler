<?php
namespace Bxav\Bundle\ServiceHandlerBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class ServiceProviderCompilerPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container)
    {
        if (! $container->hasDefinition('bxav_service_handler.service_provider_chain')) {
            return;
        }
        
        $definition = $container->getDefinition('bxav_service_handler.service_provider_chain');
        $taggedServices = $container->findTaggedServiceIds('bxav_service_handler.service_provider');
        foreach ($taggedServices as $id => $tagAttributes) {
            foreach ($tagAttributes as $attributes) {
                $definition->addMethodCall('addServiceProvider', [
                    new Reference($id),
                    $attributes["type"]
                ]);
            }
        }
    }
}
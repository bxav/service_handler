<?php

namespace Bxav\Bundle\ServiceHandlerClientBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('bxav_service_handler_client');

        $rootNode
            ->children()

                ->arrayNode('service_handler')
                    ->children()
                        ->scalarNode('url')->end()
                    ->end()
                ->end()
                ->arrayNode('security')
                    ->children()
                        ->scalarNode('client_id')->end()
                        ->scalarNode('client_secret')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}

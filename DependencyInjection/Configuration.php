<?php

namespace Toffiak\URLShortenerBundle\DependencyInjection;

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
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('toffiak_url_shortener');
        $rootNode
            ->children()
                ->arrayNode('link')->isRequired()
                    ->children()
                        ->scalarNode('class')->isRequired()->end()
                        ->scalarNode('manager_class')->isRequired()->end()
                        ->scalarNode('form_type')->end()
                        ->scalarNode('form_name')->end()
                        ->scalarNode('success_url')->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }

}

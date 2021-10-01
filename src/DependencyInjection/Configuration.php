<?php

declare(strict_types=1);

namespace DH\ArtisBannerPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('digital_holding_artis_banner_plugin');
        $rootNode = $treeBuilder->getRootNode();

        $this->buildBundleApiConfigNode($rootNode);

        return $treeBuilder;
    }

    private function buildBundleApiConfigNode(ArrayNodeDefinition $rootNode): void
    {
        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->arrayNode('api')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('webp_support')
                            ->defaultFalse()
                            ->info('If true image in format webp will be generated and send by image factory')
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;
    }
}

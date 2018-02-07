<?php

/*
 * This file is part of the TLA Media SparkPostBundle.
 *
 * (c) TLA Media <kontakt@tlamedia.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Tla\SparkPostBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 */
final class Configuration implements ConfigurationInterface
{

    /**
     *
     * {@inheritdoc}
     *
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('tla_spark_post');
        
        $rootNode
            ->children()
                ->scalarNode('api_key')->defaultNull()->end()
            ->end()
        ;
        
        return $treeBuilder;
    }
}

<?php

namespace AchillesKal\SummarizerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('achilleskal_summarizer');
        $rootNode
            ->children()
                ->integerNode('character_limit')->defaultValue(100)->end()
            ->end()
        ;
        return $treeBuilder;
    }

}
<?php

namespace Ft6k\Bundle\WpDoctrineBundle\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * @author  Kyle Tucker <kyleatucker@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $builder = new TreeBuilder();
        $root = $builder->root('wp_doctrine');

        $root->children()
            ->scalarNode('table_prefix')
                ->defaultValue('wp_')
                ->info('WP table prefix (default: wp_)')
            ->end();

        return $builder;
    }
}

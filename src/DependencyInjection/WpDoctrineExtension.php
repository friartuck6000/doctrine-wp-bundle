<?php

namespace Ft6k\Bundle\WpDoctrineBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;


/**
 * @author  Kyle Tucker <kyleatucker@gmail.com>
 */
class WpDoctrineExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $processedConfig = $this->processConfiguration(new Config(), $configs);
        
        $container->setParameter('wp_prefix', $processedConfig['table_prefix']);
    }
}

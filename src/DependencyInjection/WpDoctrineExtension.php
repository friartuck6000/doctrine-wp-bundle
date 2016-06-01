<?php

namespace Ft6k\Bundle\WpDoctrineBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;


/**
 * @author  Kyle Tucker <kyleatucker@gmail.com>
 */
class WpDoctrineExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $processedConfig = $this->processConfiguration(new Configuration(), $configs);

        // Set container parameters
        $container->setParameter('wp_prefix', $processedConfig['table_prefix']);

        // Load service definitions
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ .'/../Resources/config'));
        $loader->load('doctrine.yml');
    }
}

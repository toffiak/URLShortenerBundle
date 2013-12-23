<?php

namespace Toffiak\URLShortenerBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class ToffiakURLShortenerExtension extends Extension
{

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');

        $container->setParameter('toffiak_urlshortener.link.manager_class', $config['link']['manager_class']);
        $container->setParameter('toffiak_urlshortener.link.class', $config['link']['class']);
        if (isset($config['link']['form_type'])) {
            $container->setParameter('toffiak_urlshortener.link.form_type', $config['link']['form_type']);
        }
        if (isset($config['link']['form_name'])) {
            $container->setParameter('toffiak_urlshortener.link.form_name', $config['link']['form_name']);
        }
        if (isset($config['link']['success_url'])) {
            $container->setParameter('toffiak_urlshortener.link.success_url', $config['event']['success_url']);
        }
    }

}

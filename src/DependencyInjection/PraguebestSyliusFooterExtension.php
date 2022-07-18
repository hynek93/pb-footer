<?php

declare(strict_types=1);

namespace Praguebest\SyliusFooterPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

final class PraguebestSyliusFooterExtension extends Extension
{
    /**
     * @psalm-suppress UnusedVariable
     */
    public function load(array $configs, ContainerBuilder $container): void
    {

    }

    public function getConfiguration(array $config, ContainerBuilder $container): ConfigurationInterface
    {
        return new Configuration();
    }
}

<?php

declare(strict_types=1);

namespace Praguebest\SyliusFooterPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * @psalm-suppress UnusedVariable
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('praguebest_sylius_footer_plugin');
        $rootNode = $treeBuilder->getRootNode();

        return $treeBuilder;
    }
}

<?php

declare(strict_types=1);

namespace Praguebest\SyliusFooterPlugin;

use Praguebest\SyliusFooterPlugin\DependencyInjection\Compiler\MediaProviderPass;
use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class PraguebestSyliusFooterPlugin extends Bundle
{
    use SyliusPluginTrait;

    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new MediaProviderPass());
    }
}

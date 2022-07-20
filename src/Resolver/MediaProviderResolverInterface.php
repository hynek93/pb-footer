<?php

declare(strict_types=1);

namespace Praguebest\SyliusFooterPlugin\Resolver;

use Praguebest\SyliusFooterPlugin\Entity\MediaInterface;
use Praguebest\SyliusFooterPlugin\MediaProvider\ProviderInterface;

interface MediaProviderResolverInterface
{
    public function resolveProvider(MediaInterface $media): ProviderInterface;
}

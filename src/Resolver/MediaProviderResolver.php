<?php

declare(strict_types=1);

namespace Praguebest\SyliusFooterPlugin\Resolver;

use Praguebest\SyliusFooterPlugin\Entity\MediaInterface;
use Praguebest\SyliusFooterPlugin\MediaProvider\ProviderInterface;
use Sylius\Component\Registry\ServiceRegistryInterface;
use Webmozart\Assert\Assert;

final class MediaProviderResolver implements MediaProviderResolverInterface
{
    /** @var ServiceRegistryInterface */
    private $providerRegistry;

    public function __construct(ServiceRegistryInterface $providerRegistry)
    {
        $this->providerRegistry = $providerRegistry;
    }

    public function resolveProvider(MediaInterface $media): ProviderInterface
    {
        Assert::notNull($media->getType());
        /** @var ProviderInterface $provider */
        $provider = $this->providerRegistry->get($media->getType());

        return $provider;
    }
}

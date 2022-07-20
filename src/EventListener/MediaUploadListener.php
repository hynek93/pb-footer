<?php

declare(strict_types=1);

namespace Praguebest\SyliusFooterPlugin\EventListener;

use Praguebest\SyliusFooterPlugin\Entity\MediaInterface;
use Praguebest\SyliusFooterPlugin\Resolver\MediaProviderResolverInterface;
use Sylius\Bundle\ResourceBundle\Event\ResourceControllerEvent;
use Webmozart\Assert\Assert;

final class MediaUploadListener
{
    /** @var MediaProviderResolverInterface */
    private $mediaProviderResolver;

    public function __construct(MediaProviderResolverInterface $mediaProviderResolver)
    {
        $this->mediaProviderResolver = $mediaProviderResolver;
    }

    public function uploadMedia(ResourceControllerEvent $event): void
    {
        /** @var MediaInterface|null $media */
        $media = $event->getSubject();

        Assert::isInstanceOf($media, MediaInterface::class);

        $this->mediaProviderResolver->resolveProvider($media)->upload($media);
    }
}

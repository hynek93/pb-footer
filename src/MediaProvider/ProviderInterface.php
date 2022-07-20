<?php

declare(strict_types=1);

namespace Praguebest\SyliusFooterPlugin\MediaProvider;

use Praguebest\SyliusFooterPlugin\Entity\MediaInterface;

interface ProviderInterface
{
    public function getTemplate(): string;

    public function render(
        MediaInterface $media,
        ?string $template = null,
        array $options = []
    ): string;

    public function upload(MediaInterface $media): void;
}

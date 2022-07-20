<?php

declare(strict_types=1);

namespace Praguebest\SyliusFooterPlugin\Uploader;

use Praguebest\SyliusFooterPlugin\Entity\MediaInterface;

interface MediaUploaderInterface
{
    public function upload(MediaInterface $media, string $pathPrefix): void;

    public function remove(string $path): bool;
}

<?php

declare(strict_types=1);

namespace Praguebest\SyliusFooterPlugin\Resolver;

use Praguebest\SyliusFooterPlugin\Entity\MediaInterface;

interface MediaResourceResolverInterface
{
    public function findOrLog(string $code): ?MediaInterface;
}

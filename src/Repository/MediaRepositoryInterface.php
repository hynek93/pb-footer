<?php

declare(strict_types=1);

namespace Praguebest\SyliusFooterPlugin\Repository;

use Doctrine\ORM\QueryBuilder;
use Praguebest\SyliusFooterPlugin\Entity\MediaInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

interface MediaRepositoryInterface extends RepositoryInterface
{
    public function createListQueryBuilder(string $locale): QueryBuilder;

    public function findOneEnabledByCode(
        string $code,
        string $localeCode,
        string $channelCode
    ): ?MediaInterface;

    public function findBySectionCode(
        string $sectionCode,
        string $localeCode,
        string $channelCode
    ): array;

    public function findByProductCode(
        string $productCode,
        string $localeCode,
        string $channelCode
    ): array;
}

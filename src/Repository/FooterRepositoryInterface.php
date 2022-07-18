<?php

declare(strict_types=1);

namespace Praguebest\SyliusFooterPlugin\Repository;

use Doctrine\ORM\QueryBuilder;
use Praguebest\SyliusFooterPlugin\Entity\FooterInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

interface FooterRepositoryInterface extends RepositoryInterface
{
    public function createListQueryBuilder(string $locale): QueryBuilder;
}

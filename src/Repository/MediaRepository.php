<?php

declare(strict_types=1);

namespace Praguebest\SyliusFooterPlugin\Repository;

use Doctrine\ORM\QueryBuilder;
use Praguebest\SyliusFooterPlugin\Entity\MediaInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class MediaRepository extends EntityRepository implements MediaRepositoryInterface
{
    public function createListQueryBuilder(string $locale): QueryBuilder
    {
        return $this->createQueryBuilder('o')
            ->leftJoin('o.translations', 'translation', 'WITH', 'translation.locale = :locale')
            ->setParameter('locale', $locale)
            ;
    }

    public function findOneEnabledByCode(
        string $code,
        string $localeCode,
        string $channelCode
    ): ?MediaInterface {
        return $this->createQueryBuilder('o')
            ->leftJoin('o.translations', 'translation')
            ->innerJoin('o.channels', 'channels')
            ->where('translation.locale = :localeCode')
            ->andWhere('o.code = :code')
            ->andWhere('o.enabled = true')
            ->andWhere('channels.code = :channelCode')
            ->setParameter('code', $code)
            ->setParameter('localeCode', $localeCode)
            ->setParameter('channelCode', $channelCode)
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

    public function findBySectionCode(
        string $sectionCode,
        string $localeCode,
        string $channelCode
    ): array {
        return $this->createQueryBuilder('o')
            ->leftJoin('o.translations', 'translation')
            ->innerJoin('o.sections', 'section')
            ->innerJoin('o.channels', 'channels')
            ->andWhere('translation.locale = :localeCode')
            ->andWhere('section.code = :sectionCode')
            ->andWhere('o.enabled = true')
            ->andWhere('channels.code = :channelCode')
            ->setParameter('localeCode', $localeCode)
            ->setParameter('sectionCode', $sectionCode)
            ->setParameter('channelCode', $channelCode)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findByProductCode(
        string $productCode,
        string $localeCode,
        string $channelCode
    ): array {
        return $this->createQueryBuilder('o')
            ->leftJoin('o.translations', 'translation')
            ->innerJoin('o.products', 'product')
            ->innerJoin('o.channels', 'channels')
            ->andWhere('translation.locale = :localeCode')
            ->andWhere('product.code = :productCode')
            ->andWhere('o.enabled = true')
            ->andWhere('channels.code = :channelCode')
            ->setParameter('localeCode', $localeCode)
            ->setParameter('productCode', $productCode)
            ->setParameter('channelCode', $channelCode)
            ->getQuery()
            ->getResult()
            ;
    }
}

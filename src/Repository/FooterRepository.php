<?php

namespace Praguebest\SyliusFooterPlugin\Repository;

use Doctrine\ORM\QueryBuilder;
use Praguebest\SyliusFooterPlugin\Entity\FooterBlockInterface;
use Praguebest\SyliusFooterPlugin\Entity\FooterInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Core\Model\TaxonInterface;
use Symfony\Component\HttpFoundation\Request;

class FooterRepository extends EntityRepository implements FooterRepositoryInterface
{
    public function createListQueryBuilder(string $locale): QueryBuilder
    {
        return $this->createQueryBuilder('o')
            ->addSelect('translation')
            ->leftJoin('o.translations', 'translation', 'WITH', 'translation.locale = :locale')
            ->setParameter('locale', $locale);
    }

    public function findOneByTaxon(?string $taxon = null, ?string $locale = null): ?FooterInterface
    {
        $footerQuery = $this->createQueryBuilder('o')
            ->addSelect('translation')
            ->addSelect('footerBlocks')
            ->leftJoin('o.footerBlocks', 'footerBlocks');

        if ($locale) {
            $footerQuery
                ->leftJoin('o.translations', 'translation', 'WITH', 'translation.locale = :locale')
                ->setParameter('locale', $locale);
        }

        if ($taxon) {
            $footerQuery
                ->leftJoin('o.taxons', 'taxon')
                ->where('taxon.id = :taxon OR o.isDefault = 1')
                ->setParameter('taxon', $taxon)
                ->addOrderBy('taxon.id', 'DESC');
        }

        $footer = $footerQuery
            ->addOrderBy('o.isDefault', 'DESC')
            ->getQuery()
            ->getResult();

        return $footer ? reset($footer) : null;
    }
}
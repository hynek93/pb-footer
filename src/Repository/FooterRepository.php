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

    public function findOneByTaxon(?int $taxon = null, ?string $locale = null): ?FooterInterface
    {
        $taxon = 2;
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
                ->where('taxon.id = :taxon')
                ->setParameter('taxon', $taxon);
        }

        $footer = $footerQuery
            ->orderBy('-taxon.id', 'DESC')
            ->orderBy('o.isDefault', 'DESC')
            ->getQuery()
            ->getResult();

        return $footer ? reset($footer) : null;
    }
}
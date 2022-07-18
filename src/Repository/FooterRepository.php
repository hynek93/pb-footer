<?php

namespace Praguebest\SyliusFooterPlugin\Repository;

use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class FooterRepository extends EntityRepository implements FooterRepositoryInterface
{
    public function createListQueryBuilder(string $locale): QueryBuilder
    {
        return $this->createQueryBuilder('o')
            ->addSelect('translation')
            ->leftJoin('o.translations', 'translation', 'WITH', 'translation.locale = :locale')
            ->setParameter('locale', $locale);
    }
}
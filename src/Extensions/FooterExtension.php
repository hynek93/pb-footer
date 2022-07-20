<?php

namespace Praguebest\SyliusFooterPlugin\Extensions;

use Sylius\Component\Taxonomy\Model\TaxonInterface;
use Sylius\Component\Taxonomy\Repository\TaxonRepositoryInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class FooterExtension extends AbstractExtension
{
    protected TaxonRepositoryInterface $taxonRepository;

    public function __construct(TaxonRepositoryInterface $taxonRepository)
    {
        $this->taxonRepository = $taxonRepository;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('get_taxon_by_slug', [$this, 'getTaxonBySlug']),
        ];
    }

    public function getTaxonBySlug(?string $slug, ?string $locale)
    {
        if ($slug) {
            /** @var ?TaxonInterface $taxon */
            $taxon = $this->taxonRepository->findOneBySlug($slug, $locale);

            return $taxon ? $taxon->getId() : null;
        }

        return null;
    }
}
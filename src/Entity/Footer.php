<?php

namespace Praguebest\SyliusFooterPlugin\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Core\Model\TaxonInterface;
use Sylius\Component\Resource\Model\TimestampableTrait;
use Sylius\Component\Resource\Model\ToggleableTrait;
use Sylius\Component\Resource\Model\TranslatableTrait;

class Footer implements FooterInterface
{
    use ToggleableTrait;

    use TimestampableTrait;

    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
        getTranslation as private doGetTranslation;
    }

    protected int $id;

    protected bool $isDefault = false;

    protected bool $hasSocials = false;

    protected bool $hasNewsletter = false;

    protected bool $hasCopyright = false;

    /** @var Collection|TaxonInterface[]  */
    protected $taxons;

    /** @var Collection|FooterBlockInterface[]  */
    protected $footerBlocks;

    public function __construct()
    {
        $this->initializeTranslationsCollection();
        $this->taxons = new ArrayCollection();
        $this->footerBlocks = new ArrayCollection();

        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getIsDefault(): bool
    {
        return $this->isDefault;
    }

    public function setIsDefault(bool $isDefault): void
    {
        $this->isDefault = $isDefault;
    }

    public function getHasSocials(): bool
    {
        return $this->hasSocials;
    }

    public function setHasSocials(bool $hasSocials): void
    {
        $this->hasSocials = $hasSocials;
    }

    public function getHasNewsletter(): bool
    {
        return $this->hasNewsletter;
    }

    public function setHasNewsletter(bool $hasNewsletter): void
    {
        $this->hasNewsletter = $hasNewsletter;
    }

    public function getHasCopyright(): bool
    {
        return $this->hasCopyright;
    }

    public function setHasCopyright(bool $hasCopyright): void
    {
        $this->hasCopyright = $hasCopyright;
    }

    public function getName(): ?string
    {
        $footerTranslation = $this->getFooterTranslation();

        return $footerTranslation->getName();
    }

    public function setName(?string $name): void
    {
        $footerTranslation = $this->getFooterTranslation();
        $footerTranslation->setName($name);
    }

    public function getCopyright(): ?string
    {
        $footerTranslation = $this->getFooterTranslation();

        return $footerTranslation->getCopyright();
    }

    public function setCopyright(?string $copyright): void
    {
        $footerTranslation = $this->getFooterTranslation();
        $footerTranslation->setCopyright($copyright);
    }

    public function getTaxons(): Collection
    {
        return $this->taxons;
    }

    public function hasTaxon(TaxonInterface $taxon): bool
    {
        return $this->taxons->contains($taxon);
    }

    public function addTaxon(TaxonInterface $taxon): void
    {
        if (false === $this->hasTaxon($taxon)) {
            $this->taxons->add($taxon);
        }
    }

    public function removeTaxon(TaxonInterface $taxon): void
    {
        if (true === $this->hasTaxon($taxon)) {
            $this->taxons->removeElement($taxon);
        }
    }

    public function getFooterBlocks(): Collection
    {
        return $this->footerBlocks;
    }

    public function hasFooterBlock(FooterBlockInterface $footerBlock): bool
    {
        return $this->footerBlocks->contains($footerBlock);
    }

    public function addFooterBlock(FooterBlockInterface $footerBlock): void
    {
        if (false === $this->hasFooterBlock($footerBlock)) {
            $this->footerBlocks->add($footerBlock);
        }
    }

    public function removeFooterBlock(FooterBlockInterface $footerBlock): void
    {
        if (true === $this->hasFooterBlock($footerBlock)) {
            $this->footerBlocks->removeElement($footerBlock);
        }
    }

    protected function getFooterTranslation(): FooterTranslationInterface
    {
        /** @var FooterTranslationInterface $translation */
        $translation = $this->getTranslation();
        return $translation;
    }

    protected function createTranslation(): FooterTranslationInterface
    {
        return new FooterTranslation();
    }
}
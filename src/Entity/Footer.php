<?php

namespace Praguebest\SyliusFooterPlugin\Entity;

use Sylius\Component\Resource\Model\TimestampableTrait;
use Sylius\Component\Resource\Model\ToggleableTrait;
use Sylius\Component\Resource\Model\TranslatableTrait;
use Sylius\Component\Resource\Model\TranslationInterface;

class Footer implements FooterInterface
{
    use ToggleableTrait;

    use TimestampableTrait;

    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
        getTranslation as private doGetTranslation;
    }


    protected int $id;

    protected bool $hasNewsletter = false;

    protected bool $hasCopyright = false;

    public function __construct()
    {
        $this->initializeTranslationsCollection();

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
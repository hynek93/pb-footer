<?php

namespace Praguebest\SyliusFooterPlugin\Entity;

use Sylius\Component\Resource\Model\TimestampableTrait;
use Sylius\Component\Resource\Model\ToggleableTrait;
use Sylius\Component\Resource\Model\TranslatableTrait;

class FooterBlock implements FooterBlockInterface
{
    use ToggleableTrait;

    use TimestampableTrait;

    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
        getTranslation as private doGetTranslation;
    }

    protected int $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        $translation = $this->getFooterBlockTranslation();

        return $translation->getName();
    }

    public function setName(?string $name): void
    {
        $translation = $this->getFooterBlockTranslation();
        $translation->setName($name);
    }

    public function getContent(): ?string
    {
        $translation = $this->getFooterBlockTranslation();

        return $translation->getContent();
    }

    public function setContent(?string $content): void
    {
        $translation = $this->getFooterBlockTranslation();
        $translation->setContent($content);
    }

    protected function getFooterBlockTranslation(): FooterBlockTranslationInterface
    {
        /** @var FooterBlockTranslationInterface $translation */
        $translation = $this->getTranslation();
        return $translation;
    }

    protected function createTranslation(): FooterBlockTranslationInterface
    {
        return new FooterBlockTranslation();
    }
}
<?php

namespace Praguebest\SyliusFooterPlugin\Entity;

use Sylius\Component\Resource\Model\AbstractTranslation;

class FooterTranslation extends AbstractTranslation implements FooterTranslationInterface
{
    protected int $id;

    protected ?string $name;

    protected ?string $copyright;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getCopyright(): ?string
    {
        return $this->copyright;
    }

    public function setCopyright(?string $copyright): void
    {
        $this->copyright = $copyright;
    }
}
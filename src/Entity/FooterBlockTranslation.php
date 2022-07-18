<?php

namespace Praguebest\SyliusFooterPlugin\Entity;

use Sylius\Component\Resource\Model\AbstractTranslation;

class FooterBlockTranslation extends AbstractTranslation implements FooterBlockTranslationInterface
{
    protected int $id;

    protected ?string $name;

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
}
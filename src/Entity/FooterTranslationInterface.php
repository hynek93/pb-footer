<?php

namespace Praguebest\SyliusFooterPlugin\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslationInterface;

interface FooterTranslationInterface extends ResourceInterface, TranslationInterface
{
    public function getName(): ?string;

    public function setName(?string $name): void;

    public function getCopyright(): ?string;

    public function setCopyright(?string $copyright): void;
}
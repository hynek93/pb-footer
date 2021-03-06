<?php

declare(strict_types=1);

namespace Praguebest\SyliusFooterPlugin\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslationInterface;

interface MediaTranslationInterface extends ResourceInterface, TranslationInterface
{
    public function getName(): ?string;

    public function setName(?string $name): void;

    public function getContent(): ?string;

    public function setContent(?string $content): void;

    public function getAlt(): ?string;

    public function setAlt(?string $alt): void;

    public function getLink(): ?string;

    public function setLink(?string $link): void;
}

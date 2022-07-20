<?php

namespace Praguebest\SyliusFooterPlugin\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TimestampableInterface;
use Sylius\Component\Resource\Model\ToggleableInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;

interface FooterInterface extends
    ResourceInterface,
    TranslatableInterface,
    ToggleableInterface,
    TimestampableInterface
{
    public function getIsDefault(): bool;

    public function setIsDefault(bool $isDefault): void;

    public function getHasSocials(): bool;

    public function setHasSocials(bool $hasSocials): void;

    public function getHasCopyright(): bool;

    public function setHasCopyright(bool $hasCopyright): void;

    public function getHasNewsletter(): bool;

    public function setHasNewsletter(bool $hasNewsletter): void;

    public function getName(): ?string;

    public function setName(?string $name): void;

    public function getCopyright(): ?string;

    public function setCopyright(?string $copyright): void;

}
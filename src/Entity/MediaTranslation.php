<?php

declare(strict_types=1);

namespace Praguebest\SyliusFooterPlugin\Entity;

use Sylius\Component\Resource\Model\AbstractTranslation;

class MediaTranslation extends AbstractTranslation implements MediaTranslationInterface
{
    /** @var int */
    protected $id;

    /** @var string|null */
    protected $name;

    /** @var string|null */
    protected $content;

    /** @var string|null */
    protected $alt;

    /** @var string|null */
    protected $link;

    public function getId(): ?int
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(?string $alt): void
    {
        $this->alt = $alt;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): void
    {
        $this->link = $link;
    }
}

<?php

declare(strict_types=1);

namespace DH\ArtisBannerPlugin\Entity;

use Odiseo\SyliusBannerPlugin\Entity\BannerInterface as BaseBannerInterface;
use Sylius\Component\Resource\Model\ArchivableInterface;
use Symfony\Component\HttpFoundation\File\File;

interface BannerInterface extends BaseBannerInterface, ArchivableInterface
{
    public function getStartsAt(): ?\DateTimeInterface;

    public function setStartsAt(?\DateTimeInterface $startsAt): void;

    public function getEndsAt(): ?\DateTimeInterface;

    public function setEndsAt(?\DateTimeInterface $endsAt): void;

    public function setBackgroundImageFile(?File $file): void;

    public function getBackgroundImageFile(): ?File;

    public function setBackgroundImageName(?string $backgroundImageName): void;

    public function getBackgroundImageName(): ?string;
}

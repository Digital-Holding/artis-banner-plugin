<?php

declare(strict_types=1);

namespace DH\ArtisBannerPlugin\Entity;

use Odiseo\SyliusBannerPlugin\Entity\BannerTranslationInterface as BaseBannerTranslationInterface;
use Symfony\Component\HttpFoundation\File\File;

interface BannerTranslationInterface extends BaseBannerTranslationInterface
{
    public function getBackgroundImageFile(): ?File;

    public function setBackgroundImageFile(?File $file): void;

    public function getBackgroundImageName(): ?string;

    public function setBackgroundImageName(?string $backgroundImageName): void;

    public function getTitle(): ?string;

    public function setTitle(?string $title): void;
}

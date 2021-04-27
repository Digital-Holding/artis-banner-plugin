<?php

declare(strict_types=1);

namespace DH\ArtisBannerPlugin\Entity;

use Odiseo\SyliusBannerPlugin\Entity\BannerTranslation as BaseBannerTranslation;
use Symfony\Component\HttpFoundation\File\File;

class BannerTranslation extends BaseBannerTranslation implements BannerTranslationInterface
{
    /** @var File|null */
    private $backgroundImageFile;

    /** @var string|null */
    private $backgroundImageName;

    /** @var string|null */
    protected $title;

    /**
     * {@inheritdoc}
     */
    public function getBackgroundImageFile(): ?File
    {
        return $this->backgroundImageFile;
    }

    /**
     * {@inheritdoc}
     */
    public function setBackgroundImageFile(?File $file): void
    {
        $this->backgroundImageFile = $file;

        $this->setUpdatedAt(new \DateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function getBackgroundImageName(): ?string
    {
        return $this->backgroundImageName;
    }

    /**
     * {@inheritdoc}
     */
    public function setBackgroundImageName(?string $backgroundImageName): void
    {
        $this->backgroundImageName = $backgroundImageName;
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }
}

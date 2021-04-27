<?php

declare(strict_types=1);

namespace DH\ArtisBannerPlugin\Entity;

use Odiseo\SyliusBannerPlugin\Entity\Banner as BaseBanner;
use Sylius\Component\Resource\Model\ArchivableTrait;
use Symfony\Component\HttpFoundation\File\File;

class Banner extends BaseBanner implements BannerInterface
{
    use ArchivableTrait;

    /** @var \DateTimeInterface */
    protected $startsAt;

    /** @var \DateTimeInterface */
    protected $endsAt;

    /**
     * {@inheritdoc}
     */
    public function getStartsAt(): ?\DateTimeInterface
    {
        return $this->startsAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setStartsAt(?\DateTimeInterface $startsAt): void
    {
        $this->startsAt = $startsAt;
    }

    /**
     * {@inheritdoc}
     */
    public function getEndsAt(): ?\DateTimeInterface
    {
        return $this->endsAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setEndsAt(?\DateTimeInterface $endsAt): void
    {
        $this->endsAt = $endsAt;
    }

    /**
     * {@inheritdoc}
     */
    public function setBackgroundImageFile(?File $file): void
    {
        /** @var BannerTranslationInterface $bannerTranslation */
        $bannerTranslation = $this->getTranslation();

        $bannerTranslation->setBackgroundImageFile($file);
    }

    /**
     * {@inheritdoc}
     */
    public function getBackgroundImageFile(): ?File
    {
        /** @var BannerTranslationInterface $bannerTranslation */
        $bannerTranslation = $this->getTranslation();

        return $bannerTranslation->getBackgroundImageFile();
    }

    /**
     * {@inheritdoc}
     */
    public function setBackgroundImageName(?string $backgroundImageName): void
    {
        /** @var BannerTranslationInterface $bannerTranslation */
        $bannerTranslation = $this->getTranslation();

        $bannerTranslation->setBackgroundImageName($backgroundImageName);
    }

    /**
     * {@inheritdoc}
     */
    public function getBackgroundImageName(): ?string
    {
        /** @var BannerTranslationInterface $bannerTranslation */
        $bannerTranslation = $this->getTranslation();

        return $bannerTranslation->getBackgroundImageName();
    }
}

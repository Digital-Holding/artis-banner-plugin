<?php

declare(strict_types=1);

namespace DH\ArtisBannerPlugin\ShopApi\Factory;

use DH\ArtisBannerPlugin\Entity\BannerTranslationInterface;
use DH\ArtisBannerPlugin\ShopApi\View\BannerView;
use Liip\ImagineBundle\Service\FilterService;
use DH\ArtisBannerPlugin\Entity\BannerInterface;

class BannerViewFactory implements BannerViewFactoryInterface
{
    /** @var FilterService */
    private $filterService;

    /** @var string */
    private $imagefilter;

    /** @var string */
    private $mobileImagefilter;

    /** @var string */
    private $backgroundImagefilter;

    /** @var bool */
    private $webpSupport;

    public function __construct(
        FilterService $filterService,
        string $imagefilter,
        string $mobileImagefilter,
        string $backgroundImagefilter,
        bool $webpSupport
    )
    {
        $this->filterService = $filterService;
        $this->imagefilter = $imagefilter;
        $this->mobileImagefilter = $mobileImagefilter;
        $this->backgroundImagefilter = $backgroundImagefilter;
        $this->webpSupport = $webpSupport;
    }

    public function create(BannerInterface $banner, string $locale)
    {
        /** @var BannerView $bannerView */
        $bannerView = new BannerView();

        /** @var BannerTranslationInterface $translation */
        $translation = $banner->getTranslation($locale);

        $bannerView->title = $translation->getTitle();
        $bannerView->description = $translation->getMainText();
        $bannerView->shortDescription = $translation->getSecondaryText();
        $bannerView->url = $banner->getUrl();

        $bannerView->imagePath = null !== $banner->getBackgroundImageName() ?
            $this->filterService->getUrlOfFilteredImage($banner->getBackgroundImageName(), $this->backgroundImagefilter, null, $this->webpSupport) : null;
        $bannerView->backgroundImagePath = $this->filterService->getUrlOfFilteredImage($banner->getImageName(), $this->imagefilter, null, $this->webpSupport);
        $bannerView->mobileImagePath = null !== $banner->getMobileImageName() ?
            $this->filterService->getUrlOfFilteredImage($banner->getMobileImageName(), $this->mobileImagefilter, null, $this->webpSupport) : null;

        foreach ($banner->getTaxons() as $taxon) {
            $bannerView->taxonomyCodes [] = $taxon->getCode();
        }

        return $bannerView;
    }
}

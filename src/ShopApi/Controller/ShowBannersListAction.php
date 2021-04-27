<?php

namespace DH\ArtisBannerPlugin\ShopApi\Controller;

use DH\ArtisBannerPlugin\Repository\BannerRepositoryInterface;
use DH\ArtisBannerPlugin\ShopApi\Factory\BannerViewFactoryInterface;
use DH\ArtisBannerPlugin\ShopApi\View\BannerView;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\RestBundle\View\View;
use FOS\RestBundle\View\ViewHandlerInterface;
use DH\ArtisBannerPlugin\Entity\BannerInterface;
use Sylius\ShopApiPlugin\Http\RequestBasedLocaleProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ShowBannersListAction
{
    /** @var RequestBasedLocaleProviderInterface */
    private $requestBasedLocaleProvider;

    /** @var ViewHandlerInterface */
    private $viewHandler;

    /** @var BannerRepositoryInterface */
    private $bannerRepository;

    /** @var BannerViewFactoryInterface */
    private $bannerViewFactory;

    public function __construct(
        RequestBasedLocaleProviderInterface $requestBasedLocaleProvider,
        ViewHandlerInterface $viewHandler,
        BannerRepositoryInterface $bannerRepository,
        BannerViewFactoryInterface $bannerViewFactory
    )
    {
        $this->requestBasedLocaleProvider = $requestBasedLocaleProvider;
        $this->viewHandler = $viewHandler;
        $this->bannerRepository = $bannerRepository;
        $this->bannerViewFactory = $bannerViewFactory;
    }

    public function __invoke(Request $request)
    {
        $localeCode = $this->requestBasedLocaleProvider->getLocaleCode($request);

        /** @var ArrayCollection|BannerInterface[] $banners */
        $banners = $this->bannerRepository->findActive();

        $bannerView = [];

        /** @var BannerInterface $view */
        foreach ($banners as $view) {
            $bannerView [] = $this->buildSectionList($view, $localeCode);
        }

        return $this->viewHandler->handle(View::create($bannerView, Response::HTTP_OK));
    }

    private function buildSectionList(BannerInterface $banner, string $localeCode): BannerView
    {
        $bannerView = $this->bannerViewFactory->create($banner, $localeCode);

        return $bannerView;
    }
}

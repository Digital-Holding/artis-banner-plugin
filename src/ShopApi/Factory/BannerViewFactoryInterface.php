<?php

declare(strict_types=1);

namespace DH\ArtisBannerPlugin\ShopApi\Factory;

use DH\ArtisBannerPlugin\Entity\BannerInterface;

interface BannerViewFactoryInterface
{
    public function create(BannerInterface $banner, string $locale);
}

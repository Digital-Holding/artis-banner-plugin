<?php

declare(strict_types=1);

namespace DH\ArtisBannerPlugin\Repository;

use Odiseo\SyliusBannerPlugin\Repository\BannerRepositoryInterface as BaseBannerRepositoryInterface;

interface BannerRepositoryInterface extends BaseBannerRepositoryInterface
{
    public function findActive(): array;
}

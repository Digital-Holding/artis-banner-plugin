<?php

declare(strict_types=1);

namespace DH\ArtisBannerPlugin\Repository;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\QueryBuilder;
use Odiseo\SyliusBannerPlugin\Repository\BannerRepository as BaseBannerRepository;

class BannerRepository extends BaseBannerRepository implements BannerRepositoryInterface
{
    public function findActive(): array
    {
        return $this->filterByActive($this->createQueryBuilder('o'))
            ->getQuery()
            ->getResult();
    }

    protected function filterByActive(QueryBuilder $queryBuilder, ?DateTimeInterface $date = null): QueryBuilder
    {
        return $queryBuilder
            ->andWhere('o.startsAt IS NULL OR o.startsAt < :date')
            ->andWhere('o.endsAt IS NULL OR o.endsAt > :date')
            ->andWhere('o.archivedAt IS NULL')
            ->andWhere('o.enabled = true')
            ->setParameter('date', $date ?: new DateTime());
    }
}

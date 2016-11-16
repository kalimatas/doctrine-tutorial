<?php

use Doctrine\ORM\EntityRepository;

/**
 * @see City
 */
class CityRepository extends EntityRepository
{
    /**
     * @param $cityName
     *
     * @return City|null
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function byName($cityName)
    {
        return $this->createQueryBuilder('c')
            ->where('c.name = :name')
            ->setParameter('name', $cityName)
            ->getQuery()
            ->setCacheable(true) // second-level cache
            ->getOneOrNullResult();
    }
}

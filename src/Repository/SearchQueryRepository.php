<?php

namespace App\Repository;

use App\Entity\SearchQuery;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SearchQuery|null find($id, $lockMode = null, $lockVersion = null)
 * @method SearchQuery|null findOneBy(array $criteria, array $orderBy = null)
 * @method SearchQuery[]    findAll()
 * @method SearchQuery[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SearchQueryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SearchQuery::class);
    }

    // /**
    //  * @return SearchQuery[] Returns an array of SearchQuery objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SearchQuery
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

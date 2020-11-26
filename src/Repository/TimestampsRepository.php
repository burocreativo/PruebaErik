<?php

namespace App\Repository;

use App\Entity\Timestamps;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Timestamps|null find($id, $lockMode = null, $lockVersion = null)
 * @method Timestamps|null findOneBy(array $criteria, array $orderBy = null)
 * @method Timestamps[]    findAll()
 * @method Timestamps[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TimestampsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Timestamps::class);
    }

    // /**
    //  * @return Timestamps[] Returns an array of Timestamps objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Timestamps
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

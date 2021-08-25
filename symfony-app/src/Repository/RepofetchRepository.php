<?php

namespace App\Repository;

use App\Entity\Repofetch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Repofetch|null find($id, $lockMode = null, $lockVersion = null)
 * @method Repofetch|null findOneBy(array $criteria, array $orderBy = null)
 * @method Repofetch[]    findAll()
 * @method Repofetch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepofetchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Repofetch::class);
    }

    // /**
    //  * @return Repofetch[] Returns an array of Repofetch objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Repofetch
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

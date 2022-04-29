<?php

namespace App\Repository;

use App\Entity\Vocation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vocation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vocation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vocation[]    findAll()
 * @method Vocation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VocationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vocation::class);
    }

    // /**
    //  * @return Vocation[] Returns an array of Vocation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vocation
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

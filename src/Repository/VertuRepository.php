<?php

namespace App\Repository;

use App\Entity\Vertu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vertu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vertu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vertu[]    findAll()
 * @method Vertu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VertuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vertu::class);
    }

    // /**
    //  * @return Vertu[] Returns an array of Vertu objects
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
    public function findOneBySomeField($value): ?Vertu
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

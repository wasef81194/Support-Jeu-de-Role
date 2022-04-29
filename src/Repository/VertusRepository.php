<?php

namespace App\Repository;

use App\Entity\Vertus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Vertus|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vertus|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vertus[]    findAll()
 * @method Vertus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VertusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Vertus::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Vertus $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Vertus $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
    public function findVertusOfThePerso($personnage)
    {
        return $this->createQueryBuilder('vertus')
            ->Join('vertus.personnage', 'personnage')
            ->Where("personnage.id = :personnage")
            ->setParameter(':personnage', $personnage)
            ->getQuery()
            ->getResult()
        ;
    }
    // /**
    //  * @return Vertus[] Returns an array of Vertus objects
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
    public function findOneBySomeField($value): ?Vertus
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

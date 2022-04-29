<?php

namespace App\Repository;

use App\Entity\Recompence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Recompence|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recompence|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recompence[]    findAll()
 * @method Recompence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecompenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recompence::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Recompence $entity, bool $flush = true): void
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
    public function remove(Recompence $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
    public function findRecompencesOfThePerso($personnage)
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
    //  * @return Recompence[] Returns an array of Recompence objects
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
    public function findOneBySomeField($value): ?Recompence
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

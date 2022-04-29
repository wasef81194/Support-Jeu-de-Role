<?php

namespace App\Repository;

use App\Entity\Armes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Armes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Armes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Armes[]    findAll()
 * @method Armes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArmesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Armes::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Armes $entity, bool $flush = true): void
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
    public function remove(Armes $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }
    //SELECT COUNT(*) FROM `armes` WHERE personnage_id = $id; 
    public function countArmes($id)
    {
        return $this->createQueryBuilder('armes')
            ->andWhere('armes.personnage = :id')
            ->setParameter(':id', $id)
            ->getQuery()
            ->getResult()
        ;
    }
    //SELECT * FROM `armes` JOIN personnage ON personnage.id = armes.`personnage_id`
    public function findArmesOfThePerso($personnage)
    {
        return $this->createQueryBuilder('arme')
            ->Join('arme.personnage', 'personnage')
            ->Where("personnage.id = :personnage")
            ->setParameter(':personnage', $personnage)
            ->getQuery()
            ->getResult()
        ;
    }
    // /**
    //  * @return Armes[] Returns an array of Armes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Armes
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

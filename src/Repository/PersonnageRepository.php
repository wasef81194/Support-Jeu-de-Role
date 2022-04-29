<?php

namespace App\Repository;

use App\Entity\Personnage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Personnage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Personnage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Personnage[]    findAll()
 * @method Personnage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonnageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Personnage::class);
    }
    //SELECT COUNT(*) FROM `Armes` JOIN `personnage` ON recompence.`personnage_id` = personnage.id WHERE personnage_id = $perso_id; 
     public function CountArmesOfThePerso($personnage)
    {
        return $this->createQueryBuilder('personnage')
            ->Join('personnage.arme', 'arme')
            ->select('personnage, count(personnage)')
            ->Where("personnage.id = :personnage")
            ->setParameter(':personnage', $personnage)
            ->getQuery()
            ->getResult()
        ;
    }
    public function CountVertusOfThePerso($personnage)
    {
        return $this->createQueryBuilder('personnage')
            ->Join('personnage.vertus', 'vertus')
            ->select('personnage, count(personnage)')
            ->Where("personnage.id = :personnage")
            ->setParameter(':personnage', $personnage)
            ->getQuery()
            ->getResult()
        ;
    }
    public function CountRecompensesOfThePerso($personnage)
    {
        return $this->createQueryBuilder('personnage')
            ->Join('personnage.recompences', 'recompences')
            ->select('personnage, count(personnage)')
            ->Where("personnage.id = :personnage")
            ->setParameter(':personnage', $personnage)
            ->getQuery()
            ->getResult()
        ;
    }
    
    // /**
    //  * @return Personnage[] Returns an array of Personnage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Personnage
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

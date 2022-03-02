<?php

namespace App\Repository;

use App\Entity\EnergyOption;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EnergyOption|null find($id, $lockMode = null, $lockVersion = null)
 * @method EnergyOption|null findOneBy(array $criteria, array $orderBy = null)
 * @method EnergyOption[]    findAll()
 * @method EnergyOption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnergyOptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EnergyOption::class);
    }

    // /**
    //  * @return EnergyOption[] Returns an array of EnergyOption objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EnergyOption
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

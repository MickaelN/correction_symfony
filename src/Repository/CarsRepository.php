<?php

namespace App\Repository;

use App\Entity\Cars;
use App\Entity\CarsSearch;
use Cocur\Slugify\Slugify;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cars|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cars|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cars[]    findAll()
 * @method Cars[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cars::class);
    }

    public function findBySearch($carsSearch, $seatSearch)
    {
        $query = $this->createQueryBuilder('c')
            //Le MEMBER OF permet à doctrine de faire la jointure et la bonne recherche
            ->andWhere(':idOptionEnergy MEMBER OF c.energyOptions')
            ->andWhere('c.seats = :seat')
            ->setParameter('idOptionEnergy', $carsSearch)
            ->setParameter('seat', $seatSearch)
            ->getQuery()
            ->getResult();
        return $query;
    }

    // /**
    //  * @return Cars[] Returns an array of Cars objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Cars
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\ListeEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListeEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeEntity[]    findAll()
 * @method ListeEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeEntity::class);
    }

    // /**
    //  * @return ListeEntity[] Returns an array of ListeEntity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListeEntity
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

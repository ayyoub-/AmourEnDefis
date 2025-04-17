<?php

namespace App\Repository;

use App\Entity\CategorieDefi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategorieDefi>
 *
 * @method CategorieDefi|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieDefi|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieDefi[]    findAll()
 * @method CategorieDefi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieDefiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieDefi::class);
    }

//    /**
//     * @return CategorieDefi[] Returns an array of CategorieDefi objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CategorieDefi
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

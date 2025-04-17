<?php

namespace App\Repository;

use App\Entity\CoupleDefi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CoupleDefi>
 *
 * @method CoupleDefi|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoupleDefi|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoupleDefi[]    findAll()
 * @method CoupleDefi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoupleDefiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoupleDefi::class);
    }

//    /**
//     * @return CoupleDefi[] Returns an array of CoupleDefi objects
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

//    public function findOneBySomeField($value): ?CoupleDefi
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

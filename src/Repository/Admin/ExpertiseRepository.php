<?php

namespace App\Repository\Admin;

use App\Entity\Admin\Expertise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Expertise>
 *
 * @method Expertise|null find($id, $lockMode = null, $lockVersion = null)
 * @method Expertise|null findOneBy(array $criteria, array $orderBy = null)
 * @method Expertise[]    findAll()
 * @method Expertise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpertiseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Expertise::class);
    }

    //    /**
    //     * @return Expertise[] Returns an array of Expertise objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Expertise
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

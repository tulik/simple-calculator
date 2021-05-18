<?php

namespace App\Repository;

use App\Entity\CalculationLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CalculationLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method CalculationLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method CalculationLog[]    findAll()
 * @method CalculationLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CalculationLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CalculationLog::class);

    }

    public function getQueryBuilder(): QueryBuilder
    {
        return $this->createQueryBuilder('a');
    }
}

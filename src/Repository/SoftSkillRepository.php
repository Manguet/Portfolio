<?php

namespace App\Repository;

use App\Entity\SoftSkill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\QueryException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @author Benjamin Manguet
 */
class SoftSkillRepository extends ServiceEntityRepository
{
    /**
     * SoftSkillRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SoftSkill::class);
    }

    /**
     * @return int|mixed|string
     *
     * @throws QueryException
     */
    public function getSoftSkillsByReference()
    {
        return $this->createQueryBuilder('s')
            ->select('PARTIAL s.{id, title, titleEn, reference, icon}')
            ->indexBy('s', 's.reference')
            ->getQuery()
            ->getArrayResult()
        ;
    }
}

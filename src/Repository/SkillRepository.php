<?php

namespace App\Repository;

use App\Entity\Skill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\QueryException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @author Benjamin Manguet
 */
class SkillRepository extends ServiceEntityRepository
{
    /**
     * SkillRepository constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Skill::class);
    }

    /**
     * @return int|mixed|string
     *
     * @throws QueryException
     */
    public function getSkillsByReference()
    {
        return $this->createQueryBuilder('s')
            ->select('PARTIAL s.{id, title, reference, altTitle, image}')
            ->indexBy('s', 's.reference')
            ->getQuery()
            ->getArrayResult()
        ;
    }
}

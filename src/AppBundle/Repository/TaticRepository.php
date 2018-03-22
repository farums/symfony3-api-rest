<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Tatic;
use Doctrine\ORM\EntityRepository;

/**
 * TaticRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TaticRepository extends EntityRepository
{
    public function findArrayById($id): ?array
    {
        $qb = $this->createQueryBuilder('e')
            ->where('e.id = :id')
            ->setParameter('id', $id);

        $result = $qb->getQuery()->getArrayResult();

        return array_pop($result);
    }
}

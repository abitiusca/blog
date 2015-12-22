<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class TblCommentsRepository extends EntityRepository
{
    public function getComments()
    {   
        $query = $this->createQueryBuilder('c')
            ->orderBy('c.createdDate', 'ASC')
            ->setMaxResults(10)
            ->getQuery();

        $comments = $query->getResult();
        return $comments;
    }
    
    public function findComment($id) {
        return $this->createQueryBuilder('c')
            ->andWhere('c.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
    
}

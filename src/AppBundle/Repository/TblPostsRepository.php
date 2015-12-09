<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class TblPostsRepository extends EntityRepository
{
//    public function queryLatest()
//    {
//        return $this->getEntityManager()
//            ->createQuery('
//                SELECT p
//                FROM AppBundle:TblPosts p
//                WHERE p.createdDate <= :now
//                ORDER BY p.createdDate DESC
//            ')
//            ->setParameter('now', new \DateTime())
//        ;
//    }
//
//    public function findLatest()
//    {
//        $this->queryLatest()->getResult();
//    }
}

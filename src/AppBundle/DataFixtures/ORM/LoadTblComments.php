<?php

// src/AppBundle/DataFixtures/ORM/LoadTblCommentsData.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\TblComments;

class LoadTblCommentsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $total = 10;
        for($i=1;$i<=$total;$i++){
            
            $refPost = $this->getReference('post_' . rand(1, $total));
            
            $comment = new TblComments();
            $comment->setBody('Some lorem '.$i.' lipsum doler comment text '.$i);
            $comment->setCreatedBy('user');
            $comment->setCreatedDate(new \DateTime());
            $comment->setUpdatedDate(new \DateTime());
            $comment->setTblPosts($refPost);
            $manager->persist($comment);
        }
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 200;
    }
}
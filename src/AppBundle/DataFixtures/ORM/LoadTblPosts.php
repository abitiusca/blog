<?php

// src/AppBundle/DataFixtures/ORM/LoadTblPostsData.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\TblPosts;

class LoadTblPostsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i=1;$i<=10;$i++){
            $post = new TblPosts();
            $post->setTitle('First Post '.$i);
            $post->setBody('Some lorem '.$i.' lipsum doler post text '.$i);
            $post->setCreatedBy('user');
            $post->setCreatedDate(new \DateTime());
            $post->setUpdatedDate(new \DateTime());
            $manager->persist($post);
            $this->addReference('post_' . $i, $post);
        }
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 100;
    }
}
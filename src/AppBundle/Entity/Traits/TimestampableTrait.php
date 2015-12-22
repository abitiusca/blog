<?php

namespace AppBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait TimestampableTrait
{
    /**
     * @var \DateTime
     */
    private $createdDate;

    /**
     * @var \DateTime
     */
    private $updatedDate;

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     *
     * @return TblPosts
     */
    public function setCreatedDate($createdDate)
    {        
        if(!$createdDate){
            $this->createdDate = new \DateTime();
        }
        else{
            $this->createdDate = $createdDate;
        }

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Set updatedDate
     *
     * @param \DateTime $updatedDate
     *
     * @return TblPosts
     */
    public function setUpdatedDate($updatedDate)
    {
        if(!$updatedDate){
            $this->updatedDate = new \DateTime();
        }
        else{
            $this->updatedDate = $updatedDate;
        }

        return $this;
    }

    /**
     * Get updatedDate
     *
     * @return \DateTime
     */
    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }
}
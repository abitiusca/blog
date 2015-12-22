<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\TimestampableTrait;

/**
 * TblComments
 */
class TblComments
{
    use TimestampableTrait;
    
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $body;

    /**
     * @var string
     */
    private $createdBy;

    /**
     * @var \AppBundle\Entity\TblPosts
     */
    private $tbl_posts;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set body
     *
     * @param string $body
     *
     * @return TblComments
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set createdBy
     *
     * @param string $createdBy
     *
     * @return TblComments
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set tblPosts
     *
     * @param \AppBundle\Entity\TblPosts $tblPosts
     *
     * @return TblComments
     */
    public function setTblPosts(\AppBundle\Entity\TblPosts $tblPosts = null)
    {
        $this->tbl_posts = $tblPosts;

        return $this;
    }

    /**
     * Get tblPosts
     *
     * @return \AppBundle\Entity\TblPosts
     */
    public function getTblPosts()
    {
        return $this->tbl_posts;
    }
}

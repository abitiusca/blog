<?php

namespace AppBundle\Entity;

use \Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Entity\Traits\TimestampableTrait;

/**
 * TblPosts
 */
class TblPosts
{
    use TimestampableTrait;
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $body;

    /**
     * @var string
     */
    private $createdBy;

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
     * Set title
     *
     * @param string $title
     *
     * @return TblPosts
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set body
     *
     * @param string $body
     *
     * @return TblPosts
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
     * @return TblPosts
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comments;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    /**
     * Add comment
     *
     * @param \AppBundle\Entity\TblComments $comment
     *
     * @return TblPosts
     */
    public function addComment(\AppBundle\Entity\TblComments $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \AppBundle\Entity\TblComments $comment
     */
    public function removeComment(\AppBundle\Entity\TblComments $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}

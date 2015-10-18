<?php

namespace Application\Model\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator\ClassMethods;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Post
 *
 * @ORM\Entity
 * @ORM\Table(name="post", indexes={@ORM\Index(name="fk_post_post_idx", columns={"parent"})})
 */
class Post
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="id_post", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idPost;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=250, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=16777215, nullable=false)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=300, nullable=false)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity="Application\Model\Entity\Post", mappedBy="parent")
     */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Model\Entity\Post", inversedBy="children")
     * @ORM\JoinColumn(name="parent", referencedColumnName="id_post")
     */
    private $parent;

    public function __construct(array $options = array())
    {
        $this->children = new ArrayCollection();
        $this->populate($options);
    }

    public function populate(array $options = array())
    {
        (new ClassMethods())->hydrate($options, $this);
    }

    function getIdPost()
    {
        return $this->idPost;
    }

    function getCreatedAt()
    {
        return $this->createdAt;
    }

    function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    function getTitle()
    {
        return $this->title;
    }

    function getContent()
    {
        return $this->content;
    }

    function getStatus()
    {
        return $this->status;
    }

    function getSlug()
    {
        return $this->slug;
    }

    function getParent()
    {
        return $this->parent;
    }

    function setIdPost($idPost)
    {
        $this->idPost = $idPost;
    }

    function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    function setTitle($title)
    {
        $this->title = $title;
    }

    function setContent($content)
    {
        $this->content = $content;
    }

    function setStatus($status)
    {
        $this->status = $status;
    }

    function setSlug($slug)
    {
        $this->slug = $slug;
    }

    function setParent(\Application\Model\Entity\Post $parent)
    {
        $this->parent = $parent;
    }
}
<?php

namespace Post\Model\Entity;

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
     * @ORM\OneToMany(targetEntity="Post\Model\Entity\Post", mappedBy="parent")
     */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="Post\Model\Entity\Post", inversedBy="children")
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

    public function getIdPost()
    {
        return $this->idPost;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setIdPost($idPost)
    {
        $this->idPost = $idPost;
    }

    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function setParent(Post $parent)
    {
        $this->parent = $parent;
    }
}
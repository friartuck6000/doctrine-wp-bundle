<?php

namespace Ft6k\Bundle\WpDoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PostMetaField
 *
 * @ORM\Entity(repositoryClass="Rb\Specification\Doctrine\SpecificationRepository")
 * @ORM\Table(name="postmeta", indexes={
 *   @ORM\Index(name="post_id", columns={"post_id"}),
 *   @ORM\Index(name="meta_key", columns={"meta_key"})
 * })
 */
class PostMetaField
{
    use Base\MetaFieldTrait;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var  int
     *
     * @ORM\Column(name="meta_id", type="bigint")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var  Post
     *
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="meta")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="ID", nullable=false)
     */
    protected $post;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return  Post
     */
    public function getPost()
    {
        return $this->post;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param   Post  $post
     * @return  $this
     */
    public function setPost(Post $post = null)
    {
        $this->post = $post;

        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param  Post    $post
     * @param  string  $key
     * @param  mixed   $value
     */
    public function __construct(Post $post = null, $key = null, $value = null)
    {
        $this->setPost($post)
            ->setKey($key)
            ->setValue($value);
    }
}

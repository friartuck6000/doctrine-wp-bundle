<?php

namespace Ft6k\Bundle\WpDoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommentMetaField
 *
 * @ORM\Entity(repositoryClass="Rb\Specification\Doctrine\SpecificationRepository")
 * @ORM\Table(name="commentmeta", indexes={
 *   @ORM\Index(name="comment_id", columns={"comment_id"}),
 *   @ORM\Index(name="meta_key", columns={"meta_key"})
 * })
 */
class CommentMetaField
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
     * @var  Comment
     *
     * @ORM\ManyToOne(targetEntity="Comment", inversedBy="meta")
     * @ORM\JoinColumn(name="comment_id", referencedColumnName="comment_ID", nullable=false)
     */
    protected $comment;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return  Comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param   Comment  $comment
     * @return  $this
     */
    public function setComment(Comment $comment = null)
    {
        $this->comment = $comment;

        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param  Comment  $comment
     * @param  string   $key
     * @param  mixed    $value
     */
    public function __construct(Comment $comment = null, $key = null, $value = null)
    {
        $this->setComment($comment)
            ->setKey($key)
            ->setValue($value);
    }
}

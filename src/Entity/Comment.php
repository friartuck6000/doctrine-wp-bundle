<?php

namespace Ft6k\Bundle\WpDoctrineBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comment
 *
 * @ORM\Entity(repositoryClass="Rb\Specification\Doctrine\SpecificationRepository")
 * @ORM\Table(name="comments", indexes={
 *   @ORM\Index(name="comment_post_ID", columns={"comment_post_ID"}),
 *   @ORM\Index(name="comment_approved_date_gmt", columns={"comment_approved", "comment_date_gmt"}),
 *   @ORM\Index(name="comment_date_gmt", columns={"comment_date_gmt"}),
 *   @ORM\Index(name="comment_parent", columns={"comment_parent"}),
 *   @ORM\Index(name="comment_author_email", columns={"comment_author_email"})
 * })
 */
class Comment
{
    use Base\DoubleDatedTrait;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var  int
     *
     * @ORM\Column(name="comment_ID", type="bigint")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var  string
     *
     * @ORM\Column(name="comment_author", type="text", nullable=false)
     */
    protected $authorName;

    /**
     * @var  string
     *
     * @ORM\Column(name="comment_author_email", type="string", length=100, nullable=false)
     */
    protected $authorEmail;

    /**
     * @var  string
     *
     * @ORM\Column(name="comment_author_url", type="string", length=200, nullable=false)
     */
    protected $authorUrl;

    /**
     * @var  string
     *
     * @ORM\Column(name="comment_author_IP", type="string", length=100, nullable=false)
     */
    protected $authorIp;

    /**
     * @var  \DateTime
     *
     * @ORM\Column(name="comment_date", type="datetime", nullable=false)
     */
    protected $date;

    /**
     * @var  \DateTime
     *
     * @ORM\Column(name="comment_date_gmt", type="datetime", nullable=false)
     */
    protected $gmtDate;

    /**
     * @var  string
     *
     * @ORM\Column(name="comment_content", type="text", nullable=false)
     */
    protected $commentContent;

    /**
     * @var  int
     *
     * @ORM\Column(name="comment_karma", type="integer", nullable=false)
     */
    protected $karma;

    /**
     * @var  bool
     *
     * @ORM\Column(name="comment_approved", type="string", length=20, nullable=false)
     */
    protected $approved;

    /**
     * @var  string
     *
     * @ORM\Column(name="comment_agent", type="string", length=255, nullable=false)
     */
    protected $agent;

    /**
     * @var  string
     *
     * @ORM\Column(name="comment_type", type="string", length=20, nullable=false)
     */
    protected $commentType;

    /**
     * @var  int
     *
     * @ORM\Column(name="comment_parent", type="bigint", nullable=false)
     */
    protected $parentId;

    /**
     * @var  int
     *
     * @ORM\Column(name="comment_post_ID", type="bigint", nullable=false)
     */
    protected $postId;

    /**
     * @var  int
     *
     * @ORM\Column(name="user_ID", type="bigint", nullable=false)
     */
    protected $userId;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var  ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="CommentMetaField", mappedBy="comment", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $meta;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return  string
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * @return  string
     */
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

    /**
     * @return  string
     */
    public function getAuthorUrl()
    {
        return $this->authorUrl;
    }

    /**
     * @return  string
     */
    public function getAuthorIp()
    {
        return $this->authorIp;
    }

    /**
     * @return  \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return  \DateTime
     */
    public function getGmtDate()
    {
        return $this->gmtDate;
    }

    /**
     * @return  string
     */
    public function getCommentContent()
    {
        return $this->commentContent;
    }

    /**
     * @return  int
     */
    public function getKarma()
    {
        return $this->karma;
    }

    /**
     * @return  boolean
     */
    public function isApproved()
    {
        return $this->approved;
    }

    /**
     * @return  string
     */
    public function getAgent()
    {
        return $this->agent;
    }

    /**
     * @return  string
     */
    public function getCommentType()
    {
        return $this->commentType;
    }

    /**
     * @return  int
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @return  int
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * @return  int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param   string  $name
     * @return  $this
     */
    public function setAuthorName($name)
    {
        $this->authorName = $name;

        return $this;
    }

    /**
     * @param   string  $authorEmail
     * @return  $this
     */
    public function setAuthorEmail($authorEmail)
    {
        $this->authorEmail = $authorEmail;

        return $this;
    }

    /**
     * @param   string  $authorUrl
     * @return  $this
     */
    public function setAuthorUrl($authorUrl)
    {
        $this->authorUrl = $authorUrl;

        return $this;
    }

    /**
     * @param   string  $authorIp
     * @return  $this
     */
    public function setAuthorIp($authorIp)
    {
        $this->authorIp = $authorIp;

        return $this;
    }

    /**
     * @param   \DateTime  $date
     * @return  $this
     */
    public function setDate(\DateTime $date = null)
    {
        $this->date = $date ? $date : $this->now();

        return $this;
    }

    /**
     * @param   \DateTime  $gmtDate
     * @return  $this
     */
    public function setGmtDate(\DateTime $gmtDate = null)
    {
        $this->gmtDate = $gmtDate ? $gmtDate : $this->now(true);

        return $this;
    }

    /**
     * @param   string  $commentContent
     * @return  $this
     */
    public function setCommentContent($commentContent)
    {
        $this->commentContent = $commentContent;

        return $this;
    }

    /**
     * @param   int  $karma
     * @return  $this
     */
    public function setKarma($karma)
    {
        $this->karma = $karma;

        return $this;
    }

    /**
     * @param   boolean  $approved
     * @return  $this
     */
    public function setApproved($approved = true)
    {
        $this->approved = (bool) $approved;

        return $this;
    }

    /**
     * @param   string  $agent
     * @return  $this
     */
    public function setAgent($agent)
    {
        $this->agent = $agent;

        return $this;
    }

    /**
     * @param   string  $commentType
     * @return  $this
     */
    public function setCommentType($commentType)
    {
        $this->commentType = $commentType;

        return $this;
    }

    /**
     * @param   int|Comment  $parent
     * @return  $this
     */
    public function setParentId($parent = 0)
    {
        if ($parent instanceof Comment) {
            $this->parentId = $parent->getId();
        } else {
            $this->parentId = (int) $parent;
        }

        return $this;
    }

    /**
     * @param   int|Post  $post
     * @return  $this
     */
    public function setPostId($post = 0)
    {
        if ($post instanceof Post) {
            $this->postId = $post->getId();
        } else {
            $this->postId = (int) $post;
        }

        return $this;
    }

    /**
     * @param   int|User  $user
     * @return  $this
     */
    public function setUserId($user = 0)
    {
        if ($user instanceof User) {
            $this->userId = $user->getId();
        } else {
            $this->userId = (int) $user;
        }

        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return  ArrayCollection
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param   CommentMetaField  $field
     * @return  $this
     */
    public function addMeta(CommentMetaField $field) {
        if (!$this->meta->contains($field)) {
            $this->meta->add($field);
            $field->setComment($this);
        }

        return $this;
    }

    /**
     * @param   CommentMetaField  $field
     * @return  $this
     */
    public function removeMeta(CommentMetaField $field)
    {
        $this->meta->removeElement($field);
        $field->setComment(null);

        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function __construct()
    {
        $this->meta = new ArrayCollection();
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Bump both the server-local amd GMT timestamps at the same time.
     *
     * @return  $this
     */
    public function update()
    {
        $this->setDate($this->now())
            ->setGmtDate($this->now(true));
        
        return $this;
    }
}

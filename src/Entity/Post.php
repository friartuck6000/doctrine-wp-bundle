<?php

namespace Ft6k\Bundle\WpDoctrineBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ft6k\Bundle\WpDoctrineBundle\Entity\Helper\PostStatus;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Post
 *
 * @ORM\Entity()
 * @ORM\Table(name="posts", indexes={
 *   @ORM\Index(name="post_name", columns={"post_name"}),
 *   @ORM\Index(name="type_status_date", columns={"post_type", "post_status", "post_date", "ID"}),
 *   @ORM\Index(name="post_parent", columns={"post_parent"}),
 *   @ORM\Index(name="post_author", columns={"post_author"})
 * })
 */
class Post
{
    use Base\DoubleDatedTrait;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var  int
     *
     * @ORM\Column(name="ID", type="bigint")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var  \DateTime
     *
     * @ORM\Column(name="post_date", type="datetime", nullable=false)
     */
    protected $postDate;

    /**
     * @var  \DateTime
     *
     * @ORM\Column(name="post_date_gmt", type="datetime", nullable=false)
     */
    protected $gmtPostDate;

    /**
     * @var  string
     *
     * @ORM\Column(name="post_content", type="text", nullable=false)
     */
    protected $content;

    /**
     * @var  string
     *
     * @ORM\Column(name="post_title", type="text", nullable=false)
     */
    protected $title;

    /**
     * @var  string
     *
     * @ORM\Column(name="post_excerpt", type="text", nullable=false)
     */
    protected $excerpt;

    /**
     * @var  string
     *
     * @ORM\Column(name="post_status", type="string", length=20, nullable=false)
     *
     * @Assert\Choice(callback="getAvailableStatuses")
     */
    protected $status = PostStatus::DRAFT;

    /**
     * @var  string
     *
     * @ORM\Column(name="comment_status", type="string", length=20, nullable=false)
     */
    protected $commentsEnabled = 'closed';

    /**
     * @var  string
     *
     * @ORM\Column(name="ping_status", type="string", length=20, nullable=false)
     */
    protected $pingsEnabled = 'closed';

    /**
     * @var  string
     *
     * @ORM\Column(name="post_password", type="string", length=20, nullable=false)
     */
    protected $password;

    /**
     * @var  string
     *
     * @ORM\Column(name="post_name", type="string", length=200, nullable=false)
     */
    protected $slug;

    /**
     * @var  string
     *
     * @ORM\Column(name="to_ping", type="text", nullable=false)
     */
    protected $toPing;

    /**
     * @var  string
     *
     * @ORM\Column(name="pinged", type="text", nullable=false)
     */
    protected $pinged;

    /**
     * @var  \DateTime
     *
     * @ORM\Column(name="post_modified", type="datetime", nullable=false)
     */
    protected $modifiedDate;

    /**
     * @var  \DateTime
     *
     * @ORM\Column(name="post_modified_gmt", type="datetime", nullable=false)
     */
    protected $gmtModifiedDate;

    /**
     * @var  string
     *
     * @ORM\Column(name="post_content_filtered", type="text", nullable=false)
     */
    protected $filteredContent;

    /**
     * @var  string
     *
     * @ORM\Column(name="guid", type="string", length=255, nullable=false)
     */
    protected $guid;

    /**
     * @var  int
     *
     * @ORM\Column(name="menu_order", type="integer", nullable=false)
     */
    protected $menuOrder = 0;

    /**
     * @var  string
     *
     * @ORM\Column(name="post_type", type="string", length=20, nullable=false)
     */
    protected $postType;

    /**
     * @var  string
     *
     * @ORM\Column(name="post_mime_type", type="string", length=100, nullable=false)
     */
    protected $mimeType;

    /**
     * @var  int
     *
     * @ORM\Column(name="comment_count", type="bigint", nullable=false)
     */
    protected $commentCount = 0;

    /**
     * @var  int
     *
     * @ORM\Column(name="post_author", type="bigint", nullable=false)
     */
    protected $authorId = 0;

    /**
     * @var  int
     *
     * @ORM\Column(name="post_parent", type="bigint", nullable=false)
     */
    protected $parentId = 0;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var  ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="PostMetaField", mappedBy="post", cascade={"persist", "remove"}, orphanRemoval=true)
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
     * @return  \DateTime
     */
    public function getPostDate()
    {
        return $this->postDate;
    }

    /**
     * @return  \DateTime
     */
    public function getGmtPostDate()
    {
        return $this->gmtPostDate;
    }

    /**
     * @return  string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return  string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return  string
     */
    public function getExcerpt()
    {
        return $this->excerpt;
    }

    /**
     * @return  string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return  bool
     */
    public function hasCommentsEnabled()
    {
        return ($this->commentsEnabled === 'open');
    }

    /**
     * @return  bool
     */
    public function hasPingsEnabled()
    {
        return ($this->pingsEnabled === 'open');
    }

    /**
     * @return  string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return  string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return  string
     */
    public function getToPing()
    {
        return $this->toPing;
    }

    /**
     * @return  string
     */
    public function getPinged()
    {
        return $this->pinged;
    }

    /**
     * @return  \DateTime
     */
    public function getModifiedDate()
    {
        return $this->modifiedDate;
    }

    /**
     * @return  \DateTime
     */
    public function getGmtModifiedDate()
    {
        return $this->gmtModifiedDate;
    }

    /**
     * @return  string
     */
    public function getFilteredContent()
    {
        return $this->filteredContent;
    }

    /**
     * @return  string
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * @return  int
     */
    public function getMenuOrder()
    {
        return $this->menuOrder;
    }

    /**
     * @return  string
     */
    public function getPostType()
    {
        return $this->postType;
    }

    /**
     * @return  string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @return  int
     */
    public function getCommentCount()
    {
        return $this->commentCount;
    }

    /**
     * @return  int
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @return  int
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param   \DateTime  $postDate
     * @return  $this
     */
    public function setPostDate(\DateTime $postDate = null)
    {
        $this->postDate = $postDate ? $postDate : $this->now();

        return $this;
    }

    /**
     * @param   \DateTime  $gmtPostDate
     * @return  $this
     */
    public function setGmtPostDate(\DateTime $gmtPostDate = null)
    {
        $this->gmtPostDate = $gmtPostDate ? $gmtPostDate : $this->now(true);

        return $this;
    }

    /**
     * @param   string  $content
     * @return  $this
     */
    public function setContent($content = '')
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @param   string  $title
     * @return  $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param   string  $excerpt
     * @return  $this
     */
    public function setExcerpt($excerpt = '')
    {
        $this->excerpt = $excerpt;

        return $this;
    }

    /**
     * @param   string  $status
     * @return  $this
     */
    public function setStatus($status = 'draft')
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @param   bool  $commentsEnabled
     * @return  $this
     */
    public function setCommentsEnabled($commentsEnabled = true)
    {
        $this->commentsEnabled = (bool) $commentsEnabled ? 'open' : 'closed';

        return $this;
    }

    /**
     * @param   bool  $pingsEnabled
     * @return  $this
     */
    public function setPingsEnabled($pingsEnabled = true)
    {
        $this->pingsEnabled = (bool) $pingsEnabled ? 'open' : 'closed';

        return $this;
    }

    /**
     * @param   string  $password
     * @return  $this
     */
    public function setPassword($password = '')
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param   string  $slug
     * @return  $this
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @param   string  $toPing
     * @return  $this
     */
    public function setToPing($toPing)
    {
        $this->toPing = $toPing;

        return $this;
    }

    /**
     * @param   string  $pinged
     * @return  $this
     */
    public function setPinged($pinged)
    {
        $this->pinged = $pinged;

        return $this;
    }

    /**
     * @param   \DateTime  $modifiedDate
     * @return  $this
     */
    public function setModifiedDate(\DateTime $modifiedDate = null)
    {
        $this->modifiedDate = $modifiedDate ? $modifiedDate : $this->now();

        return $this;
    }

    /**
     * @param   \DateTime  $gmtModifiedDate
     * @return  $this
     */
    public function setGmtModifiedDate(\DateTime $gmtModifiedDate = null)
    {
        $this->gmtModifiedDate = $gmtModifiedDate ? $gmtModifiedDate : $this->now(true);

        return $this;
    }

    /**
     * @param   string  $filteredContent
     * @return  $this
     */
    public function setFilteredContent($filteredContent = '')
    {
        $this->filteredContent = $filteredContent;

        return $this;
    }

    /**
     * @param   string  $guid
     * @return  $this
     */
    public function setGuid($guid = null)
    {
        $this->guid = $guid ? $guid : '?'. $this->getId();

        return $this;
    }

    /**
     * @param   int  $menuOrder
     * @return  $this
     */
    public function setMenuOrder($menuOrder = 0)
    {
        $this->menuOrder = $menuOrder;

        return $this;
    }

    /**
     * @param   string $postType
     * @return  $this
     */
    public function setPostType($postType = 'post')
    {
        $this->postType = $postType;

        return $this;
    }

    /**
     * @param   string $mimeType
     * @return  $this
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    /**
     * @param   int $commentCount
     * @return  $this
     */
    public function setCommentCount($commentCount = -1)
    {
        if ($commentCount === -1) {
            $this->commentCount++;
        } else {
            $this->commentCount = $commentCount;
        }

        return $this;
    }

    /**
     * @param   int|User  $author
     * @return  $this
     */
    public function setAuthorId($author = 0)
    {
        if ($author instanceof User) {
            $this->authorId = $author->getId();
        } else {
            $this->authorId = (int) $author;
        }

        return $this;
    }

    /**
     * @param   int|Post  $parent
     * @return  $this
     */
    public function setParentId($parent = 0)
    {
        if ($parent instanceof Post) {
            $this->parentId = $parent->getId();
        } else {
            $this->parentId = (int) $parent;
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
     * @param   PostMetaField  $field
     * @return  $this
     */
    public function addMeta(PostMetaField $field)
    {
        if (!$this->meta->contains($field)) {
            $this->meta->add($field);
            $field->setPost($this);
        }

        return $this;
    }

    /**
     * @param   PostMetaField  $field
     * @return  $this
     */
    public function removeMeta(PostMetaField $field)
    {
        $this->meta->removeElement($field);
        $field->setPost(null);

        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Get a list of valid post status options.
     *
     * @return  array
     */
    public static function getAvailableStatuses()
    {
        return PostStatus::getDefined();
    }

    public function __construct()
    {
        $this->meta = new ArrayCollection();
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Automatically set post and modified dates.
     *
     * @return  $this
     */
    public function modify()
    {
        $now = $this->now();
        $nowGmt = $this->now(true);

        // Set post date if not set yet
        if (!($this->getPostDate() instanceof \DateTime)) {
            $this->setPostDate($now)
                ->setGmtPostDate($nowGmt);
        }

        // Set modified date
        $this->setModifiedDate($now)
            ->setGmtModifiedDate($nowGmt);

        return $this;
    }
}

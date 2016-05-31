<?php

namespace Ft6k\Bundle\WpDoctrineBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User
 *
 * @ORM\Entity()
 * @ORM\Table(name="users", indexes={
 *   @ORM\Index(name="user_login_key", columns={"user_login"}),
 *   @ORM\Index(name="user_nicename", columns={"user_nicename"})
 * })
 *
 * @UniqueEntity("username")
 * @UniqueEntity("email")
 */
class User
{
    /**
     * @var  int
     *
     * @ORM\Column(name="ID", type="bigint")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var  string
     *
     * @ORM\Column(name="user_login", type="string", length=60, nullable=false)
     */
    protected $username = '';

    /**
     * @var  string
     *
     * @ORM\Column(name="user_pass", type="string", length=64, nullable=false)
     */
    protected $password = '';

    /**
     * @var  string
     *
     * @ORM\Column(name="user_nicename", type="string", length=50, nullable=false)
     */
    protected $nicename = '';

    /**
     * @var  string
     *
     * @ORM\Column(name="user_email", type="string", length=100, nullable=false)
     */
    protected $email = '';

    /**
     * @var  string
     *
     * @ORM\Column(name="user_url", type="string", length=100, nullable=false)
     */
    protected $url = '';

    /**
     * @var  DateTime
     *
     * @ORM\Column(name="user_registered", type="datetime", nullable=false)
     */
    protected $dateRegistered;

    /**
     * @var  string
     *
     * @ORM\Column(name="user_activation_key", type="string", length=60, nullable=false)
     */
    protected $activationKey = '';

    /**
     * @var  int
     *
     * @ORM\Column(name="user_status", type="integer", nullable=false)
     */
    protected $status = 0;

    /**
     * @var  string
     *
     * @ORM\Column(name="display_name", type="string", length=250, nullable=false)
     */
    protected $displayName = '';

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var  ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="UserMetaField", mappedBy="user", cascade={"persist", "remove"}, orphanRemoval=true)
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
    public function getUsername()
    {
        return $this->username;
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
    public function getNicename()
    {
        return $this->nicename;
    }

    /**
     * @return  string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return  string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return  DateTime
     */
    public function getDateRegistered()
    {
        return $this->dateRegistered;
    }

    /**
     * @return  string
     */
    public function getActivationKey()
    {
        return $this->activationKey;
    }

    /**
     * @return  int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return  string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param   string  $username
     * @return  $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @param   string  $password
     * @return  $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param   string  $nicename
     * @return  $this
     */
    public function setNicename($nicename)
    {
        $this->nicename = $nicename;

        return $this;
    }

    /**
     * @param   string  $email
     * @return  $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param   string  $url
     * @return  $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @param   DateTime  $dateRegistered
     * @return  $this
     */
    public function setDateRegistered(DateTime $dateRegistered = null)
    {
        $this->dateRegistered = $dateRegistered ? $dateRegistered : new DateTime();

        return $this;
    }

    /**
     * @param   string  $activationKey
     * @return  $this
     */
    public function setActivationKey($activationKey)
    {
        $this->activationKey = $activationKey;

        return $this;
    }

    /**
     * @param   int  $status
     * @return  $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @param   string  $displayName
     * @return  $this
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

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
     * @param   UserMetaField  $field
     * @return  $this
     */
    public function addMeta(UserMetaField $field)
    {
        if (!$this->meta->contains($field)) {
            $this->meta->add($field);
            $field->setUser($this);
        }

        return $this;
    }

    /**
     * @param   UserMetaField  $field
     * @return  $this
     */
    public function removeMeta(UserMetaField $field)
    {
        $this->meta->removeElement($field);
        $field->setUser(null);

        return $this;
    }


    // -----------------------------------------------------------------------------------------------------------------

    public function __construct()
    {
        $this->meta = new ArrayCollection();

        $this->dateRegistered = new DateTime();
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Retrieve a single meta field.
     *
     * @param   string  $key
     * @return  UserMetaField|bool
     */
    public function getMetaField($key)
    {
        $filter = Criteria::create()
            ->where(Criteria::expr()->eq('key', $key))
            ->setMaxResults(1);

        return $this->meta->matching($filter)->first();
    }
}

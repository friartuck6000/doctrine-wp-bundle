<?php

namespace Ft6k\Bundle\WpDoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserMetaField
 *
 * @ORM\Entity(repositoryClass="Rb\Specification\Doctrine\SpecificationRepository")
 * @ORM\Table(name="usermeta", indexes={
 *   @ORM\Index(name="user_id", columns={"user_id"}),
 *   @ORM\Index(name="meta_key", columns={"meta_key"})
 * })
 */
class UserMetaField
{
    use Base\MetaFieldTrait;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var  int
     *
     * @ORM\Column(name="umeta_id", type="bigint")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var  User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="meta")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="ID", nullable=false)
     */
    protected $user;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return  User
     */
    public function getUser()
    {
        return $this->user;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param   User  $user
     * @return  $this
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param  User    $user
     * @param  string  $key
     * @param  mixed   $value
     */
    public function __construct(User $user = null, $key = null, $value = null)
    {
        $this->setUser($user)
            ->setKey($key)
            ->setValue($value);
    }
}

<?php

namespace Ft6k\Bundle\WpDoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Option
 *
 * @ORM\Entity(repositoryClass="Rb\Specification\Doctrine\SpecificationRepository")
 * @ORM\Table(name="options", uniqueConstraints={
 *   @ORM\UniqueConstraint(name="option_name", columns={"option_name"})
 * })
 */
class Option
{
    use Base\MaybeSerializableTrait;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var  int
     *
     * @ORM\Column(name="option_id", type="bigint")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var  string
     *
     * @ORM\Column(name="option_name", type="string", length=64, nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="option_value", type="text", nullable=false)
     */
    protected $value;

    /**
     * @var  string
     *
     * @ORM\Column(name="autoload", type="string", length=20, nullable=false)
     */
    protected $autoload;

    // -----------------------------------------------------------------------------------------------------------------

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValue()
    {
        return self::maybeUnserialize($this->value);
    }

    public function isAutoload()
    {
        return ($this->autoload === 'yes');
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param   string  $name
     * @return  $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param   mixed  $value
     * @return  $this
     */
    public function setValue($value = null)
    {
        $this->value = self::maybeSerialize($value);

        return $this;
    }

    /**
     * @param   bool  $autoload
     * @return  $this
     */
    public function setAutoload($autoload = true)
    {
        $this->autoload = (bool) $autoload ? 'yes' : 'no';

        return $this;
    }
}

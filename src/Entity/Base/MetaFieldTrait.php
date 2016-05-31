<?php

namespace Ft6k\Bundle\WpDoctrineBundle\Entity\Base;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait for WordPress meta entities (comment meta, post meta and user meta), which all share the behavior
 * of serializing non-scalar meta values.
 */
trait MetaFieldTrait
{
    use MaybeSerializableTrait;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var  string
     *
     * @ORM\Column(name="meta_key", type="string", length=255, nullable=true)
     *
     * @Assert\NotBlank()
     */
    protected $key;

    /**
     * @var  string
     *
     * @ORM\Column(name="meta_value", type="text", nullable=true)
     */
    protected $value;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return  string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return  mixed
     */
    public function getValue()
    {
        return self::maybeUnserialize($this->value);
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param   string  $key
     * @return  $this
     */
    public function setKey($key)
    {
        $this->key = (string) $key;

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
}

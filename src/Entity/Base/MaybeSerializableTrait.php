<?php

namespace Ft6k\Bundle\WpDoctrineBundle\Entity\Base;


/**
 * This trait is used for WordPress metadata entities that serialize their values
 * for storage (options, postmeta, usermeta, etc.)
 *
 * @author  Kyle Tucker <kyleatucker@gmail.com>
 */
trait MaybeSerializableTrait
{
    /**
     * Try to serialize the value if it needs it (i.e. if it is non-scalar). If it needs to be but _can't_
     * be serialized, throw an exception.
     *
     * @throws  \InvalidArgumentException
     *
     * @param   mixed  $value
     * @return  string
     */
    public static function maybeSerialize($value = null)
    {
        $returnValue = $value;

        if (is_object($value)) {
            // If value is an object, make sure it is serializable. If it isn't, catch the exception, wrap it
            // and rethrow it.
            try {
                $returnValue = serialize($value);
            } catch (\Exception $e) {
                throw new \InvalidArgumentException('The non-scalar meta value given cannot be serialized.', 0, $e);
            }
        } elseif (is_array($value)) {
            // If value is an array, it can be serialized
            $returnValue = serialize($value);
        }

        return $returnValue;
    }

    /**
     * Return either a scalar or an unserialized non-scalar.
     *
     * @param   string  $value
     * @return  mixed
     */
    public static function maybeUnserialize($value)
    {
        $unserialized = @unserialize($value);
        if ($value === 'b:0;' || $unserialized !== false) {
            return $unserialized;
        }

        return $value;
    }
}

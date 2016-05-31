<?php

namespace Ft6k\Bundle\WpDoctrineBundle\Entity\Base;

use DateTime, DateTimeZone;

/**
 * Trait for entities that store both server-local and GMT dates.
 */
trait DoubleDatedTrait
{
    /**
     * Get the current DateTime, either local or GMT.
     *
     * @param   bool  $gmt
     * @return  DateTime
     */
    public function now($gmt = false)
    {
        return new DateTime(null, $gmt ? new DateTimeZone('GMT') : null);
    }
}

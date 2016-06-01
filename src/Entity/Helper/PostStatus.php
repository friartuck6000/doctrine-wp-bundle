<?php

namespace Ft6k\Bundle\WpDoctrineBundle\Entity\Helper;


/**
 * This helper class defines the built-in statuses WordPress uses for posts.
 *
 * @author  Kyle Tucker <kyleatucker@gmail.com>
 */
class PostStatus
{
    const PUBLISH    = 'publish';
    const FUTURE     = 'future';
    const DRAFT      = 'draft';
    const PENDING    = 'pending';
    const PRIVATE_   = 'private';
    const TRASH      = 'trash';
    const AUTO_DRAFT = 'auto-draft';
    const INHERIT    = 'inherit';

    /**
     * Get the status constants defined above as an array.
     *
     * @return  array
     */
    public static function getDefined()
    {
        $reflector = new \ReflectionClass(get_called_class());

        return $reflector->getConstants();
    }
}

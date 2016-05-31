<?php

namespace Ft6k\Bundle\WpDoctrineBundle\EventListener;

use Doctrine\Common\Persistence\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Mapping\ClassMetadataInfo;


/**
 * This event listener prepends the configured WP table prefix to the appropriate
 * entity mapping definitions.
 *
 * @author  Kyle Tucker <kyleatucker@gmail.com>
 */
class MappingListener
{
    /** @var  string */
    protected $prefix;

    /**
     * @param  string  $prefix
     */
    public function __construct($prefix)
    {
        $this->prefix = $prefix;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Adjusts the entity mapping metadata.
     *
     * @param  LoadClassMetadataEventArgs  $args
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $args)
    {
        // Get the name of the class being mapped
        /** @var ClassMetadataInfo $meta */
        $meta = $args->getClassMetadata();
        $entityClass = $meta->getName();

        if (in_array($entityClass, $this->getEntityList())) {
            // Prepend the table prefix
            $meta->setPrimaryTable(['name' => $this->prefix . $meta->getTableName()]);
        }
    }

    /**
     * Get the list of entity classes that should have the prefix added.
     *
     * @return  array
     */
    protected function getEntityList()
    {
        return [];
    }
}

<?php

namespace Ft6k\Bundle\WpDoctrineBundle\EntityRepository;

use Ft6k\Bundle\WpDoctrineBundle\Entity\Post;
use Ft6k\Bundle\WpDoctrineBundle\Entity\TermRelationship;
use Rb\Specification\Doctrine\SpecificationRepository;


/**
 * @author  Kyle Tucker <kyleatucker@gmail.com>
 */
class TermRelationshipRepository extends SpecificationRepository
{
    /**
     * Find the terms related to the given post.
     *
     * @param   Post  $post
     * @return  TermRelationship[]
     */
    public function findByPost(Post $post)
    {
        return $this->findBy([
            'objectId' => $post->getId(),
        ]);
    }
}

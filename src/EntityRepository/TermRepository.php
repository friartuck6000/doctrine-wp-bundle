<?php

namespace Ft6k\Bundle\WpDoctrineBundle\EntityRepository;

use Ft6k\Bundle\WpDoctrineBundle\Entity\Term;
use Rb\Specification\Doctrine\SpecificationRepository;


/**
 * @author  Kyle Tucker <kyleatucker@gmail.com>
 */
class TermRepository extends SpecificationRepository
{
    /**
     * Get the parent of the given term.
     *
     * @param   Term  $term
     * @return  Term|null
     */
    public function getParentTerm(Term $term)
    {
        $taxonomy = $term->getTaxonomy();
        if ($taxonomy && $taxonomy->getParentTermId() !== 0) {
            return $this->find($taxonomy->getParentTermId());
        }

        return null;
    }
}

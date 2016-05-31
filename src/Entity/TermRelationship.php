<?php

namespace Ft6k\Bundle\WpDoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TermRelationship
 *
 * @ORM\Entity()
 * @ORM\Table(name="term_relationships", indexes={
 *   @ORM\Index(name="term_taxonomy_id", columns={"term_taxonomy_id"})
 * })
 */
class TermRelationship
{
    /**
     * @var  int
     *
     * @ORM\Column(name="term_order", type="integer", nullable=false)
     */
    protected $termOrder = 0;

    /**
     * @var  int
     *
     * @ORM\Column(name="object_id", type="bigint", nullable=false)
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $objectId;

    /**
     * @var  int
     *
     * @ORM\Column(name="term_taxonomy_id", type="bigint", nullable=false)
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="NONE")
     */
    protected $termTaxonomyId;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return  int
     */
    public function getTermOrder()
    {
        return $this->termOrder;
    }

    /**
     * @return  int
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * @return  int
     */
    public function getTermTaxonomyId()
    {
        return $this->termTaxonomyId;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param   int  $termOrder
     * @return  $this
     */
    public function setTermOrder($termOrder = 0)
    {
        $this->termOrder = $termOrder;

        return $this;
    }

    /**
     * @param   int|Post  $object
     * @return  $this
     */
    public function setObjectId($object = 0)
    {
        if ($object instanceof Post) {
            $this->objectId = $object->getId();
        } else {
            $this->objectId = (int) $object;
        }

        return $this;
    }

    /**
     * @param   int|TermTaxonomy  $termTaxonomy
     * @return  $this
     */
    public function setTermTaxonomyId($termTaxonomy = 0)
    {
        if ($termTaxonomy instanceof TermTaxonomy) {
            $this->termTaxonomyId = $termTaxonomy->getId();
        } else {
            $this->termTaxonomyId = (int) $termTaxonomy;
        }

        return $this;
    }
}

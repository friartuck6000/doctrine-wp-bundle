<?php

namespace Ft6k\Bundle\WpDoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TermRelationship
 *
 * @ORM\Entity(repositoryClass="Rb\Specification\Doctrine\SpecificationRepository")
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
     * @var  TermTaxonomy
     *
     * @ORM\ManyToOne(targetEntity="TermTaxonomy", inversedBy="relationships")
     * @ORM\JoinColumn(name="term_taxonomy_id", referencedColumnName="term_taxonomy_id", onDelete="CASCADE", nullable=false)
     * @ORM\Id()
     */
    protected $termTaxonomy;

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
     * @return  TermTaxonomy
     */
    public function getTermTaxonomy()
    {
        return $this->termTaxonomy;
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
     * @param   TermTaxonomy  $termTaxonomy
     * @return  $this
     */
    public function setTermTaxonomy(TermTaxonomy $termTaxonomy = null)
    {
        $this->termTaxonomy = $termTaxonomy;

        return $this;
    }
}

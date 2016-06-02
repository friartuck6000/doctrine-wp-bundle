<?php

namespace Ft6k\Bundle\WpDoctrineBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TermTaxonomy
 *
 * @ORM\Entity(repositoryClass="Rb\Specification\Doctrine\SpecificationRepository")
 * @ORM\Table(name="term_taxonomy", uniqueConstraints={
 *   @ORM\UniqueConstraint(name="term_id_taxonomy", columns={"term_id", "taxonomy"}
 * )}, indexes={
 *   @ORM\Index(name="taxonomy", columns={"taxonomy"})
 * })
 */
class TermTaxonomy
{
    /**
     * @var  int
     *
     * @ORM\Column(name="term_taxonomy_id", type="bigint")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var  string
     *
     * @ORM\Column(name="taxonomy", type="string", length=32, nullable=false)
     */
    protected $taxonomy;

    /**
     * @var  string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    protected $description;

    /**
     * @var  int
     *
     * @ORM\Column(name="count", type="bigint", nullable=false)
     */
    protected $count = 0;

    /**
     * @var  Term
     *
     * @ORM\OneToOne(targetEntity="Term", inversedBy="taxonomy")
     * @ORM\JoinColumn(name="term_id", referencedColumnName="term_id", nullable=false)
     */
    protected $term;

    /**
     * @var  int
     *
     * @ORM\Column(name="parent", type="bigint", nullable=false)
     */
    protected $parentTermId;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var  ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="TermRelationship", mappedBy="termTaxonomy", cascade={"all"})
     */
    protected $relationships;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return  int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return  string
     */
    public function getTaxonomy()
    {
        return $this->taxonomy;
    }

    /**
     * @return  string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return  int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return  Term
     */
    public function getTerm()
    {
        return $this->term;
    }

    /**
     * @return  int
     */
    public function getParentTermId()
    {
        return $this->parentTermId;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param   string  $taxonomy
     * @return  $this
     */
    public function setTaxonomy($taxonomy)
    {
        $this->taxonomy = $taxonomy;

        return $this;
    }

    /**
     * @param   string  $description
     * @return  $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param   int  $count
     * @return  $this
     */
    public function setCount($count = -1)
    {
        if ($count === -1) {
            $this->count++;
        } else {
            $this->count = $count;
        }

        return $this;
    }

    /**
     * @param   Term  $term
     * @return  $this
     */
    public function setTerm(Term $term = null)
    {
        $this->term = $term;

        return $this;
    }

    /**
     * @param   int|Term  $parentTerm
     * @return  $this
     */
    public function setParentTerm($parentTerm = 0)
    {
        if ($parentTerm instanceof Term) {
            $this->parentTermId = $parentTerm->getId();
        } else {
            $this->parentTermId = (int) $parentTerm;
        }

        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @return  ArrayCollection
     */
    public function getRelationships()
    {
        return $this->relationships;
    }

    /**
     * @param  TermRelationship  $relationship
     * @return  $this
     */
    public function addRelationship(TermRelationship $relationship)
    {
        if (!$this->relationships->contains($relationship)) {
            $this->relationships->add($relationship);
            $relationship->setTermTaxonomy($this);
        }

        return $this;
    }

    /**
     * @param   TermRelationship  $relationship
     * @return  $this
     */
    public function removeRelationship(TermRelationship $relationship)
    {
        $this->relationships->removeElement($relationship);
        $relationship->setTermTaxonomy(null);

        return $this;
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function __construct()
    {
        $this->relationships = new ArrayCollection();
    }
}

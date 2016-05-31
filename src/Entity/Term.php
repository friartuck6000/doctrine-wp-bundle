<?php

namespace Ft6k\Bundle\WpDoctrineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Term
 *
 * @ORM\Entity()
 * @ORM\Table(name="terms", indexes={
 *   @ORM\Index(name="name", columns={"name"}),
 *   @ORM\Index(name="slug", columns={"slug"})
 * })
 */
class Term
{
    /**
     * @var  int
     *
     * @ORM\Column(name="term_id", type="bigint")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected  $id;

    /**
     * @var  string
     *
     * @ORM\Column(name="name", type="string", length=200, nullable=false)
     */
    protected $name;

    /**
     * @var  string
     *
     * @ORM\Column(name="slug", type="string", length=200, nullable=false)
     */
    protected $slug;

    /**
     * @var integer
     *
     * @ORM\Column(name="term_group", type="bigint", nullable=false)
     */
    protected $termGroup = 0;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var  TermTaxonomy
     *
     * @ORM\OneToOne(targetEntity="TermTaxonomy", mappedBy="term", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $taxonomy;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return  string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return  int
     */
    public function getTermGroup()
    {
        return $this->termGroup;
    }

    /**
     * @return  TermTaxonomy
     */
    public function getTaxonomy()
    {
        return $this->taxonomy;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @param   string  $name
     * @return  $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param   string  $slug
     * @return  $this
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @param   int  $termGroup
     * @return  $this
     */
    public function setTermGroup($termGroup = 0)
    {
        $this->termGroup = $termGroup;

        return $this;
    }

    /**
     * @param   TermTaxonomy  $taxonomy
     * @return  $this
     */
    public function setTaxonomy(TermTaxonomy $taxonomy = null)
    {
        $this->taxonomy = $taxonomy;
        $taxonomy->setTerm($this);

        return $this;
    }
}

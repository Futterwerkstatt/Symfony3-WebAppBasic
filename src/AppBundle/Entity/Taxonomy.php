<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TaxonomyTerm
 *
 * @ORM\Table(name="taxonomy")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaxonomyTermRepository")
 */
class Taxonomy {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="TaxonomyTerm", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="TaxonomyTerm", mappedBy="parent")
     * @ORM\OrderBy({"order" = "ASC"})
     */
    private $children;

    /**
     * @ORM\OneToOne(targetEntity="Taxonomy")
     * @ORM\JoinColumn(name="taxonomy_id", referencedColumnName="id")
     */
    private $taxonomy;

    public function __construct() {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
        $this->children = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return TaxonomyTerm
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return TaxonomyTerm
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return TaxonomyTerm
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return TaxonomyTerm
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set parent
     *
     * @param string $parent
     *
     * @return TaxonomyTerm
     */
    public function setParent($parent) {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return string
     */
    public function getParent() {
        return $this->parent;
    }


    /**
     * Add child
     *
     * @param \AppBundle\Entity\TaxonomyTerm $child
     *
     * @return TaxonomyTerm
     */
    public function addChild(\AppBundle\Entity\TaxonomyTerm $child)
    {
        $this->children[] = $child;

        return $this;
    }

    /**
     * Remove child
     *
     * @param \AppBundle\Entity\TaxonomyTerm $child
     */
    public function removeChild(\AppBundle\Entity\TaxonomyTerm $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set taxonomy
     *
     * @param \AppBundle\Entity\Taxonomy $taxonomy
     *
     * @return TaxonomyTerm
     */
    public function setTaxonomy(\AppBundle\Entity\Taxonomy $taxonomy = null)
    {
        $this->taxonomy = $taxonomy;

        return $this;
    }

    /**
     * Get taxonomy
     *
     * @return \AppBundle\Entity\Taxonomy
     */
    public function getTaxonomy()
    {
        return $this->taxonomy;
    }
}
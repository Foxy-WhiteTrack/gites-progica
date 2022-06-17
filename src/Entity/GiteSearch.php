<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


class GiteSearch
{

    /**
     * @var ArrayCollection
     *
     */
    private $equipement;

    public function __construct()
    {
        $this->equipement = new ArrayCollection();
    }

    /**
     * @var int|null
     * @Assert\Range(
     *          min=30,
     *          max=500,
     *          minMessage="La valeur minimum est de {{ min }} m²",
     *          maxMessage="La valeur maximum est de {{ max }} m²"
     * )
     */
    private $minSurface;

    /**
     * @var int|null
     */
    private $minChambre;

    /**
     * @var int|null
     */
    private $minCouchage;


    /**
     * Get the value of minSurface
     */
    public function getMinSurface(): ?int
    {
        return $this->minSurface;
    }

    /**
     * Set the value of minSurface
     *
     * @return  self
     */
    public function setMinSurface($minSurface)
    {
        $this->minSurface = $minSurface;

        return $this;
    }

    /**
     * Get the value of minChambre
     */
    public function getMinChambre(): ?int
    {
        return $this->minChambre;
    }

    /**
     * Set the value of minChambre
     *
     * @return  self
     */
    public function setMinChambre($minChambre)
    {
        $this->minChambre = $minChambre;

        return $this;
    }

    /**
     * Get the value of minCouchage
     */
    public function getMinCouchage()
    {
        return $this->minCouchage;
    }

    /**
     * Set the value of minCouchage
     *
     * @return  self
     */
    public function setMinCouchage($minCouchage)
    {
        $this->minCouchage = $minCouchage;

        return $this;
    }

    /**
     * Get the value of equipement
     * @return ArrayCollection
     */
    public function getEquipement(): ArrayCollection
    {
        return $this->equipement;
    }

    /**
     * Set the value of equipement
     *
     * @param ArrayCollection $equipement
     */
    public function setEquipement(ArrayCollection $equipement): void
    {
        $this->equipement = $equipement;
    }
}

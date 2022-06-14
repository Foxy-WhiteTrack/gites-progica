<?php

namespace App\Entity;

use App\Repository\GiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GiteRepository::class)
 */
class Gite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner un nom")
     * @Assert\Length(
     *      min=5,
     *      max=30,
     *      minMessage= "Le nom doit avoir au moins {{ limit }} caractères",
     *      maxMessage = "Le nom doit avoir au maximum {{ limit }} caractères")
     */
    private string $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Merci de renseigner une description")
     * @Assert\Length(
     *      min=5,
     *      max=30,
     *      minMessage= "La description doit avoir au moins {{ limit }} caractères",
     *      maxMessage = "La description doit avoir au maximum {{ limit }} caractères")
     */
    private string $description;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Merci de renseigner une surface")
     * @Assert\Range(
     *      min=30,
     *      max=300,
     *      notInRangeMessage = "La surface doit être comprise entre {{ min }} et {{ max }} m2")
     */
    private int $surface;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Merci de renseigner un nombre de chambre")
     */
    private int $chambre;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank(message="Merci de renseigner un nombre de couchage")
     */
    private $couchage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getChambre(): ?int
    {
        return $this->chambre;
    }

    public function setChambre(int $chambre): self
    {
        $this->chambre = $chambre;

        return $this;
    }

    public function getCouchage(): ?int
    {
        return $this->couchage;
    }

    public function setCouchage(int $couchage): self
    {
        $this->couchage = $couchage;

        return $this;
    }
}

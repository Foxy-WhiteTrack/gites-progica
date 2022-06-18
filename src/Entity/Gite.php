<?php

namespace App\Entity;

use App\Repository\GiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     *      min=10,
     *      max=255,
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

    /**
     * @ORM\ManyToMany(targetEntity=Equipement::class, inversedBy="gites")
     */
    private $equipements;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="gites")
     */
    private $user;

    /**
     * @ORM\Column(type="boolean")
     */
    private $animaux;

    /**
     * @ORM\Column(type="float")
     */
    private $tarifAnimaux;

    /**
     * @ORM\Column(type="float")
     */
    private $tarifHauteSaison;

    /**
     * @ORM\Column(type="float")
     */
    private $tarifBasseSaison;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    public function __construct()
    {
        $this->equipements = new ArrayCollection();
    }



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

    /**
     * @return Collection<int, Equipement>
     */
    public function getEquipements(): Collection
    {
        return $this->equipements;
    }

    public function addEquipement(Equipement $equipement): self
    {
        if (!$this->equipements->contains($equipement)) {
            $this->equipements[] = $equipement;
        }

        return $this;
    }

    public function removeEquipement(Equipement $equipement): self
    {
        $this->equipements->removeElement($equipement);

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function isAnimaux(): ?bool
    {
        return $this->animaux;
    }

    public function setAnimaux(bool $animaux): self
    {
        $this->animaux = $animaux;

        return $this;
    }

    public function getTarifAnimaux(): ?float
    {
        return $this->tarifAnimaux;
    }

    public function setTarifAnimaux(float $tarifAnimaux): self
    {
        if ($tarifAnimaux = null) {
            $tarifAnimaux = 0;
        }
        $this->tarifAnimaux = $tarifAnimaux;
        return $this;
    }

    public function getTarifHauteSaison(): ?float
    {
        return $this->tarifHauteSaison;
    }

    public function setTarifHauteSaison(float $tarifHauteSaison): self
    {
        $this->tarifHauteSaison = $tarifHauteSaison;

        return $this;
    }

    public function getTarifBasseSaison(): ?float
    {
        return $this->tarifBasseSaison;
    }

    public function setTarifBasseSaison(float $tarifBasseSaison): self
    {
        $this->tarifBasseSaison = $tarifBasseSaison;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
}

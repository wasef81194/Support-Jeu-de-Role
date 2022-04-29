<?php

namespace App\Entity;

use App\Repository\AttributAmelioresRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AttributAmelioresRepository::class)
 */
class AttributAmeliores
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $corps;

    /**
     * @ORM\Column(type="integer")
     */
    private $coeur;

    /**
     * @ORM\Column(type="integer")
     */
    private $esprit;

    /**
     * @ORM\OneToOne(targetEntity=Personnage::class, inversedBy="attributAmeliores", cascade={"persist", "remove"})
     */
    private $personnage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCorps(): ?int
    {
        return $this->corps;
    }

    public function setCorps(int $corps): self
    {
        $this->corps = $corps;

        return $this;
    }

    public function getCoeur(): ?int
    {
        return $this->coeur;
    }

    public function setCoeur(int $coeur): self
    {
        $this->coeur = $coeur;

        return $this;
    }

    public function getEsprit(): ?int
    {
        return $this->esprit;
    }

    public function setEsprit(int $esprit): self
    {
        $this->esprit = $esprit;

        return $this;
    }

    public function getPersonnage(): ?Personnage
    {
        return $this->personnage;
    }

    public function setPersonnage(?Personnage $personnage): self
    {
        $this->personnage = $personnage;

        return $this;
    }
}

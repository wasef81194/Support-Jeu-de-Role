<?php

namespace App\Entity;

use App\Repository\ArmesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArmesRepository::class)
 */
class Armes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $arme;

    /**
     * @ORM\Column(type="integer")
     */
    private $competence;

    /**
     * @ORM\ManyToOne(targetEntity=Personnage::class, inversedBy="arme")
     */
    private $personnage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArme(): ?string
    {
        return $this->arme;
    }

    public function setArme(string $arme): self
    {
        $this->arme = $arme;

        return $this;
    }

    public function getCompetence(): ?int
    {
        return $this->competence;
    }

    public function setCompetence(int $competence): self
    {
        $this->competence = $competence;

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

<?php

namespace App\Entity;

use App\Repository\AmitieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AmitieRepository::class)
 */
class Amitie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="amities")
     */
    private $Ami1;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="amities")
     */
    private $Ami2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmi1(): ?User
    {
        return $this->Ami1;
    }

    public function setAmi1(?User $Ami1): self
    {
        $this->Ami1 = $Ami1;

        return $this;
    }

    public function getAmi2(): ?User
    {
        return $this->Ami2;
    }

    public function setAmi2(?User $Ami2): self
    {
        $this->Ami2 = $Ami2;

        return $this;
    }
}

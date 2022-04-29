<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\ManyToMany(targetEntity=Partie::class, mappedBy="joueurs")
     */
    private $parties;

    /**
     * @ORM\OneToMany(targetEntity=Personnage::class, mappedBy="joueur")
     */
    private $personnages;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $pseudo;

    /**
     * @ORM\OneToMany(targetEntity=Amitie::class, mappedBy="Ami1")
     */
    private $amities;



    public function __construct()
    {
        $this->parties = new ArrayCollection();
        $this->personnages = new ArrayCollection();
        $this->amities = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, Partie>
     */
    public function getParties(): Collection
    {
        return $this->parties;
    }

    public function addParty(Partie $party): self
    {
        if (!$this->parties->contains($party)) {
            $this->parties[] = $party;
            $party->addJoueur($this);
        }

        return $this;
    }

    public function removeParty(Partie $party): self
    {
        if ($this->parties->removeElement($party)) {
            $party->removeJoueur($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Personnage>
     */
    public function getPersos(): Collection
    {
        return $this->persos;
    }

    public function addPerso(Personnage $perso): self
    {
        if (!$this->persos->contains($perso)) {
            $this->persos[] = $perso;
            $perso->setUser($this);
        }

        return $this;
    }

    public function removePerso(Personnage $perso): self
    {
        if ($this->persos->removeElement($perso)) {
            // set the owning side to null (unless already changed)
            if ($perso->getUser() === $this) {
                $perso->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Personnage>
     */
    public function getPersonnages(): Collection
    {
        return $this->personnages;
    }

    public function addPersonnage(Personnage $personnage): self
    {
        if (!$this->personnages->contains($personnage)) {
            $this->personnages[] = $personnage;
            $personnage->setJoueur($this);
        }

        return $this;
    }

    public function removePersonnage(Personnage $personnage): self
    {
        if ($this->personnages->removeElement($personnage)) {
            // set the owning side to null (unless already changed)
            if ($personnage->getJoueur() === $this) {
                $personnage->setJoueur(null);
            }
        }

        return $this;
    }
    
    public function __toString()
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * @return Collection<int, Amitie>
     */
    public function getAmities(): Collection
    {
        return $this->amities;
    }

    public function addAmity1(Amitie $amity): self
    {
        if (!$this->amities->contains($amity)) {
            $this->amities[] = $amity;
            $amity->setAmi1($this);
        }
        return $this;
    }
    public function addAmity2(Amitie $amity): self
    {
        if (!$this->amities->contains($amity)) {
            $this->amities[] = $amity;
            $amity->setAmi2($this);
        }
        return $this;
    }

    public function removeAmity1(Amitie $amity): self
    {
        if ($this->amities->removeElement($amity)) {
            // set the owning side to null (unless already changed)
            if ($amity->getAmi1() === $this) {
                $amity->setAmi1(null);
            }
        }

        return $this;
    }
    public function removeAmity2(Amitie $amity): self
    {
        if ($this->amities->removeElement($amity)) {
            // set the owning side to null (unless already changed)
            if ($amity->getAmi1() === $this) {
                $amity->setAmi1(null);
            }
        }

        return $this;
    }

}

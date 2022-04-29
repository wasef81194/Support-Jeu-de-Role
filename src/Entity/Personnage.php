<?php

namespace App\Entity;

use App\Repository\PersonnageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PersonnageRepository::class)
 */
class Personnage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    private $nom;

    /****************************** PARTIE CLASSE ******************************/

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $classe; 
    
    /**
     * @ORM\Column(type="array")
     */
    private $specialite = [];
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $standard_de_vie;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $avantage_culturel;

    /**
     *@ORM\Column(type="integer")
     */
    private $Admiration;

    /**
     *@ORM\Column(type="integer")
     */
    private $Athletisme;

    /**
     *@ORM\Column(type="integer")
     */
    private $Conscience;

    /**
     *@ORM\Column(type="integer")
     */
    private $Exploration;

    /**
     *@ORM\Column(type="integer")
     */
    private $Chant;

    /**
     *@ORM\Column(type="integer")
     */
    private $Artisanat;

    /**
     *@ORM\Column(type="integer")
     */
    private $Inspiration;

    /**
     *@ORM\Column(type="integer")
     */
    private $Voyage;

    /**
     *@ORM\Column(type="integer")
     */
    private $Perspicacite;

    /**
     *@ORM\Column(type="integer")
     */
    private $Guerison;

    /**
    *@ORM\Column(type="integer")
     */
    private $Courtoisie;

    /**
     *@ORM\Column(type="integer")
     */
    private $Combat;

    /**
    *@ORM\Column(type="integer")
     */
    private $Persuasion;

    /**
    *@ORM\Column(type="integer")
     */
    private $Furtivite;

    /**
    *@ORM\Column(type="integer")
     */
    private $Fouille;

    /**
    *@ORM\Column(type="integer")
     */
    private $Chasse;

    /**
     *@ORM\Column(type="integer")
     */
    private $Enigmes;

    /**
    *@ORM\Column(type="integer")
     */
    private $Conaissances;

   /****************************** PARTIE CLASSE ******************************/

   /****************************** PARTIE ORIGINE ******************************/
   /**
     * @ORM\Column(type="string", length=255)
     */
    private $origine;

     /**
     * @ORM\Column(type="array")
     */
    private $particularite = [];

    /**
     * @ORM\Column(type="integer")
     */
    private $coeur;

    /**
     * @ORM\Column(type="integer")
     */
    private $corps;

    /**
     * @ORM\Column(type="integer")
     */
    private $esprit;


    /****************************** PARTIE ORIGINE ******************************/


    /****************************** PARTIE VOCATION ******************************/

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vocation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $competence_favorite;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $competences_favorites_vocation;

     /**
     * @ORM\Column(type="string", length=255)
     */
    private $part_ombre;

      /**
     * @ORM\Column(type="string", length=255)
     */
    private $traits;

    /**
     * @ORM\OneToMany(targetEntity=Armes::class, mappedBy="personnage")
     */
    private $arme;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="personnages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $joueur;

    /**
     * @ORM\OneToOne(targetEntity=AttributAmeliores::class, mappedBy="personnage", cascade={"persist", "remove"})
     */
    
    private $attributAmeliores;
    /**
     * @ORM\ManyToMany(targetEntity=Partie::class, inversedBy="personnages")
     */
    private $partie;

    /**
     * @ORM\Column(type="integer")
     */
    private $espoir;

    /**
     * @ORM\Column(type="integer")
     */
    private $endurance;

    /**
     * @ORM\Column(type="integer")
     */
    private $vaillance;

    /**
     * @ORM\Column(type="integer")
     */
    private $sagesse;

    /**
     * @ORM\OneToMany(targetEntity=Vertus::class, mappedBy="personnage")
     */
    private $vertus;

    /**
     * @ORM\OneToMany(targetEntity=Recompence::class, mappedBy="personnage")
     */
    private $recompences;

   

    /****************************** PARTIE VOCATION ******************************/


    public function __construct()
    {
        $this->traits = new ArrayCollection();
        $this->vertus = new ArrayCollection();
        $this->recompenses = new ArrayCollection();
        $this->arme = new ArrayCollection();
        $this->partie = new ArrayCollection();
        $this->recompences = new ArrayCollection();
        
       
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

    public function getCorps(): ?int
    {
        return $this->corps;
    }

    public function setCorps(int $corps): self
    {
        $this->corps = $corps;

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

    public function getStandardDeVie(): ?string
    {
        return $this->standard_de_vie;
    }

    public function setStandardDeVie(string $standard_de_vie): self
    {
        $this->standard_de_vie = $standard_de_vie;

        return $this;
    }


    public function getVocation():  ?string
    {
        return $this->vocation;
    }

    public function setVocation(?string $vocation): self
    {
        $this->vocation = $vocation;

        return $this;
    }
    
    public function getOrigine(): ?string
    {
        return $this->origine;
    }

    public function setOrigine(string $origine): self
    {
        $this->origine = $origine;

        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getAvantageCulturel(): ?string
    {
        return $this->avantage_culturel;
    }

    public function setAvantageCulturel(string $avantage_culturel): self
    {
        $this->avantage_culturel = $avantage_culturel;

        return $this;
    }


    public function getSpecialite(): ?array
    {
        return $this->specialite;
    }

    public function setSpecialite(array $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getParticularite(): ?array
    {
        return $this->particularite;
    }

    public function setParticularite(array $particularite): self
    {
        $this->particularite = $particularite;

        return $this;
    }

    public function getAdmiration(): ?int
    {
        return $this->Admiration;
    }

    public function setAdmiration(string $Admiration): self
    {
        $this->Admiration = $Admiration;

        return $this;
    }

    public function getAthletisme(): ?string
    {
        return $this->Athletisme;
    }

    public function setAthletisme(string $Athletisme): self
    {
        $this->Athletisme = $Athletisme;

        return $this;
    }

    public function getConscience(): ?int
    {
        return $this->Conscience;
    }

    public function setConscience(string $Conscience): self
    {
        $this->Conscience = $Conscience;

        return $this;
    }

    public function getExploration(): ?int
    {
        return $this->Exploration;
    }

    public function setExploration(string $Exploration): self
    {
        $this->Exploration = $Exploration;

        return $this;
    }

    public function getChant(): ?int
    {
        return $this->Chant;
    }

    public function setChant(string $Chant): self
    {
        $this->Chant = $Chant;

        return $this;
    }

    public function getArtisanat(): ?string
    {
        return $this->Artisanat;
    }

    public function setArtisanat(string $Artisanat): self
    {
        $this->Artisanat = $Artisanat;

        return $this;
    }

    public function getInspiration(): ?int
    {
        return $this->Inspiration;
    }

    public function setInspiration(string $Inspiration): self
    {
        $this->Inspiration = $Inspiration;

        return $this;
    }

    public function getVoyage(): ?int
    {
        return $this->Voyage;
    }

    public function setVoyage(string $Voyage): self
    {
        $this->Voyage = $Voyage;

        return $this;
    }

    public function getPerspicacite(): ?int
    {
        return $this->Perspicacite;
    }

    public function setPerspicacite(string $Perspicacite): self
    {
        $this->Perspicacite = $Perspicacite;

        return $this;
    }

    public function getGuerison(): ?int
    {
        return $this->Guerison;
    }

    public function setGuerison(string $Guerison): self
    {
        $this->Guerison = $Guerison;

        return $this;
    }

    public function getCourtoisie(): ?string
    {
        return $this->Courtoisie;
    }

    public function setCourtoisie(string $Courtoisie): self
    {
        $this->Courtoisie = $Courtoisie;

        return $this;
    }

    public function getCombat(): ?string
    {
        return $this->Combat;
    }

    public function setCombat(string $Combat): self
    {
        $this->Combat = $Combat;

        return $this;
    }

    public function getPersuasion(): ?int
    {
        return $this->Persuasion;
    }

    public function setPersuasion(string $Persuasion): self
    {
        $this->Persuasion = $Persuasion;

        return $this;
    }

    public function getFurtivite(): ?int
    {
        return $this->Furtivite;
    }

    public function setFurtivite(string $Furtivite): self
    {
        $this->Furtivite = $Furtivite;

        return $this;
    }

    public function getFouille(): ?int
    {
        return $this->Fouille;
    }

    public function setFouille(string $Fouille): self
    {
        $this->Fouille = $Fouille;

        return $this;
    }

    public function getChasse(): ?int
    {
        return $this->Chasse;
    }

    public function setChasse(string $Chasse): self
    {
        $this->Chasse = $Chasse;

        return $this;
    }

    public function getEnigmes(): ?int
    {
        return $this->Enigmes;
    }

    public function setEnigmes(string $Enigmes): self
    {
        $this->Enigmes = $Enigmes;

        return $this;
    }

    public function getConaissances(): ?int
    {
        return $this->Conaissances;
    }

    public function setConaissances(string $Conaissances): self
    {
        $this->Conaissances = $Conaissances;

        return $this;
    }

    public function getCompetenceFavorite(): ?string
    {
        return $this->competence_favorite;
    }

    public function setCompetenceFavorite(string $competence_favorite): self
    {
        $this->competence_favorite = $competence_favorite;

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

    public function getCompetencesFavoritesVocation(): ?string
    {
        return $this->competences_favorites_vocation;
    }

    public function setCompetencesFavoritesVocation(?string $competences_favorites_vocation): self
    {
        $this->competences_favorites_vocation = $competences_favorites_vocation;

        return $this;
    }

    public function getTraits(): ?string
    {
        return $this->traits;
    }

    public function setTraits(?string $traits): self
    {
        $this->traits = $traits;

        return $this;
    }

    public function getPartOmbre(): ?string
    {
        return $this->part_ombre;
    }

    public function setPartOmbre(?string $part_ombre): self
    {
        $this->part_ombre = $part_ombre;

        return $this;
    }

    /**
     * @return Collection<int, Armes>
     */
    public function getArme(): Collection
    {
        return $this->arme;
    }

    public function addArme(Armes $arme): self
    {
        if (!$this->arme->contains($arme)) {
            $this->arme[] = $arme;
            $arme->setPersonnage($this);
        }

        return $this;
    }

    public function removeArme(Armes $arme): self
    {
        if ($this->arme->removeElement($arme)) {
            // set the owning side to null (unless already changed)
            if ($arme->getPersonnage() === $this) {
                $arme->setPersonnage(null);
            }
        }

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

    public function getJoueur(): ?User
    {
        return $this->joueur;
    }

    public function setJoueur(?User $joueur): self
    {
        $this->joueur = $joueur;

        return $this;
    }

    /**
     * @return Collection<int, Partie>
     */
    public function getPartie(): Collection
    {
        return $this->partie;
    }

    public function addPartie(Partie $partie): self
    {
        if (!$this->partie->contains($partie)) {
            $this->partie[] = $partie;
        }

        return $this;
    }

    public function removePartie(Partie $partie): self
    {
        $this->partie->removeElement($partie);

        return $this;
    }

    public function getAttributAmeliores(): ?AttributAmeliores
    {
        return $this->attributAmeliores;
    }

    public function setAttributAmeliores(?AttributAmeliores $attributAmeliores): self
    {
        // unset the owning side of the relation if necessary
        if ($attributAmeliores === null && $this->attributAmeliores !== null) {
            $this->attributAmeliores->setPersonnage(null);
        }

        // set the owning side of the relation if necessary
        if ($attributAmeliores !== null && $attributAmeliores->getPersonnage() !== $this) {
            $attributAmeliores->setPersonnage($this);
        }

        $this->attributAmeliores = $attributAmeliores;

        return $this;
    }

    public function getEspoir(): ?int
    {
        return $this->espoir;
    }

    public function setEspoir(int $espoir): self
    {
        $this->espoir = $espoir;

        return $this;
    }

    public function getEndurance(): ?int
    {
        return $this->endurance;
    }

    public function setEndurance(int $endurance): self
    {
        $this->endurance = $endurance;

        return $this;
    }

    public function getVaillance(): ?int
    {
        return $this->vaillance;
    }

    public function setVaillance(int $vaillance): self
    {
        $this->vaillance = $vaillance;

        return $this;
    }

    public function getSagesse(): ?int
    {
        return $this->sagesse;
    }

    public function setSagesse(int $sagesse): self
    {
        $this->sagesse = $sagesse;

        return $this;
    }

    /**
     * @return Collection<int, Vertus>
     */
    public function getVertus(): Collection
    {
        return $this->vertus;
    }

    public function addVertu(Vertus $vertu): self
    {
        if (!$this->vertus->contains($vertu)) {
            $this->vertus[] = $vertu;
            $vertu->setPersonnage($this);
        }

        return $this;
    }

    public function removeVertu(Vertus $vertu): self
    {
        if ($this->vertus->removeElement($vertu)) {
            // set the owning side to null (unless already changed)
            if ($vertu->getPersonnage() === $this) {
                $vertu->setPersonnage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Recompence>
     */
    public function getRecompences(): Collection
    {
        return $this->recompences;
    }

    public function addRecompence(Recompence $recompence): self
    {
        if (!$this->recompences->contains($recompence)) {
            $this->recompences[] = $recompence;
            $recompence->setPersonnage($this);
        }

        return $this;
    }

    public function removeRecompence(Recompence $recompence): self
    {
        if ($this->recompences->removeElement($recompence)) {
            // set the owning side to null (unless already changed)
            if ($recompence->getPersonnage() === $this) {
                $recompence->setPersonnage(null);
            }
        }

        return $this;
    }
}

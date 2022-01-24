<?php

namespace App\Entity;

use App\Repository\BibliothequeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BibliothequeRepository::class)]
class Bibliotheque {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\OneToMany(mappedBy: 'bibliotheque', targetEntity: livre::class)]
    private $livres;

    public function __construct() {
        $this->livres = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getNom(): ?string {
        return $this->nom;
    }

    public function setNom(string $nom): self {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|livre[]
     */
    public function getLivres(): Collection {
        return $this->livres;
    }

    public function addLivre(livre $livre): self {
        if (!$this->livres->contains($livre)) {
            $this->livres[] = $livre;
            $livre->setBibliotheque($this);
        }

        return $this;
    }

    public function removeLivre(livre $livre): self {
        if ($this->livres->removeElement($livre)) {
            // set the owning side to null (unless already changed)
            if ($livre->getBibliotheque() === $this) {
                $livre->setBibliotheque(null);
            }
        }

        return $this;
    }
}

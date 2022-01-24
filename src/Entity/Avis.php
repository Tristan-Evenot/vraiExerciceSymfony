<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $note;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $commentaire;

    #[ORM\ManyToOne(targetEntity: livre::class, inversedBy: 'avis')]
    private $livre;

    public function getId(): ?int {
        return $this->id;
    }

    public function getNote(): ?int {
        return $this->note;
    }

    public function setNote(int $note): self {
        $this->note = $note;

        return $this;
    }

    public function getCommentaire(): ?string {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getLivre(): ?livre {
        return $this->livre;
    }

    public function setLivre(?livre $livre): self {
        $this->livre = $livre;

        return $this;
    }
}

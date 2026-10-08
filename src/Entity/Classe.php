<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'classe')]
#[ORM\UniqueConstraint(name: 'uq_classe_nom', columns: ['nom_classe'])]
class Classe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_classe')]
    private ?int $id = null;

    #[ORM\Column(name: 'nom_classe', length: 20)]
    private ?string $nomClasse = null;

    #[ORM\Column(length: 20)]
    private ?string $niveau = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomClasse(): ?string
    {
        return $this->nomClasse;
    }

    public function setNomClasse(string $nomClasse): static
    {
        $this->nomClasse = $nomClasse;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }
}

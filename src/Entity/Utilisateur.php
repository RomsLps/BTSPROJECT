<?php

namespace App\Entity;

use App\Enum\RoleUtilisateur;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'utilisateur')]
#[ORM\UniqueConstraint(name: 'uq_utilisateur_email', columns: ['email'])]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_utilisateur')]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    // Mot de passe HASHÉ (jamais en clair)
    #[ORM\Column(name: 'mdp_hash', length: 255)]
    private ?string $mdpHash = null;

    #[ORM\Column(length: 20, enumType: RoleUtilisateur::class)]
    private ?RoleUtilisateur $role = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getMdpHash(): ?string
    {
        return $this->mdpHash;
    }

    public function setMdpHash(string $mdpHash): static
    {
        $this->mdpHash = $mdpHash;

        return $this;
    }

    public function getRole(): ?RoleUtilisateur
    {
        return $this->role;
    }

    public function setRole(RoleUtilisateur $role): static
    {
        $this->role = $role;

        return $this;
    }
}

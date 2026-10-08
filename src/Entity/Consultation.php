<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'consultation')]
#[ORM\Index(name: 'idx_consultation_eleve', columns: ['id_eleve'])]
class Consultation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_consultation')]
    private ?int $id = null;

    #[ORM\Column(name: 'date_heure_consultation', type: Types::DATETIME_IMMUTABLE)]
    private ?\DateTimeImmutable $dateHeureConsultation = null;

    #[ORM\Column(options: ['default' => true])]
    private bool $autorisee = true;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'id_utilisateur', referencedColumnName: 'id_utilisateur', nullable: false, onDelete: 'RESTRICT')]
    private ?Utilisateur $utilisateur = null;

    #[ORM\ManyToOne(targetEntity: Eleve::class)]
    #[ORM\JoinColumn(name: 'id_eleve', referencedColumnName: 'id_eleve', nullable: false, onDelete: 'RESTRICT')]
    private ?Eleve $eleve = null;

    public function __construct()
    {
        $this->dateHeureConsultation = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeureConsultation(): ?\DateTimeImmutable
    {
        return $this->dateHeureConsultation;
    }

    public function setDateHeureConsultation(\DateTimeImmutable $dateHeureConsultation): static
    {
        $this->dateHeureConsultation = $dateHeureConsultation;

        return $this;
    }

    public function isAutorisee(): ?bool
    {
        return $this->autorisee;
    }

    public function setAutorisee(bool $autorisee): static
    {
        $this->autorisee = $autorisee;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getEleve(): ?Eleve
    {
        return $this->eleve;
    }

    public function setEleve(?Eleve $eleve): static
    {
        $this->eleve = $eleve;

        return $this;
    }
}

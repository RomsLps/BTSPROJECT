<?php

namespace App\Entity;

use App\Enum\StatutPresence;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'presence')]
#[ORM\UniqueConstraint(name: 'uq_presence_appel_eleve', columns: ['id_appel', 'id_eleve'])]
#[ORM\Index(name: 'idx_presence_statut', columns: ['statut'])]
class Presence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_presence')]
    private ?int $id = null;

    #[ORM\Column(length: 10, enumType: StatutPresence::class)]
    private ?StatutPresence $statut = null;

    // en minutes, si retard
    #[ORM\Column(name: 'duree_retard', type: Types::SMALLINT, nullable: true)]
    private ?int $dureeRetard = null;

    // null tant que la vie scolaire n'a pas qualifié l'absence
    #[ORM\Column(nullable: true)]
    private ?bool $justifie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $motif = null;

    #[ORM\Column(name: 'date_qualification', type: Types::DATETIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $dateQualification = null;

    #[ORM\ManyToOne(targetEntity: Appel::class)]
    #[ORM\JoinColumn(name: 'id_appel', referencedColumnName: 'id_appel', nullable: false, onDelete: 'RESTRICT')]
    private ?Appel $appel = null;

    #[ORM\ManyToOne(targetEntity: Eleve::class)]
    #[ORM\JoinColumn(name: 'id_eleve', referencedColumnName: 'id_eleve', nullable: false, onDelete: 'RESTRICT')]
    private ?Eleve $eleve = null;

    #[ORM\ManyToOne(targetEntity: Utilisateur::class)]
    #[ORM\JoinColumn(name: 'id_utilisateur_qualifiant', referencedColumnName: 'id_utilisateur', nullable: true, onDelete: 'SET NULL')]
    private ?Utilisateur $qualifiant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatut(): ?StatutPresence
    {
        return $this->statut;
    }

    public function setStatut(StatutPresence $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDureeRetard(): ?int
    {
        return $this->dureeRetard;
    }

    public function setDureeRetard(?int $dureeRetard): static
    {
        $this->dureeRetard = $dureeRetard;

        return $this;
    }

    public function isJustifie(): ?bool
    {
        return $this->justifie;
    }

    public function setJustifie(?bool $justifie): static
    {
        $this->justifie = $justifie;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(?string $motif): static
    {
        $this->motif = $motif;

        return $this;
    }

    public function getDateQualification(): ?\DateTimeImmutable
    {
        return $this->dateQualification;
    }

    public function setDateQualification(?\DateTimeImmutable $dateQualification): static
    {
        $this->dateQualification = $dateQualification;

        return $this;
    }

    public function getAppel(): ?Appel
    {
        return $this->appel;
    }

    public function setAppel(?Appel $appel): static
    {
        $this->appel = $appel;

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

    public function getQualifiant(): ?Utilisateur
    {
        return $this->qualifiant;
    }

    public function setQualifiant(?Utilisateur $qualifiant): static
    {
        $this->qualifiant = $qualifiant;

        return $this;
    }
}

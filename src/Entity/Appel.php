<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'appel')]
#[ORM\UniqueConstraint(name: 'uq_appel_creneau_date', columns: ['id_creneau', 'date_appel'])]
#[ORM\Index(name: 'idx_appel_date', columns: ['date_appel'])]
class Appel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id_appel')]
    private ?int $id = null;

    #[ORM\Column(name: 'date_appel', type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $dateAppel = null;

    #[ORM\Column(name: 'horodatage_validation', type: Types::DATETIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $horodatageValidation = null;

    #[ORM\Column(options: ['default' => false])]
    private bool $verrouille = false;

    #[ORM\ManyToOne(targetEntity: Creneau::class)]
    #[ORM\JoinColumn(name: 'id_creneau', referencedColumnName: 'id_creneau', nullable: false, onDelete: 'RESTRICT')]
    private ?Creneau $creneau = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateAppel(): ?\DateTimeImmutable
    {
        return $this->dateAppel;
    }

    public function setDateAppel(\DateTimeImmutable $dateAppel): static
    {
        $this->dateAppel = $dateAppel;

        return $this;
    }

    public function getHorodatageValidation(): ?\DateTimeImmutable
    {
        return $this->horodatageValidation;
    }

    public function setHorodatageValidation(?\DateTimeImmutable $horodatageValidation): static
    {
        $this->horodatageValidation = $horodatageValidation;

        return $this;
    }

    public function isVerrouille(): ?bool
    {
        return $this->verrouille;
    }

    public function setVerrouille(bool $verrouille): static
    {
        $this->verrouille = $verrouille;

        return $this;
    }

    public function getCreneau(): ?Creneau
    {
        return $this->creneau;
    }

    public function setCreneau(?Creneau $creneau): static
    {
        $this->creneau = $creneau;

        return $this;
    }
}

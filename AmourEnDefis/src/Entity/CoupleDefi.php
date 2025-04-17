<?php

namespace App\Entity;

use App\Repository\CoupleDefiRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoupleDefiRepository::class)]
class CoupleDefi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'participations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Couple $couple = null;

    #[ORM\ManyToOne(inversedBy: 'participations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Defis $defi = null;

    #[ORM\Column]
    private ?float $noteFinale = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateParticipation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commentaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCouple(): ?Couple
    {
        return $this->couple;
    }

    public function setCouple(?Couple $couple): static
    {
        $this->couple = $couple;

        return $this;
    }

    public function getDefi(): ?Defis
    {
        return $this->defi;
    }

    public function setDefi(?Defis $defi): static
    {
        $this->defi = $defi;

        return $this;
    }

    public function getNoteFinale(): ?float
    {
        return $this->noteFinale;
    }

    public function setNoteFinale(float $noteFinale): static
    {
        $this->noteFinale = $noteFinale;

        return $this;
    }

    public function getDateParticipation(): ?\DateTimeInterface
    {
        return $this->dateParticipation;
    }

    public function setDateParticipation(\DateTimeInterface $dateParticipation): static
    {
        $this->dateParticipation = $dateParticipation;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}

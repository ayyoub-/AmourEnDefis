<?php

namespace App\Entity;

use App\Repository\CoupleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CoupleRepository::class)]
class Couple
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?User $homme = null;

    #[ORM\ManyToOne]
    private ?User $femme = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\OneToMany(mappedBy: 'couple', targetEntity: CoupleDefi::class)]
    private ?CoupleDefi $participations;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHomme(): ?User
    {
        return $this->homme;
    }

    public function setHomme(?User $homme): static
    {
        $this->homme = $homme;

        return $this;
    }

    public function getFemme(): ?User
    {
        return $this->femme;
    }

    public function setFemme(?User $femme): static
    {
        $this->femme = $femme;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getParticipations()
    {
        return $this->participations;
    }

    public function setParticipations($participations): self
    {
        $this->participations = $participations;

        return $this;
    }
}

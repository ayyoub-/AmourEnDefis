<?php

namespace App\Entity;

use App\Repository\DefisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DefisRepository::class)]
class Defis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'defis')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CategorieDefi $categorie = null;

    #[ORM\OneToMany(mappedBy: 'defi', targetEntity: CoupleDefi::class)]
    private Collection $participations;

    public function __construct()
    {
        $this->participations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCategorie(): ?CategorieDefi
    {
        return $this->categorie;
    }

    public function setCategorie(?CategorieDefi $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getParticipations(): ?CoupleDefi
    {
        return $this->participations;
    }

    public function setParticipations(?CoupleDefi $participations): self
    {
        $this->participations = $participations;

        return $this;
    }
}

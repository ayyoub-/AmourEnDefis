<?php

namespace App\Entity;

use App\Repository\CategorieDefiRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieDefiRepository::class)]
class CategorieDefi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\OneToMany(targetEntity: Defis::class, mappedBy: 'categorie', orphanRemoval: true)]
    private Collection $defis;

    public function __construct()
    {
        $this->defis = new ArrayCollection();
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

    /**
     * @return Collection<int, Defis>
     */
    public function getDefis(): Collection
    {
        return $this->defis;
    }

    public function addDefi(Defis $defi): static
    {
        if (!$this->defis->contains($defi)) {
            $this->defis->add($defi);
            $defi->setCategorie($this);
        }

        return $this;
    }

    public function removeDefi(Defis $defi): static
    {
        if ($this->defis->removeElement($defi)) {
            // set the owning side to null (unless already changed)
            if ($defi->getCategorie() === $this) {
                $defi->setCategorie(null);
            }
        }

        return $this;
    }
}

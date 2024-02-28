<?php

namespace App\Entity;

use App\Repository\CategorysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorysRepository::class)]
class Categorys
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:2,max:50)]
    private ?string $categorie = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Propertys::class)]
    private Collection $propertys;

    public function __construct()
    {
        $this->propertys = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection<int, Propertys>
     */
    public function getPropertys(): Collection
    {
        return $this->propertys;
    }

    public function addProperty(Propertys $property): static
    {
        if (!$this->propertys->contains($property)) {
            $this->propertys->add($property);
            $property->setCategory($this);
        }

        return $this;
    }

    public function removeProperty(Propertys $property): static
    {
        if ($this->propertys->removeElement($property)) {
            // set the owning side to null (unless already changed)
            if ($property->getCategory() === $this) {
                $property->setCategory(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
      return $this->categorie;
        
    }
}

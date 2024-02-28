<?php

namespace App\Entity;

use App\Repository\TypePropertyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypePropertyRepository::class)]
class TypeProperty
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:2,max:50)]
    private ?string $type_property = null;

    #[ORM\OneToMany(mappedBy: 'typeproperty', targetEntity: Propertys::class)]
    private Collection $propertys;

    public function __construct()
    {
        $this->propertys = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeProperty(): ?string
    {
        return $this->type_property;
    }

    public function setTypeProperty(string $type_property): static
    {
        $this->type_property = $type_property;

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
            $property->setTypeproperty($this);
        }

        return $this;
    }

    public function removeProperty(Propertys $property): static
    {
        if ($this->propertys->removeElement($property)) {
            // set the owning side to null (unless already changed)
            if ($property->getTypeproperty() === $this) {
                $property->setTypeproperty(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
      
        return $this->type_property;
      
    }
}

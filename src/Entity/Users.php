<?php

namespace App\Entity;

use DateTimeImmutable;
use App\Entity\Propertys;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UsersRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;


#[UniqueEntity('email')]
#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

   #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:2,max:50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:2,max:50)]
    private ?string $prenom = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank()]
    #[Assert\Length(min:2,max:50)]
    private ?string $telephone_portable = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $telephone_fixe = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $site_web = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $ville = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $code_postale = null;

     #[ORM\Column(length:100, nullable: true)]
     private ?string $entreprise = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    private array $roles = ['ROLE_USER'];

    private ?string $plainPassword=null;


    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

   #[ORM\Column]
    private ?DateTimeImmutable $createdAt = null;
    
 #[ORM\OneToMany(mappedBy: 'user', targetEntity: Propertys::class)]
    private Collection $propertys;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\ManyToMany(targetEntity: Promotions::class, mappedBy: 'user')]
    private Collection $promotions;
    

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
        $this->propertys = new ArrayCollection();
        $this->promotions = new ArrayCollection();
  
    
    }

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

    /**
     * Get the value of telephone_portable
     *
     * @return ?string
     */
    public function getTelephonePortable(): ?string
    {
        return $this->telephone_portable;
    }

    /**
     * Set the value of telephone_portable
     *
     * @param ?string $telephone_portable
     *
     * @return static
     */
    public function setTelephonePortable(?string $telephone_portable): static
    {
        $this->telephone_portable = $telephone_portable;

        return $this;
    }

    /**
     * Get the value of telephone_fixe
     *
     * @return ?string
     */
    public function getTelephoneFixe(): ?string
    {
        return $this->telephone_fixe;
    }

    /**
     * Set the value of telephone_fixe
     *
     * @param ?string $telephone_fixe
     *
     * @return static
     */
    public function setTelephoneFixe(?string $telephone_fixe): static
    {
        $this->telephone_fixe = $telephone_fixe;

        return $this;
    }

    /**
     * Get the value of site_web
     *
     * @return ?string
     */
    public function getSiteWeb(): ?string
    {
        return $this->site_web;
    }

    /**
     * Set the value of site_web
     *
     * @param ?string $site_web
     *
     * @return static
     */
    public function setSiteWeb(?string $site_web): static
    {
        $this->site_web = $site_web;

        return $this;
    }

    /**
     * Get the value of adresse
     *
     * @return ?string
     */
    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @param ?string $adresse
     *
     * @return static
     */
    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of ville
     *
     * @return ?string
     */
    public function getVille(): ?string
    {
        return $this->ville;
    }

    /**
     * Set the value of ville
     *
     * @param ?string $ville
     *
     * @return static
     */
    public function setVille(?string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of code_postale
     *
     * @return ?string
     */
    public function getCodePostale(): ?string
    {
        return $this->code_postale;
    }

    /**
     * Set the value of code_postale
     *
     * @param ?string $code_postale
     *
     * @return static
     */
    public function setCodePostale(?string $code_postale): static
    {
        $this->code_postale = $code_postale;

        return $this;
    }

     /**
      * Get the value of entreprise
      *
      * @return ?string
      */
     public function getEntreprise(): ?string
     {
          return $this->entreprise;
     }

     /**
      * Set the value of entreprise
      *
      * @param ?string $entreprise
      *
      * @return static
      */
     public function setEntreprise(?string $entreprise): static
     {
          $this->entreprise = $entreprise;

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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * Get the value of plainPassword
     *
     * @return ?string
     */
    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    /**
     * Set the value of plainPassword
     *
     * @param ?string $plainPassword
     *
     * @return self
     */
    public function setPlainPassword(?string $plainPassword): self
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    /**
     * Get the value of createdAt
     *
     * @return ?DateTimeImmutable
     */
    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @param ?DateTimeImmutable $createdAt
     *
     * @return static
     */
    public function setCreatedAt(?DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

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
            $property->setUser($this);
        }

        return $this;
    }

    public function removeProperty(Propertys $property): static
    {
        if ($this->propertys->removeElement($property)) {
            // set the owning side to null (unless already changed)
            if ($property->getUser() === $this) {
                $property->setUser(null);
            }
        }

        return $this;
    }

  
    public function __toString(): string
    {
      return $this->email;
       
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * @return Collection<int, Promotions>
     */
    public function getPromotions(): Collection
    {
        return $this->promotions;
    }

    public function addPromotion(Promotions $promotion): static
    {
        if (!$this->promotions->contains($promotion)) {
            $this->promotions->add($promotion);
            $promotion->addUser($this);
        }

        return $this;
    }

    public function removePromotion(Promotions $promotion): static
    {
        if ($this->promotions->removeElement($promotion)) {
            $promotion->removeUser($this);
        }

        return $this;
    }
}

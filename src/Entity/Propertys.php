<?php

namespace App\Entity;

use App\Entity\Users;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PropertysRepository;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: PropertysRepository::class)]
class Propertys
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nreference = null;

     #[ORM\Column]
    private ?float $surface = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?int $chambres = null;

    #[ORM\Column]
    private ?int $salle_bains = null;

    #[ORM\Column]
    private ?int $etages = null;

    #[ORM\Column]
    private ?int $numero_etage = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\Column(length: 50)]
    private ?string $code_postale = null;

    #[ORM\Column(length: 100)]
    private ?string $region = null;

    #[ORM\Column(nullable: true)]
    private ?bool $internet = null;

    #[ORM\Column(nullable: true)]
    private ?bool $balcon = null;

    #[ORM\Column(nullable: true)]
    private ?bool $garage = null;

    #[ORM\Column(nullable: true)]
    private ?bool $salle_sport = null;

    #[ORM\Column(nullable: true)]
    private ?bool $piscine = null;

    #[ORM\Column(nullable: true)]
    private ?bool $camera_surveillance = null;

    #[Vich\UploadableField(mapping: 'propertys', fileNameProperty: 'imageName')]
 private ?File $imageFile = null;

 #[ORM\Column(type:'string', nullable: true)]
 private ?string $imageName = null;


    #[ORM\Column]
    private ?DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'propertys',targetEntity:Users::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $user = null;

    /*#[ORM\ManyToOne(inversedBy: 'propertys')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorys $category = null;

    #[ORM\ManyToOne(inversedBy: 'propertys')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeProperty $typeproperty = null;*/

    public function __construct()
    {
        $this->createdAt=new \DateTimeImmutable();
        $this->updatedAt=new \DateTimeImmutable();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNreference(): ?string
    {
        return $this->nreference;
    }

    public function setNreference(string $nreference): static
    {
        $this->nreference = $nreference;

        return $this;
    }
    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(float $surface): static
    {
        $this->surface = $surface;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getChambres(): ?int
    {
        return $this->chambres;
    }

    public function setChambres(int $chambres): static
    {
        $this->chambres = $chambres;

        return $this;
    }

    public function getSalleBains(): ?int
    {
        return $this->salle_bains;
    }

    public function setSalleBains(int $salle_bains): static
    {
        $this->salle_bains = $salle_bains;

        return $this;
    }

    public function getEtages(): ?int
    {
        return $this->etages;
    }

    public function setEtages(int $etages): static
    {
        $this->etages = $etages;

        return $this;
    }

    public function getNumeroEtage(): ?int
    {
        return $this->numero_etage;
    }

    public function setNumeroEtage(int $numero_etage): static
    {
        $this->numero_etage = $numero_etage;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostale(): ?string
    {
        return $this->code_postale;
    }

    public function setCodePostale(string $code_postale): static
    {
        $this->code_postale = $code_postale;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function isInternet(): ?bool
    {
        return $this->internet;
    }

    public function setInternet(?bool $internet): static
    {
        $this->internet = $internet;

        return $this;
    }

    public function isBalcon(): ?bool
    {
        return $this->balcon;
    }

    public function setBalcon(?bool $balcon): static
    {
        $this->balcon = $balcon;

        return $this;
    }

    public function isGarage(): ?bool
    {
        return $this->garage;
    }

    public function setGarage(?bool $garage): static
    {
        $this->garage = $garage;

        return $this;
    }

    public function isSalleSport(): ?bool
    {
        return $this->salle_sport;
    }

    public function setSalleSport(?bool $salle_sport): static
    {
        $this->salle_sport = $salle_sport;

        return $this;
    }

    public function isPiscine(): ?bool
    {
        return $this->piscine;
    }

    public function setPiscine(?bool $piscine): static
    {
        $this->piscine = $piscine;

        return $this;
    }

    public function isCameraSurveillance(): ?bool
    {
        return $this->camera_surveillance;
    }

    public function setCameraSurveillance(?bool $camera_surveillance): static
    {
        $this->camera_surveillance = $camera_surveillance;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getCategory(): ?Categorys
    {
        return $this->category;
    }

    public function setCategory(?Categorys $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getTypeproperty(): ?TypeProperty
    {
        return $this->typeproperty;
    }

    public function setTypeproperty(?TypeProperty $typeproperty): static
    {
        $this->typeproperty = $typeproperty;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

}

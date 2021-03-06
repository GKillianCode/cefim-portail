<?php

namespace App\Entity;

use App\Repository\PromotionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PromotionRepository::class)
 */
class Promotion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity=Filiere::class, inversedBy="id_promo")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_filiere;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIdFiliere(): ?Filiere
    {
        return $this->id_filiere;
    }

    public function setIdFiliere(?Filiere $id_filiere): self
    {
        $this->id_filiere = $id_filiere;

        return $this;
    }
}

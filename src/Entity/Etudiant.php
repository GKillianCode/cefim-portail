<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 */
class Etudiant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Promotion::class, inversedBy="etudiant", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idPromotion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPromotion(): ?Promotion
    {
        return $this->idPromotion;
    }

    public function setIdPromotion(Promotion $idPromotion): self
    {
        $this->idPromotion = $idPromotion;

        return $this;
    }
}

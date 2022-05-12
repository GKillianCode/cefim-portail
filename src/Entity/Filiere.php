<?php

namespace App\Entity;

use App\Repository\FiliereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FiliereRepository::class)
 */
class Filiere
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
     * @ORM\OneToMany(targetEntity=Promotion::class, mappedBy="id_filiere", orphanRemoval=true)
     */
    private $id_promo;

    public function __construct()
    {
        $this->id_promo = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Promotion>
     */
    public function getIdPromo(): Collection
    {
        return $this->id_promo;
    }

    public function addIdPromo(Promotion $idPromo): self
    {
        if (!$this->id_promo->contains($idPromo)) {
            $this->id_promo[] = $idPromo;
            $idPromo->setIdFiliere($this);
        }

        return $this;
    }

    public function removeIdPromo(Promotion $idPromo): self
    {
        if ($this->id_promo->removeElement($idPromo)) {
            // set the owning side to null (unless already changed)
            if ($idPromo->getIdFiliere() === $this) {
                $idPromo->setIdFiliere(null);
            }
        }

        return $this;
    }
}

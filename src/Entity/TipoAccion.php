<?php

namespace App\Entity;

use App\Repository\TipoAccionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TipoAccionRepository::class)
 */
class TipoAccion
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
    private $tipo;

    /**
     * @ORM\OneToMany(targetEntity=Rasgo::class, mappedBy="tipoaccion")
     */
    private $rasgos;

    public function __construct()
    {
        $this->rasgos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * @return Collection|Rasgo[]
     */
    public function getRasgos(): Collection
    {
        return $this->rasgos;
    }

    public function addRasgo(Rasgo $rasgo): self
    {
        if (!$this->rasgos->contains($rasgo)) {
            $this->rasgos[] = $rasgo;
            $rasgo->setTipoaccion($this);
        }

        return $this;
    }

    public function removeRasgo(Rasgo $rasgo): self
    {
        if ($this->rasgos->removeElement($rasgo)) {
            // set the owning side to null (unless already changed)
            if ($rasgo->getTipoaccion() === $this) {
                $rasgo->setTipoaccion(null);
            }
        }

        return $this;
    }
}

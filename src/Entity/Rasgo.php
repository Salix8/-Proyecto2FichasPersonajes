<?php

namespace App\Entity;

use App\Repository\RasgoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\BrowserKit\Response;

/**
 * @ORM\Entity(repositoryClass=RasgoRepository::class)
 */
class Rasgo
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
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity=TipoAccion::class, inversedBy="rasgos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tipoaccion;

    /**
     * @ORM\OneToMany(targetEntity=Personaje::class, mappedBy="rasgoPersonaje")
     */
    private $personajes;

    /**
     * @ORM\ManyToOne(targetEntity=Personaje::class, inversedBy="rasgos")
     */
    private $rasgoPersonaje;

    /**
     * @ORM\ManyToOne(targetEntity=Personaje::class, inversedBy="rasgo")
     */
    private $personaje;

    public function __construct()
    {
        $this->personajes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getTipoaccion(): ?TipoAccion
    {
        return $this->tipoaccion;
    }

    public function setTipoaccion(?TipoAccion $tipoaccion): self
    {
        $this->tipoaccion = $tipoaccion;

        return $this;
    }

    /**
     * @return Collection|Personaje[]
     */
    public function getPersonajes(): Collection
    {
        return $this->personajes;
    }

    public function addPersonaje(Personaje $personaje): self
    {
        if (!$this->personajes->contains($personaje)) {
            $this->personajes[] = $personaje;
            $personaje->setRasgoPersonaje($this);
        }

        return $this;
    }

    public function removePersonaje(Personaje $personaje): self
    {
        if ($this->personajes->removeElement($personaje)) {
            // set the owning side to null (unless already changed)
            if ($personaje->getRasgoPersonaje() === $this) {
                $personaje->setRasgoPersonaje(null);
            }
        }

        return $this;
    }

    public function getRasgoPersonaje(): ?Personaje
    {
        return $this->rasgoPersonaje;
    }

    public function setRasgoPersonaje(?Personaje $rasgoPersonaje): self
    {
        $this->rasgoPersonaje = $rasgoPersonaje;

        return $this;
    }

    public function getPersonaje(): ?Personaje
    {
        return $this->personaje;
    }

    public function setPersonaje(?Personaje $personaje): self
    {
        $this->personaje = $personaje;

        return $this;
    }
}

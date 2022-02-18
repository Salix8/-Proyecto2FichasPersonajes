<?php

namespace App\Entity;

use App\Repository\PersonajeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonajeRepository::class)
 */
class Personaje
{

    const clases = ['Artificiero', 'Bárbaro', 'Bardo', 'Clérigo', 'Druida', 'Guerrero', 'Monje', 'Místico', 'Paladín', 'Explorador', 'Pícaro', 'Hechicero', 'Brujo', 'Mago' ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * (message="El nombre es obligatorio")
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * (message="El raza es obligatorio")
     */
    private $raza;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Choice(choices=Personaje::clases, message="Tienes que elegir uno de estos valores {{ choices }}")
     */
    private $clase;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      notInRangeMessage = "El nivel no puede ser menor de {{ min }} ni myor de {{ max }}")
     */
    private $nivel;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      notInRangeMessage = "La fuerza no puede ser menor de {{ min }} ni myor de {{ max }}")
     */
    private $fuerza;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      notInRangeMessage = "La destreza no puede ser menor de {{ min }} ni myor de {{ max }}")
     */
    private $destreza;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      notInRangeMessage = "La constitucion no puede ser menor de {{ min }} ni myor de {{ max }}")
     */
    private $constitucion;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      notInRangeMessage = "La inteligencia no puede ser menor de {{ min }} ni myor de {{ max }}")
     */
    private $inteligencia;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      notInRangeMessage = "La sabiduria no puede ser menor de {{ min }} ni myor de {{ max }}")
     */
    private $sabiduria;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     * @Assert\Range(
     *      min = 1,
     *      max = 20,
     *      notInRangeMessage = "El carisma no puede ser menor de {{ min }} ni myor de {{ max }}")
     */
    private $carisma;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $equipamiento;

    /**
     * @ORM\OneToMany(targetEntity=Rasgo::class, mappedBy="rasgoPersonaje")
     */
    private $rasgos;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="personajes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Rasgo::class, mappedBy="personaje")
     */
    private $rasgo;

    public function __construct()
    {
        $this->rasgos = new ArrayCollection();
        $this->rasgo = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getRaza(): ?string
    {
        return $this->raza;
    }

    public function setRaza(?string $raza): self
    {
        $this->raza = $raza;

        return $this;
    }

    public function getClase(): ?string
    {
        return $this->clase;
    }

    public function setClase(?string $clase): self
    {
        $this->clase = $clase;

        return $this;
    }

    public function getNivel(): ?int
    {
        return $this->nivel;
    }

    public function setNivel(?int $nivel): self
    {
        $this->nivel = $nivel;

        return $this;
    }

    public function getFuerza(): ?int
    {
        return $this->fuerza;
    }

    public function setFuerza(?int $fuerza): self
    {
        $this->fuerza = $fuerza;

        return $this;
    }

    public function getDestreza(): ?int
    {
        return $this->destreza;
    }

    public function setDestreza(?int $destreza): self
    {
        $this->destreza = $destreza;

        return $this;
    }

    public function getConstitucion(): ?int
    {
        return $this->constitucion;
    }

    public function setConstitucion(?int $constitucion): self
    {
        $this->constitucion = $constitucion;

        return $this;
    }

    public function getInteligencia(): ?int
    {
        return $this->inteligencia;
    }

    public function setInteligencia(?int $inteligencia): self
    {
        $this->inteligencia = $inteligencia;

        return $this;
    }

    public function getSabiduria(): ?int
    {
        return $this->sabiduria;
    }

    public function setSabiduria(?int $sabiduria): self
    {
        $this->sabiduria = $sabiduria;

        return $this;
    }

    public function getCarisma(): ?int
    {
        return $this->carisma;
    }

    public function setCarisma(?int $carisma): self
    {
        $this->carisma = $carisma;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getEquipamiento(): ?string
    {
        return $this->equipamiento;
    }

    public function setEquipamiento(?string $equipamiento): self
    {
        $this->equipamiento = $equipamiento;

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
            $rasgo->setRasgoPersonaje($this);
        }

        return $this;
    }

    public function removeRasgo(Rasgo $rasgo): self
    {
        if ($this->rasgos->removeElement($rasgo)) {
            // set the owning side to null (unless already changed)
            if ($rasgo->getRasgoPersonaje() === $this) {
                $rasgo->setRasgoPersonaje(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Rasgo[]
     */
    public function getRasgo(): Collection
    {
        return $this->rasgo;
    }

}

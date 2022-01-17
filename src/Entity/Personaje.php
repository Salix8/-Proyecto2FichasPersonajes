<?php

namespace App\Entity;

use App\Repository\PersonajeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonajeRepository::class)
 */
class Personaje
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
    private $raza;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $clase;

    /**
     * @ORM\Column(type="integer")
     */
    private $nivel;

    /**
     * @ORM\Column(type="integer")
     */
    private $fuerza;

    /**
     * @ORM\Column(type="integer")
     */
    private $destreza;

    /**
     * @ORM\Column(type="integer")
     */
    private $constitucion;

    /**
     * @ORM\Column(type="integer")
     */
    private $inteligencia;

    /**
     * @ORM\Column(type="integer")
     */
    private $sabiduria;

    /**
     * @ORM\Column(type="integer")
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
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="personajes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $autor;

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

    public function getRaza(): ?string
    {
        return $this->raza;
    }

    public function setRaza(string $raza): self
    {
        $this->raza = $raza;

        return $this;
    }

    public function getClase(): ?string
    {
        return $this->clase;
    }

    public function setClase(string $clase): self
    {
        $this->clase = $clase;

        return $this;
    }

    public function getNivel(): ?int
    {
        return $this->nivel;
    }

    public function setNivel(int $nivel): self
    {
        $this->nivel = $nivel;

        return $this;
    }

    public function getFuerza(): ?int
    {
        return $this->fuerza;
    }

    public function setFuerza(int $fuerza): self
    {
        $this->fuerza = $fuerza;

        return $this;
    }

    public function getDestreza(): ?int
    {
        return $this->destreza;
    }

    public function setDestreza(int $destreza): self
    {
        $this->destreza = $destreza;

        return $this;
    }

    public function getConstitucion(): ?int
    {
        return $this->constitucion;
    }

    public function setConstitucion(int $constitucion): self
    {
        $this->constitucion = $constitucion;

        return $this;
    }

    public function getInteligencia(): ?int
    {
        return $this->inteligencia;
    }

    public function setInteligencia(int $inteligencia): self
    {
        $this->inteligencia = $inteligencia;

        return $this;
    }

    public function getSabiduria(): ?int
    {
        return $this->sabiduria;
    }

    public function setSabiduria(int $sabiduria): self
    {
        $this->sabiduria = $sabiduria;

        return $this;
    }

    public function getCarisma(): ?int
    {
        return $this->carisma;
    }

    public function setCarisma(int $carisma): self
    {
        $this->carisma = $carisma;

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

    public function getEquipamiento(): ?string
    {
        return $this->equipamiento;
    }

    public function setEquipamiento(string $equipamiento): self
    {
        $this->equipamiento = $equipamiento;

        return $this;
    }

    public function getAutor(): ?Usuario
    {
        return $this->autor;
    }

    public function setAutor(?Usuario $autor): self
    {
        $this->autor = $autor;

        return $this;
    }

}

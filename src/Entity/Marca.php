<?php

namespace App\Entity;

use App\Repository\MarcaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MarcaRepository::class)
 */
class Marca
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
     * @ORM\OneToMany(targetEntity=Dispositivo::class, mappedBy="marca")
     */
    private $dispositivos;

    public function __construct()
    {
        $this->dispositivos = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->nombre;
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

    /**
     * @return Collection|Dispositivo[]
     */
    public function getDispositivos(): Collection
    {
        return $this->dispositivos;
    }

    public function addDispositivo(Dispositivo $dispositivo): self
    {
        if (!$this->dispositivos->contains($dispositivo)) {
            $this->dispositivos[] = $dispositivo;
            $dispositivo->setMarca($this);
        }

        return $this;
    }

    public function removeDispositivo(Dispositivo $dispositivo): self
    {
        if ($this->dispositivos->removeElement($dispositivo)) {
            // set the owning side to null (unless already changed)
            if ($dispositivo->getMarca() === $this) {
                $dispositivo->setMarca(null);
            }
        }

        return $this;
    }
}

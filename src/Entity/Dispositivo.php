<?php

namespace App\Entity;

use App\Repository\DispositivoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DispositivoRepository::class)
 */
class Dispositivo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $num_serie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modelo;

    /**
     * @ORM\ManyToOne(targetEntity=Marca::class, inversedBy="dispositivos")
     */
    private $marca;

    /**
     * @ORM\OneToMany(targetEntity=Contrato::class, mappedBy="dispositivo", orphanRemoval=true)
     */
    private $contratos;

    public function __construct()
    {
        $this->contratos = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->marca.' '.$this->modelo;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumSerie(): ?string
    {
        return $this->num_serie;
    }

    public function setNumSerie(?string $num_serie): self
    {
        $this->num_serie = $num_serie;

        return $this;
    }

    public function getModelo(): ?string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo): self
    {
        $this->modelo = $modelo;

        return $this;
    }

    public function getMarca(): ?Marca
    {
        return $this->marca;
    }

    public function setMarca(?Marca $marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * @return Collection|Contrato[]
     */
    public function getContratos(): Collection
    {
        return $this->contratos;
    }

    public function addContrato(Contrato $contrato): self
    {
        if (!$this->contratos->contains($contrato)) {
            $this->contratos[] = $contrato;
            $contrato->setDispositivo($this);
        }

        return $this;
    }

    public function removeContrato(Contrato $contrato): self
    {
        if ($this->contratos->removeElement($contrato)) {
            // set the owning side to null (unless already changed)
            if ($contrato->getDispositivo() === $this) {
                $contrato->setDispositivo(null);
            }
        }

        return $this;
    }
}

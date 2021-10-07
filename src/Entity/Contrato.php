<?php

namespace App\Entity;

use App\Repository\ContratoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContratoRepository::class)
 */
class Contrato
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
    private $codigo;

    /**
     * @ORM\ManyToOne(targetEntity=Cliente::class, inversedBy="contratos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cliente;

    /**
     * @ORM\ManyToOne(targetEntity=Dispositivo::class, inversedBy="contratos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dispositivo;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $periodicidad;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $millar_inicial;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $millar_actual;

    /**
     * @ORM\OneToMany(targetEntity=Revision::class, mappedBy="contrato", orphanRemoval=true)
     */
    private $revisions;

    public function __construct()
    {
        $this->revisions = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->codigo;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getDispositivo(): ?Dispositivo
    {
        return $this->dispositivo;
    }

    public function setDispositivo(?Dispositivo $dispositivo): self
    {
        $this->dispositivo = $dispositivo;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getPeriodicidad(): ?int
    {
        return $this->periodicidad;
    }

    public function setPeriodicidad(?int $periodicidad): self
    {
        $this->periodicidad = $periodicidad;

        return $this;
    }

    public function getMillarInicial(): ?string
    {
        return $this->millar_inicial;
    }

    public function setMillarInicial(?string $millar_inicial): self
    {
        $this->millar_inicial = $millar_inicial;

        return $this;
    }

    public function getMillarActual(): ?string
    {
        return $this->millar_actual;
    }

    public function setMillarActual(?string $millar_actual): self
    {
        $this->millar_actual = $millar_actual;

        return $this;
    }
    
    /**
     * @return Collection|Revision[]
     */
    public function getRevisions(): Collection
    {
        return $this->revisions;
    }

    public function addRevision(Revision $revision): self
    {
        if (!$this->revisions->contains($revision)) {
            $this->revisions[] = $revision;
            $revision->setContrato($this);
        }

        return $this;
    }

    public function removeRevision(Revision $revision): self
    {
        if ($this->revisions->removeElement($revision)) {
            // set the owning side to null (unless already changed)
            if ($revision->getContrato() === $this) {
                $revision->setContrato(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\RevisionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RevisionRepository::class)
 */
class Revision
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $albaran;

    /**
     * @ORM\Column(type="text")
     */
    private $descripcion;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $copias;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $toner_entregado;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $piezas_sustituidas;

    /**
     * @ORM\ManyToOne(targetEntity=Contrato::class, inversedBy="revisions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $contrato;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString(): string
    {
        return 'Rev. '.$this->contrato.' '.$this->fecha;
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

    public function getAlbaran(): ?string
    {
        return $this->albaran;
    }

    public function setAlbaran(string $albaran): self
    {
        $this->albaran = $albaran;

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

    public function getCopias(): ?int
    {
        return $this->copias;
    }

    public function setCopias(?int $copias): self
    {
        $this->copias = $copias;

        return $this;
    }

    public function getTonerEntregado(): ?string
    {
        return $this->toner_entregado;
    }

    public function setTonerEntregado(?string $toner_entregado): self
    {
        $this->toner_entregado = $toner_entregado;

        return $this;
    }

    public function getPiezasSustituidas(): ?string
    {
        return $this->piezas_sustituidas;
    }

    public function setPiezasSustituidas(?string $piezas_sustituidas): self
    {
        $this->piezas_sustituidas = $piezas_sustituidas;

        return $this;
    }

    public function getContrato(): ?Contrato
    {
        return $this->contrato;
    }

    public function setContrato(?Contrato $contrato): self
    {
        $this->contrato = $contrato;

        return $this;
    }
}

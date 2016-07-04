<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gestion
 *
 * @ORM\Table(name="gestion")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\GestionRepository")
 */
class Gestion
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idgestion", type="integer")
     */
    private $idgestion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=20)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ini", type="date")
     */
    private $fechaIni;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="date")
     */
    private $fechaFin;



    /**
     * Set idgestion
     *
     * @param integer $idgestion
     *
     * @return Gestion
     */
    public function setIdgestion($idgestion)
    {
        $this->idgestion = $idgestion;

        return $this;
    }

    /**
     * Get idgestion
     *
     * @return int
     */
    public function getIdgestion()
    {
        return $this->idgestion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Gestion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fechaIni
     *
     * @param \DateTime $fechaIni
     *
     * @return Gestion
     */
    public function setFechaIni($fechaIni)
    {
        $this->fechaIni = $fechaIni;

        return $this;
    }

    /**
     * Get fechaIni
     *
     * @return \DateTime
     */
    public function getFechaIni()
    {
        return $this->fechaIni;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     *
     * @return Gestion
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }
}


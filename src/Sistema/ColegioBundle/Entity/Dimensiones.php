<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dimensiones
 *
 * @ORM\Table(name="dimensiones")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\DimensionesRepository")
 */
class Dimensiones
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="iddimension", type="integer")
     */
    private $iddimension;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var float
     *
     * @ORM\Column(name="porcentaje", type="float")
     */
    private $porcentaje;
    

    /**
     * Set iddimension
     *
     * @param integer $iddimension
     *
     * @return Dimensiones
     */
    public function setIddimension($iddimension)
    {
        $this->iddimension = $iddimension;

        return $this;
    }

    /**
     * Get iddimension
     *
     * @return int
     */
    public function getIddimension()
    {
        return $this->iddimension;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Dimensiones
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
     * Set porcentaje
     *
     * @param float $porcentaje
     *
     * @return Dimensiones
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }

    /**
     * Get porcentaje
     *
     * @return float
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }
}


<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actividades
 *
 * @ORM\Table(name="actividades")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\ActividadesRepository")
 */
class Actividades
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idactividad", type="integer")
     */
    private $idactividad;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=200)
     */
    private $descripcion;


    /**
     * Set idactividad
     *
     * @param integer $idactividad
     *
     * @return Actividades
     */
    public function setIdactividad($idactividad)
    {
        $this->idactividad = $idactividad;

        return $this;
    }

    /**
     * Get idactividad
     *
     * @return int
     */
    public function getIdactividad()
    {
        return $this->idactividad;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Actividades
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
}


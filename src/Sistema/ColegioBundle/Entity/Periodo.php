<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Periodo
 *
 * @ORM\Table(name="periodo")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\PeriodoRepository")
 */
class Periodo
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idperiodo", type="integer")
     */
    private $idperiodo;

    /**
     * @var int
     *
     * @ORM\Column(name="idgestion", type="integer")
     */
    private $idgestion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;
    
    

    /**
     * Set idperiodo
     *
     * @param integer $idperiodo
     *
     * @return Periodo
     */
    public function setIdperiodo($idperiodo)
    {
        $this->idperiodo = $idperiodo;

        return $this;
    }

    /**
     * Get idperiodo
     *
     * @return int
     */
    public function getIdperiodo()
    {
        return $this->idperiodo;
    }

    /**
     * Set idgestion
     *
     * @param integer $idgestion
     *
     * @return Periodo
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
     * @return Periodo
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


<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Materias
 *
 * @ORM\Table(name="materias")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\MateriasRepository")
 */
class Materias
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idmateria", type="integer")
     */
    private $idmateria;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_materia", type="string", length=10)
     */
    private $codMateria;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=31)
     */
    private $descripcion;

    /**
     * @var int
     *
     * @ORM\Column(name="idgrupo_materia", type="integer")
     */
    private $idgrupoMateria;


    /**
     * Set idmateria
     *
     * @param integer $idmateria
     *
     * @return Materias
     */
    public function setIdmateria($idmateria)
    {
        $this->idmateria = $idmateria;

        return $this;
    }

    /**
     * Get idmateria
     *
     * @return int
     */
    public function getIdmateria()
    {
        return $this->idmateria;
    }

    /**
     * Set codMateria
     *
     * @param string $codMateria
     *
     * @return Materias
     */
    public function setCodMateria($codMateria)
    {
        $this->codMateria = $codMateria;

        return $this;
    }

    /**
     * Get codMateria
     *
     * @return string
     */
    public function getCodMateria()
    {
        return $this->codMateria;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Materias
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
     * Set idgrupoMateria
     *
     * @param integer $idgrupoMateria
     *
     * @return Materias
     */
    public function setIdgrupoMateria($idgrupoMateria)
    {
        $this->idgrupoMateria = $idgrupoMateria;

        return $this;
    }

    /**
     * Get idgrupoMateria
     *
     * @return int
     */
    public function getIdgrupoMateria()
    {
        return $this->idgrupoMateria;
    }
}


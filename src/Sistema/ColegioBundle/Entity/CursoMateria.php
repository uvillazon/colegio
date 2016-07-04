<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CursoMateria
 *
 * @ORM\Table(name="curso_materia")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\CursoMateriaRepository")
 */
class CursoMateria
{
  
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idcurso_mat", type="integer")
     */
    private $idcursoMat;

    /**
     * @var int
     *
     * @ORM\Column(name="idges_curso", type="integer")
     */
    private $idgesCurso;

    /**
     * @var int
     *
     * @ORM\Column(name="idmateria", type="integer")
     */
    private $idmateria;

    /**
     * @var int
     *
     * @ORM\Column(name="idmaestro", type="integer")
     */
    private $idmaestro;


    /**
     * Set idcursoMat
     *
     * @param integer $idcursoMat
     *
     * @return CursoMateria
     */
    public function setIdcursoMat($idcursoMat)
    {
        $this->idcursoMat = $idcursoMat;

        return $this;
    }

    /**
     * Get idcursoMat
     *
     * @return int
     */
    public function getIdcursoMat()
    {
        return $this->idcursoMat;
    }

    /**
     * Set idgesCurso
     *
     * @param integer $idgesCurso
     *
     * @return CursoMateria
     */
    public function setIdgesCurso($idgesCurso)
    {
        $this->idgesCurso = $idgesCurso;

        return $this;
    }

    /**
     * Get idgesCurso
     *
     * @return int
     */
    public function getIdgesCurso()
    {
        return $this->idgesCurso;
    }

    /**
     * Set idmateria
     *
     * @param integer $idmateria
     *
     * @return CursoMateria
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
     * Set idmaestro
     *
     * @param integer $idmaestro
     *
     * @return CursoMateria
     */
    public function setIdmaestro($idmaestro)
    {
        $this->idmaestro = $idmaestro;

        return $this;
    }

    /**
     * Get idmaestro
     *
     * @return int
     */
    public function getIdmaestro()
    {
        return $this->idmaestro;
    }
}


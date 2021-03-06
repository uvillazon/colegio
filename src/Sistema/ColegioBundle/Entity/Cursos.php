<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cursos
 *
 * @ORM\Table(name="cursos")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\CursosRepository")
 */
class Cursos
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idcurso", type="integer")
     */
    private $idcurso;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_curso", type="string", length=10)
     */
    private $codCurso;

    /**
     * @var int
     *
     * @ORM\Column(name="grado", type="integer")
     */
    private $grado;

    /**
     * @var string
     *
     * @ORM\Column(name="paralelo", type="string", length=1)
     */
    private $paralelo;

    /**
     * @var string
     *
     * @ORM\Column(name="ciclo", type="string", length=10)
     */
    private $ciclo;

    /**
     * @var string
     *
     * @ORM\Column(name="turno", type="string", length=10)
     */
    private $turno;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="GesCurso", mappedBy="curso")
     */
    private $gesCurso;


    public function optimizar()
    {
        $this->gesCurso = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set idcurso
     *
     * @param integer $idcurso
     *
     * @return Cursos
     */
    public function setIdcurso($idcurso)
    {
        $this->idcurso = $idcurso;

        return $this;
    }

    /**
     * Get idcurso
     *
     * @return int
     */
    public function getIdcurso()
    {
        return $this->idcurso;
    }

    /**
     * Set codCurso
     *
     * @param string $codCurso
     *
     * @return Cursos
     */
    public function setCodCurso($codCurso)
    {
        $this->codCurso = $codCurso;

        return $this;
    }

    /**
     * Get codCurso
     *
     * @return string
     */
    public function getCodCurso()
    {
        return $this->codCurso;
    }

    /**
     * Set grado
     *
     * @param integer $grado
     *
     * @return Cursos
     */
    public function setGrado($grado)
    {
        $this->grado = $grado;

        return $this;
    }

    /**
     * Get grado
     *
     * @return int
     */
    public function getGrado()
    {
        return $this->grado;
    }

    /**
     * Set paralelo
     *
     * @param string $paralelo
     *
     * @return Cursos
     */
    public function setParalelo($paralelo)
    {
        $this->paralelo = $paralelo;

        return $this;
    }

    /**
     * Get paralelo
     *
     * @return string
     */
    public function getParalelo()
    {
        return $this->paralelo;
    }

    /**
     * Set ciclo
     *
     * @param string $ciclo
     *
     * @return Cursos
     */
    public function setCiclo($ciclo)
    {
        $this->ciclo = $ciclo;

        return $this;
    }

    /**
     * Get ciclo
     *
     * @return string
     */
    public function getCiclo()
    {
        return $this->ciclo;
    }

    /**
     * Set turno
     *
     * @param string $turno
     *
     * @return Cursos
     */
    public function setTurno($turno)
    {
        $this->turno = $turno;

        return $this;
    }

    /**
     * Get turno
     *
     * @return string
     */
    public function getTurno()
    {
        return $this->turno;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->gesCurso = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add gesCurso
     *
     * @param \Sistema\ColegioBundle\Entity\GesCurso $gesCurso
     *
     * @return Cursos
     */
    public function addGesCurso(\Sistema\ColegioBundle\Entity\GesCurso $gesCurso)
    {
        $this->gesCurso[] = $gesCurso;

        return $this;
    }

    /**
     * Remove gesCurso
     *
     * @param \Sistema\ColegioBundle\Entity\GesCurso $gesCurso
     */
    public function removeGesCurso(\Sistema\ColegioBundle\Entity\GesCurso $gesCurso)
    {
        $this->gesCurso->removeElement($gesCurso);
    }

    /**
     * Get gesCurso
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGesCurso()
    {
        return $this->gesCurso;
    }
}

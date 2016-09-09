<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CursoEvalDim
 *
 * @ORM\Table(name="curso_eval_dim")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\CursoEvalDimRepository")
 */
class CursoEvalDim
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idcurso_eval_dim", type="integer")
     */
    private $idcursoEvalDim;

    /**
     * @var int
     *
     * @ORM\Column(name="idcurso_eval", type="integer")
     */
    private $idcursoEval;

    /**
     * @var int
     *
     * @ORM\Column(name="iddimension", type="integer")
     */
    private $iddimension;

    /**
     * @var int
     *
     * @ORM\Column(name="nota_n", type="integer")
     */
    private $notaN;

    /**
     * @var string
     *
     * @ORM\Column(name="nota_l", type="string", length=255)
     */
    private $notaL;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=255)
     */
    private $observacion;

    /**
     * @var \Dimensiones
     *
     * @ORM\ManyToOne(targetEntity="Dimensiones")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iddimension", referencedColumnName="iddimension")
     * })
     */
    private $dimension;

    /**
     * @var \CursoEval
     *
     * @ORM\ManyToOne(targetEntity="CursoEval")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcurso_eval", referencedColumnName="idcurso_eval")
     * })
     */
    private $cursoEval;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="CursoEvalDimActividad", mappedBy="cursoEvalDim")
     */
    private $cursoEvalDimActividad;

    /**
     * Set idcursoEvalDim
     *
     * @param integer $idcursoEvalDim
     *
     * @return CursoEvalDim
     */
    public function setIdcursoEvalDim($idcursoEvalDim)
    {
        $this->idcursoEvalDim = $idcursoEvalDim;

        return $this;
    }

    /**
     * Get idcursoEvalDim
     *
     * @return int
     */
    public function getIdcursoEvalDim()
    {
        return $this->idcursoEvalDim;
    }

    /**
     * Set idcursoEval
     *
     * @param integer $idcursoEval
     *
     * @return CursoEvalDim
     */
    public function setIdcursoEval($idcursoEval)
    {
        $this->idcursoEval = $idcursoEval;

        return $this;
    }

    /**
     * Get idcursoEval
     *
     * @return int
     */
    public function getIdcursoEval()
    {
        return $this->idcursoEval;
    }

    /**
     * Set iddimension
     *
     * @param integer $iddimension
     *
     * @return CursoEvalDim
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
     * Set notaN
     *
     * @param integer $notaN
     *
     * @return CursoEvalDim
     */
    public function setNotaN($notaN)
    {
        $this->notaN = $notaN;

        return $this;
    }

    /**
     * Get notaN
     *
     * @return int
     */
    public function getNotaN()
    {
        return $this->notaN;
    }

    /**
     * Set notaL
     *
     * @param string $notaL
     *
     * @return CursoEvalDim
     */
    public function setNotaL($notaL)
    {
        $this->notaL = $notaL;

        return $this;
    }

    /**
     * Get notaL
     *
     * @return string
     */
    public function getNotaL()
    {
        return $this->notaL;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     *
     * @return CursoEvalDim
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return string
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set dimension
     *
     * @param \Sistema\ColegioBundle\Entity\Dimensiones $dimension
     *
     * @return CursoEvalDim
     */
    public function setDimension(\Sistema\ColegioBundle\Entity\Dimensiones $dimension = null)
    {
        $this->dimension = $dimension;

        return $this;
    }

    /**
     * Get dimension
     *
     * @return \Sistema\ColegioBundle\Entity\Dimensiones
     */
    public function getDimension()
    {
        return $this->dimension;
    }

    /**
     * Set cursoEval
     *
     * @param \Sistema\ColegioBundle\Entity\CursoEval $cursoEval
     *
     * @return CursoEvalDim
     */
    public function setCursoEval(\Sistema\ColegioBundle\Entity\CursoEval $cursoEval = null)
    {
        $this->cursoEval = $cursoEval;

        return $this;
    }

    /**
     * Get cursoEval
     *
     * @return \Sistema\ColegioBundle\Entity\CursoEval
     */
    public function getCursoEval()
    {
        return $this->cursoEval;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cursoEvalDimActividad = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cursoEvalDimActividad
     *
     * @param \Sistema\ColegioBundle\Entity\CursoEvalDimActividad $cursoEvalDimActividad
     *
     * @return CursoEvalDim
     */
    public function addCursoEvalDimActividad(\Sistema\ColegioBundle\Entity\CursoEvalDimActividad $cursoEvalDimActividad)
    {
        $this->cursoEvalDimActividad[] = $cursoEvalDimActividad;

        return $this;
    }

    /**
     * Remove cursoEvalDimActividad
     *
     * @param \Sistema\ColegioBundle\Entity\CursoEvalDimActividad $cursoEvalDimActividad
     */
    public function removeCursoEvalDimActividad(\Sistema\ColegioBundle\Entity\CursoEvalDimActividad $cursoEvalDimActividad)
    {
        $this->cursoEvalDimActividad->removeElement($cursoEvalDimActividad);
    }

    /**
     * Get cursoEvalDimActividad
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCursoEvalDimActividad()
    {
        return $this->cursoEvalDimActividad;
    }
}

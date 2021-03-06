<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CursoEvalDimActividad
 *
 * @ORM\Table(name="curso_eval_dim_actividad")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\CursoEvalDimActividadRepository")
 */
class CursoEvalDimActividad
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idcurso_dim_act", type="integer")
     */
    private $idcursoDimAct;

    /**
     * @var int
     *
     * @ORM\Column(name="idcurso_eval_dim", type="integer")
     */
    private $idcursoEvalDim;

    /**
     * @var int
     *
     * @ORM\Column(name="idactividad", type="integer")
     */
    private $idactividad;

    /**
     * @var int
     *
     * @ORM\Column(name="nota_n", type="integer")
     */
    private $notaN;

    /**
     * @var int
     *
     * @ORM\Column(name="nota_l", type="integer")
     */
    private $notaL;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=255)
     */
    private $observacion;


    /**
     * @var \CursoEvalDim
     *
     * @ORM\ManyToOne(targetEntity="CursoEvalDim")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcurso_eval_dim", referencedColumnName="idcurso_eval_dim")
     * })
     */
    private $cursoEvalDim;

    /**
     * @var \Actividades
     *
     * @ORM\ManyToOne(targetEntity="Actividades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idactividad", referencedColumnName="idactividad")
     * })
     */
    private $actividad;

    /**
     * Set idcursoDimAct
     *
     * @param integer $idcursoDimAct
     *
     * @return CursoEvalDimActividad
     */
    public function setIdcursoDimAct($idcursoDimAct)
    {
        $this->idcursoDimAct = $idcursoDimAct;

        return $this;
    }

    /**
     * Get idcursoDimAct
     *
     * @return int
     */
    public function getIdcursoDimAct()
    {
        return $this->idcursoDimAct;
    }

    /**
     * Set idcursoEvalDim
     *
     * @param integer $idcursoEvalDim
     *
     * @return CursoEvalDimActividad
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
     * Set idactividad
     *
     * @param integer $idactividad
     *
     * @return CursoEvalDimActividad
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
     * Set notaN
     *
     * @param integer $notaN
     *
     * @return CursoEvalDimActividad
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
     * @param integer $notaL
     *
     * @return CursoEvalDimActividad
     */
    public function setNotaL($notaL)
    {
        $this->notaL = $notaL;

        return $this;
    }

    /**
     * Get notaL
     *
     * @return int
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
     * @return CursoEvalDimActividad
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
     * Set cursoEvalDim
     *
     * @param \Sistema\ColegioBundle\Entity\CursoEvalDim $cursoEvalDim
     *
     * @return CursoEvalDimActividad
     */
    public function setCursoEvalDim(\Sistema\ColegioBundle\Entity\CursoEvalDim $cursoEvalDim = null)
    {
        $this->cursoEvalDim = $cursoEvalDim;

        return $this;
    }

    /**
     * Get cursoEvalDim
     *
     * @return \Sistema\ColegioBundle\Entity\CursoEvalDim
     */
    public function getCursoEvalDim()
    {
        return $this->cursoEvalDim;
    }

    /**
     * Set actividad
     *
     * @param \Sistema\ColegioBundle\Entity\Actividades $actividad
     *
     * @return CursoEvalDimActividad
     */
    public function setActividad(\Sistema\ColegioBundle\Entity\Actividades $actividad = null)
    {
        $this->actividad = $actividad;

        return $this;
    }

    /**
     * Get actividad
     *
     * @return \Sistema\ColegioBundle\Entity\Actividades
     */
    public function getActividad()
    {
        return $this->actividad;
    }
}

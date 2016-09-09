<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CursoEval
 *
 * @ORM\Table(name="curso_eval")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\CursoEvalRepository")
 */
class CursoEval
{
    
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idcurso_eval", type="integer")
     */
    private $idcursoEval;

    /**
     * @var int
     *
     * @ORM\Column(name="idcurso_estud", type="integer")
     */
    private $idcursoEstud;

    /**
     * @var int
     *
     * @ORM\Column(name="idevaluacion", type="integer")
     */
    private $idevaluacion;

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
     * @var \PeriodoEval
     *
     * @ORM\ManyToOne(targetEntity="PeriodoEval")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idevaluacion", referencedColumnName="idevaluacion")
     * })
     */
    private $evaluacion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="CursoEvalDim", mappedBy="cursoEval")
     */
    private $cursoEvalDim;

    /**
     * Set idcursoEval
     *
     * @param integer $idcursoEval
     *
     * @return CursoEval
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
     * Set idcursoEstud
     *
     * @param integer $idcursoEstud
     *
     * @return CursoEval
     */
    public function setIdcursoEstud($idcursoEstud)
    {
        $this->idcursoEstud = $idcursoEstud;

        return $this;
    }

    /**
     * Get idcursoEstud
     *
     * @return int
     */
    public function getIdcursoEstud()
    {
        return $this->idcursoEstud;
    }

    /**
     * Set idevaluacion
     *
     * @param integer $idevaluacion
     *
     * @return CursoEval
     */
    public function setIdevaluacion($idevaluacion)
    {
        $this->idevaluacion = $idevaluacion;

        return $this;
    }

    /**
     * Get idevaluacion
     *
     * @return int
     */
    public function getIdevaluacion()
    {
        return $this->idevaluacion;
    }

    /**
     * Set notaN
     *
     * @param integer $notaN
     *
     * @return CursoEval
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
     * @return CursoEval
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
     * @return CursoEval
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
     * Set evaluacion
     *
     * @param \Sistema\ColegioBundle\Entity\PeriodoEval $evaluacion
     *
     * @return CursoEval
     */
    public function setEvaluacion(\Sistema\ColegioBundle\Entity\PeriodoEval $evaluacion = null)
    {
        $this->evaluacion = $evaluacion;

        return $this;
    }

    /**
     * Get evaluacion
     *
     * @return \Sistema\ColegioBundle\Entity\PeriodoEval
     */
    public function getEvaluacion()
    {
        return $this->evaluacion;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cursoEvalDim = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add cursoEvalDim
     *
     * @param \Sistema\ColegioBundle\Entity\CursoEvalDim $cursoEvalDim
     *
     * @return CursoEval
     */
    public function addCursoEvalDim(\Sistema\ColegioBundle\Entity\CursoEvalDim $cursoEvalDim)
    {
        $this->cursoEvalDim[] = $cursoEvalDim;

        return $this;
    }

    /**
     * Remove cursoEvalDim
     *
     * @param \Sistema\ColegioBundle\Entity\CursoEvalDim $cursoEvalDim
     */
    public function removeCursoEvalDim(\Sistema\ColegioBundle\Entity\CursoEvalDim $cursoEvalDim)
    {
        $this->cursoEvalDim->removeElement($cursoEvalDim);
    }

    /**
     * Get cursoEvalDim
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCursoEvalDim()
    {
        return $this->cursoEvalDim;
    }
}

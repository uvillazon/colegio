<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PeriodoEval
 *
 * @ORM\Table(name="periodo_eval")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\PeriodoEvalRepository")
 */
class PeriodoEval
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idevaluacion", type="integer")
     */
    private $idevaluacion;

    /**
     * @var int
     *
     * @ORM\Column(name="idperiodo", type="integer")
     */
    private $idperiodo;

    /**
     * @var string
     *
     * @ORM\Column(name="evaluacion", type="string", length=255)
     */
    private $evaluacion;

    /**
     * @var int
     *
     * @ORM\Column(name="idgestion", type="integer")
     */
    private $idgestion;

    /**
     * @var \Periodo
     *
     * @ORM\ManyToOne(targetEntity="Periodo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idperiodo", referencedColumnName="idperiodo")
     * })
     */
    private $periodo;


    /**
     * Set idevaluacion
     *
     * @param integer $idevaluacion
     *
     * @return PeriodoEval
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
     * Set idperiodo
     *
     * @param integer $idperiodo
     *
     * @return PeriodoEval
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
     * Set evaluacion
     *
     * @param string $evaluacion
     *
     * @return PeriodoEval
     */
    public function setEvaluacion($evaluacion)
    {
        $this->evaluacion = $evaluacion;

        return $this;
    }

    /**
     * Get evaluacion
     *
     * @return string
     */
    public function getEvaluacion()
    {
        return $this->evaluacion;
    }

    /**
     * Set idgestion
     *
     * @param integer $idgestion
     *
     * @return PeriodoEval
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
     * Set periodo
     *
     * @param \Sistema\ColegioBundle\Entity\Periodo $periodo
     *
     * @return PeriodoEval
     */
    public function setPeriodo(\Sistema\ColegioBundle\Entity\Periodo $periodo = null)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get periodo
     *
     * @return \Sistema\ColegioBundle\Entity\Periodo
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }
}

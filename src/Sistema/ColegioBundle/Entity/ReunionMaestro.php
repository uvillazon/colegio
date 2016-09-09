<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReunionMaestro
 *
 * @ORM\Table(name="reunion_maestro")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\ReunionMaestroRepository")
 */
class ReunionMaestro
{


    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idreunion", type="integer")
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="q_reunion_maestro", allocationSize=1, initialValue=1)
     */
    private $idreunion;

    /**
     * @var int
     *
     * @ORM\Column(name="idmaestro", type="integer")
     */
    private $idmaestro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_hora", type="datetime")
     */
    private $fechaHora;

    /**
     * @var int
     *
     * @ORM\Column(name="idestudiante", type="integer")
     */
    private $idestudiante;

    /**
     * @var bool
     *
     * @ORM\Column(name="completado", type="boolean")
     */
    private $completado;

    /**
     * @var int
     *
     * @ORM\Column(name="idnotificacion", type="integer")
     */
    private $idnotificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=300)
     */
    private $observaciones;

    /**
     * @var int
     *
     * @ORM\Column(name="idgestion", type="integer")
     */
    private $idgestion;

    /**
     * @var string
     *
     * @ORM\Column(name="motivo", type="string", length=255)
     */
    private $motivo;


    /**
     * @var \Maestros
     *
     * @ORM\ManyToOne(targetEntity="Maestros")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idmaestro", referencedColumnName="idmaestro")
     * })
     */
    private $maestro;



    /**
     * Set idreunion
     *
     * @param integer $idreunion
     *
     * @return ReunionMaestro
     */
    public function setIdreunion($idreunion)
    {
        $this->idreunion = $idreunion;

        return $this;
    }

    /**
     * Get idreunion
     *
     * @return int
     */
    public function getIdreunion()
    {
        return $this->idreunion;
    }

    /**
     * Set idmaestro
     *
     * @param integer $idmaestro
     *
     * @return ReunionMaestro
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

    /**
     * Set fechaHora
     *
     * @param \DateTime $fechaHora
     *
     * @return ReunionMaestro
     */
    public function setFechaHora($fechaHora)
    {
        $this->fechaHora = $fechaHora;

        return $this;
    }

    /**
     * Get fechaHora
     *
     * @return \DateTime
     */
    public function getFechaHora()
    {
        return $this->fechaHora;
    }

    /**
     * Set idestudiante
     *
     * @param integer $idestudiante
     *
     * @return ReunionMaestro
     */
    public function setIdestudiante($idestudiante)
    {
        $this->idestudiante = $idestudiante;

        return $this;
    }

    /**
     * Get idestudiante
     *
     * @return int
     */
    public function getIdestudiante()
    {
        return $this->idestudiante;
    }

    /**
     * Set completado
     *
     * @param boolean $completado
     *
     * @return ReunionMaestro
     */
    public function setCompletado($completado)
    {
        $this->completado = $completado;

        return $this;
    }

    /**
     * Get completado
     *
     * @return bool
     */
    public function getCompletado()
    {
        return $this->completado;
    }

    /**
     * Set idnotificacion
     *
     * @param integer $idnotificacion
     *
     * @return ReunionMaestro
     */
    public function setIdnotificacion($idnotificacion)
    {
        $this->idnotificacion = $idnotificacion;

        return $this;
    }

    /**
     * Get idnotificacion
     *
     * @return int
     */
    public function getIdnotificacion()
    {
        return $this->idnotificacion;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return ReunionMaestro
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set idgestion
     *
     * @param integer $idgestion
     *
     * @return ReunionMaestro
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
     * Set maestro
     *
     * @param \Sistema\ColegioBundle\Entity\Maestros $maestro
     *
     * @return ReunionMaestro
     */
    public function setMaestro(\Sistema\ColegioBundle\Entity\Maestros $maestro = null)
    {
        $this->maestro = $maestro;

        return $this;
    }

    /**
     * Get maestro
     *
     * @return \Sistema\ColegioBundle\Entity\Maestros
     */
    public function getMaestro()
    {
        return $this->maestro;
    }

    /**
     * Set motivo
     *
     * @param string $motivo
     *
     * @return ReunionMaestro
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;

        return $this;
    }

    /**
     * Get motivo
     *
     * @return string
     */
    public function getMotivo()
    {
        return $this->motivo;
    }
}

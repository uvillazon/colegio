<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HorarioMaestro
 *
 * @ORM\Table(name="horario_maestro")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\HorarioMaestroRepository")
 */
class HorarioMaestro
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idhorario", type="integer")
     */
    private $idhorario;

    /**
     * @var int
     *
     * @ORM\Column(name="idmaestro", type="integer")
     */
    private $idmaestro;

    /**
     * @var string
     *
     * @ORM\Column(name="dia_atencion", type="string", length=255)
     */
    private $diaAtencion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_ini", type="time")
     */
    private $horaIni;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_fin", type="time")
     */
    private $horaFin;

    /**
     * @var int
     *
     * @ORM\Column(name="tiempo_atencion", type="integer")
     */
    private $tiempoAtencion;

    /**
     * @var int
     *
     * @ORM\Column(name="idgestion", type="integer")
     */
    private $idgestion;


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
     * Set idhorario
     *
     * @param integer $idhorario
     *
     * @return HorarioMaestro
     */
    public function setIdhorario($idhorario)
    {
        $this->idhorario = $idhorario;

        return $this;
    }

    /**
     * Get idhorario
     *
     * @return int
     */
    public function getIdhorario()
    {
        return $this->idhorario;
    }

    /**
     * Set idmaestro
     *
     * @param integer $idmaestro
     *
     * @return HorarioMaestro
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
     * Set diaAtencion
     *
     * @param string $diaAtencion
     *
     * @return HorarioMaestro
     */
    public function setDiaAtencion($diaAtencion)
    {
        $this->diaAtencion = $diaAtencion;

        return $this;
    }

    /**
     * Get diaAtencion
     *
     * @return string
     */
    public function getDiaAtencion()
    {
        return $this->diaAtencion;
    }

    /**
     * Set horaIni
     *
     * @param \DateTime $horaIni
     *
     * @return HorarioMaestro
     */
    public function setHoraIni($horaIni)
    {
        $this->horaIni = $horaIni;

        return $this;
    }

    /**
     * Get horaIni
     *
     * @return \DateTime
     */
    public function getHoraIni()
    {
        return $this->horaIni;
    }

    /**
     * Set horaFin
     *
     * @param \DateTime $horaFin
     *
     * @return HorarioMaestro
     */
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;

        return $this;
    }

    /**
     * Get horaFin
     *
     * @return \DateTime
     */
    public function getHoraFin()
    {
        return $this->horaFin;
    }

    /**
     * Set tiempoAtencion
     *
     * @param integer $tiempoAtencion
     *
     * @return HorarioMaestro
     */
    public function setTiempoAtencion($tiempoAtencion)
    {
        $this->tiempoAtencion = $tiempoAtencion;

        return $this;
    }

    /**
     * Get tiempoAtencion
     *
     * @return int
     */
    public function getTiempoAtencion()
    {
        return $this->tiempoAtencion;
    }

    /**
     * Set idgestion
     *
     * @param integer $idgestion
     *
     * @return HorarioMaestro
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
     * @return HorarioMaestro
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
}

<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NotifEstudiante
 *
 * @ORM\Table(name="notif_estudiante")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\NotifEstudianteRepository")
 */
class NotifEstudiante
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idnotif_estud", type="integer")
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="q_notificacion", allocationSize=1, initialValue=1)
     */
    private $idnotifEstud;

    /**
     * @var int
     *
     * @ORM\Column(name="idestudiante", type="integer")
     */
    private $idestudiante;

    /**
     * @var int
     *
     * @ORM\Column(name="idnotificacion", type="integer")
     */
    private $idnotificacion;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime")
     */
    private $fechaCreacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_envio", type="datetime")
     */
    private $fechaEnvio;

    /**
     * @var int
     *
     * @ORM\Column(name="idestado_notif", type="integer")
     */
    private $idestadoNotif;


    /**
     * Set idnotifEstud
     *
     * @param integer $idnotifEstud
     *
     * @return NotifEstudiante
     */
    public function setIdnotifEstud($idnotifEstud)
    {
        $this->idnotifEstud = $idnotifEstud;

        return $this;
    }

    /**
     * Get idnotifEstud
     *
     * @return int
     */
    public function getIdnotifEstud()
    {
        return $this->idnotifEstud;
    }

    /**
     * Set idestudiante
     *
     * @param integer $idestudiante
     *
     * @return NotifEstudiante
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
     * Set idnotificacion
     *
     * @param integer $idnotificacion
     *
     * @return NotifEstudiante
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
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return NotifEstudiante
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set fechaEnvio
     *
     * @param \DateTime $fechaEnvio
     *
     * @return NotifEstudiante
     */
    public function setFechaEnvio($fechaEnvio)
    {
        $this->fechaEnvio = $fechaEnvio;

        return $this;
    }

    /**
     * Get fechaEnvio
     *
     * @return \DateTime
     */
    public function getFechaEnvio()
    {
        return $this->fechaEnvio;
    }

    /**
     * Set idestadoNotif
     *
     * @param integer $idestadoNotif
     *
     * @return NotifEstudiante
     */
    public function setIdestadoNotif($idestadoNotif)
    {
        $this->idestadoNotif = $idestadoNotif;

        return $this;
    }

    /**
     * Get idestadoNotif
     *
     * @return int
     */
    public function getIdestadoNotif()
    {
        return $this->idestadoNotif;
    }
}

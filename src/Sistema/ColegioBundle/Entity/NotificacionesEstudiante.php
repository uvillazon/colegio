<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NotificacionesEstudiante
 *
 * @ORM\Table(name="notificaciones_estudiante")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\NotificacionesEstudianteRepository")
 */
class NotificacionesEstudiante
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idestudiante", type="integer")
     */
    private $idestudiante;

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idnotificacion", type="integer")
     */
    private $idnotificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_envio", type="datetime")
     */
    private $fechaEnvio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime")
     */
    private $fechaCreacion;

    /**
     * @var int
     *
     * @ORM\Column(name="idgestion", type="integer")
     */
    private $idgestion;

    /**
     * @var string
     *
     * @ORM\Column(name="mensaje", type="string", length=255)
     */
    private $mensaje;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_emisor", type="string", length=255)
     */
    private $nombreEmisor;

    /**
     * @var int
     *
     * @ORM\Column(name="idestado_notif", type="integer")
     */
    private $idestadoNotif;

    public $estudiante;


    /**
     * Set idestudiante
     *
     * @param integer $idestudiante
     *
     * @return NotificacionesEstudiante
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
     * Set fechaEnvio
     *
     * @param \DateTime $fechaEnvio
     *
     * @return NotificacionesEstudiante
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
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return NotificacionesEstudiante
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
     * Set idgestion
     *
     * @param integer $idgestion
     *
     * @return NotificacionesEstudiante
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
     * Set mensaje
     *
     * @param string $mensaje
     *
     * @return NotificacionesEstudiante
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;

        return $this;
    }

    /**
     * Get mensaje
     *
     * @return string
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Set idestadoNotif
     *
     * @param integer $idestadoNotif
     *
     * @return NotificacionesEstudiante
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

    /**
     * Set idnotificacion
     *
     * @param integer $idnotificacion
     *
     * @return NotificacionesEstudiante
     */
    public function setIdnotificacion($idnotificacion)
    {
        $this->idnotificacion = $idnotificacion;

        return $this;
    }

    /**
     * Get idnotificacion
     *
     * @return integer
     */
    public function getIdnotificacion()
    {
        return $this->idnotificacion;
    }

    /**
     * Set mensaje
     *
     * @param string $nombre
     *
     * @return NotificacionesEstudiante
     */
    public function setNombreEmisor($nombre)
    {
        $this->nombreEmisor = $nombre;

        return $this;
    }

    /**
     * Get nombreEmisor
     *
     * @return string
     */
    public function getNombreEmisor()
    {
        return $this->nombreEmisor;
    }

    /**
     * Set titulo
     *
     * @param string $nombre
     *
     * @return NotificacionesEstudiante
     */
    public function setTitulo($nombre)
    {
        $this->titulo = $nombre;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }
}

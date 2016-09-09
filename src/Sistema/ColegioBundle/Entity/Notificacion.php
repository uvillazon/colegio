<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notificacion
 *
 * @ORM\Table(name="notificacion")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\NotificacionRepository")
 */
class Notificacion
{


    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idnotificacion", type="integer")
     */
    private $idnotificacion;

    /**
     * @var int
     *
     * @ORM\Column(name="idgestion", type="integer")
     */
    private $idgestion;

    /**
     * @var int
     *
     * @ORM\Column(name="idtipo_notificacion", type="integer")
     */
    private $idtipoNotificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro", type="datetime")
     */
    private $fechaRegistro;

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
     * @var string
     *
     * @ORM\Column(name="mensaje", type="string", length=255)
     */
    private $mensaje;

    /**
     * @var int
     *
     * @ORM\Column(name="idtipo_destinatario", type="integer")
     */
    private $idtipoDestinatario;

    /**
     * @var int
     *
     * @ORM\Column(name="iddestinatario", type="integer")
     */
    private $iddestinatario;


    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=255)
     */
    private $titulo;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idnotificacion
     *
     * @param integer $idnotificacion
     *
     * @return Notificacion
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
     * Set idgestion
     *
     * @param integer $idgestion
     *
     * @return Notificacion
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
     * Set idtipoNotificacion
     *
     * @param integer $idtipoNotificacion
     *
     * @return Notificacion
     */
    public function setIdtipoNotificacion($idtipoNotificacion)
    {
        $this->idtipoNotificacion = $idtipoNotificacion;

        return $this;
    }

    /**
     * Get idtipoNotificacion
     *
     * @return int
     */
    public function getIdtipoNotificacion()
    {
        return $this->idtipoNotificacion;
    }

    /**
     * Set fechaRegistro
     *
     * @param string $fechaRegistro
     *
     * @return Notificacion
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    /**
     * Get fechaRegistro
     *
     * @return string
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * Set fechaEnvio
     *
     * @param \DateTime $fechaEnvio
     *
     * @return Notificacion
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
     * @return Notificacion
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
     * Set mensaje
     *
     * @param string $mensaje
     *
     * @return Notificacion
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
     * Set idtipoDestinatario
     *
     * @param integer $idtipoDestinatario
     *
     * @return Notificacion
     */
    public function setIdtipoDestinatario($idtipoDestinatario)
    {
        $this->idtipoDestinatario = $idtipoDestinatario;

        return $this;
    }

    /**
     * Get idtipoDestinatario
     *
     * @return int
     */
    public function getIdtipoDestinatario()
    {
        return $this->idtipoDestinatario;
    }

    /**
     * Set iddestinatario
     *
     * @param integer $iddestinatario
     *
     * @return Notificacion
     */
    public function setIddestinatario($iddestinatario)
    {
        $this->iddestinatario = $iddestinatario;

        return $this;
    }

    /**
     * Get iddestinatario
     *
     * @return int
     */
    public function getIddestinatario()
    {
        return $this->iddestinatario;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Notificacion
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

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
<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoNotificacion
 *
 * @ORM\Table(name="tipo_notificacion")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\TipoNotificacionRepository")
 */
class TipoNotificacion
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idtipo_notificacion", type="integer")
     */
    private $idtipoNotificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255)
     */
    private $tipo;
    

    /**
     * Set idtipoNotificacion
     *
     * @param integer $idtipoNotificacion
     *
     * @return TipoNotificacion
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return TipoNotificacion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return TipoNotificacion
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}


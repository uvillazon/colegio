<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioApp
 *
 * @ORM\Table(name="usuario_app")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\UsuarioAppRepository")
 */
class UsuarioApp
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idusuario", type="integer")
     */
    private $idusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=255)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="contrasena", type="string", length=255)
     */
    private $contrasena;


    /**
     * Set idusuario
     *
     * @param integer $idusuario
     *
     * @return UsuarioApp
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get idusuario
     *
     * @return int
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     *
     * @return UsuarioApp
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return UsuarioApp
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set contrasena
     *
     * @param string $contrasena
     *
     * @return UsuarioApp
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    /**
     * Get contrasena
     *
     * @return string
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }
}


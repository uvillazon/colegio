<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dispositivos
 *
 * @ORM\Table(name="dispositivos")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\DispositivosRepository")
 */
class Dispositivos
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="iddispositivo", type="integer")
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="q_dispositivos", allocationSize=1, initialValue=1)
     */
    private $iddispositivo;

    /**
     * @var string
     *
     * @ORM\Column(name="imei", type="string", length=255)
     */
    private $imei;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=255)
     */
    private $token;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="fcm_token", type="string", length=255)
     */
    private $fcmToken;


    /**
     * Set iddispositivo
     *
     * @param integer $iddispositivo
     *
     * @return Dispositivos
     */
    public function setIddispositivo($iddispositivo)
    {
        $this->iddispositivo = $iddispositivo;

        return $this;
    }

    /**
     * Get iddispositivo
     *
     * @return int
     */
    public function getIddispositivo()
    {
        return $this->iddispositivo;
    }

    /**
     * Set imei
     *
     * @param string $imei
     *
     * @return Dispositivos
     */
    public function setImei($imei)
    {
        $this->imei = $imei;

        return $this;
    }

    /**
     * Get imei
     *
     * @return string
     */
    public function getImei()
    {
        return $this->imei;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Dispositivos
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Dispositivos
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set fcmToken
     *
     * @param string $fcmToken
     *
     * @return Dispositivos
     */
    public function setFcmToken($fcmToken)
    {
        $this->fcmToken = $fcmToken;

        return $this;
    }

    /**
     * Get fcmToken
     *
     * @return string
     */
    public function getFcmToken()
    {
        return $this->fcmToken;
    }
}

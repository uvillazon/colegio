<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Key
 *
 * @ORM\Table(name="key")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\KeyRepository")
 */
class Key
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idkey", type="integer")
     */
    private $idkey;

    /**
     * @var string
     *
     * @ORM\Column(name="key", type="string", length=255)
     */
    private $key;

    /**
     * @var string
     *
     * @ORM\Column(name="version", type="string", length=255)
     */
    private $version;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=255)
     */
    private $estado;

    /**
     * Set idkey
     *
     * @param integer $idkey
     *
     * @return Key
     */
    public function setIdkey($idkey)
    {
        $this->idkey = $idkey;

        return $this;
    }

    /**
     * Get idkey
     *
     * @return int
     */
    public function getIdkey()
    {
        return $this->idkey;
    }

    /**
     * Set key
     *
     * @param string $key
     *
     * @return Key
     */
    public function setKey($key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get key
     *
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set version
     *
     * @param string $version
     *
     * @return Key
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Key
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
}


<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DispositivosUsuarios
 *
 * @ORM\Table(name="dispositivos_usuarios")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\DispositivosUsuariosRepository")
 */
class DispositivosUsuarios
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="iddispo_usuario", type="integer")
     */
    private $iddispoUsuario;

    /**
     * @var int
     *
     * @ORM\Column(name="iddispositivo", type="integer")
     */
    private $iddispositivo;

    /**
     * @var int
     *
     * @ORM\Column(name="idestudiante", type="integer")
     */
    private $idestudiante;

    /**
     * @var \Dispositivos
     *
     * @ORM\ManyToOne(targetEntity="Dispositivos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iddispositivo", referencedColumnName="iddispositivo")
     * })
     */
    private $dispositivo;

    /**
     * @var \Estudiantes
     *
     * @ORM\ManyToOne(targetEntity="Estudiantes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idestudiante", referencedColumnName="idestudiante")
     * })
     */
    private $estudiante;

    /**
     * Set iddispoUsuario
     *
     * @param integer $iddispoUsuario
     *
     * @return DispositivosUsuarios
     */
    public function setIddispoUsuario($iddispoUsuario)
    {
        $this->iddispoUsuario = $iddispoUsuario;

        return $this;
    }

    /**
     * Get iddispoUsuario
     *
     * @return int
     */
    public function getIddispoUsuario()
    {
        return $this->iddispoUsuario;
    }

    /**
     * Set iddispositivo
     *
     * @param integer $iddispositivo
     *
     * @return DispositivosUsuarios
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
     * Set idestudiante
     *
     * @param integer $idestudiante
     *
     * @return DispositivosUsuarios
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
     * Set dispositivo
     *
     * @param \Sistema\ColegioBundle\Entity\Dispositivos $dispositivo
     *
     * @return DispositivosUsuarios
     */
    public function setDispositivo(\Sistema\ColegioBundle\Entity\Dispositivos $dispositivo = null)
    {
        $this->dispositivo = $dispositivo;

        return $this;
    }

    /**
     * Get dispositivo
     *
     * @return \Sistema\ColegioBundle\Entity\Dispositivos
     */
    public function getDispositivo()
    {
        return $this->dispositivo;
    }

    /**
     * Set estudiante
     *
     * @param \Sistema\ColegioBundle\Entity\Estudiantes $estudiante
     *
     * @return DispositivosUsuarios
     */
    public function setEstudiante(\Sistema\ColegioBundle\Entity\Estudiantes $estudiante = null)
    {
        $this->estudiante = $estudiante;

        return $this;
    }

    /**
     * Get estudiante
     *
     * @return \Sistema\ColegioBundle\Entity\Estudiantes
     */
    public function getEstudiante()
    {
        return $this->estudiante;
    }
}

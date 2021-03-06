<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Maestros
 *
 * @ORM\Table(name="maestros")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\MaestrosRepository")
 */
class Maestros
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idmaestro", type="integer")
     */
    private $idmaestro;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_maestro", type="string", length=20)
     */
    private $codMaestro;

    /**
     * @var string
     *
     * @ORM\Column(name="nombres", type="string", length=100)
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=100)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="ci", type="string", length=10)
     */
    private $ci;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date")
     */
    private $fechaNacimiento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso", type="date")
     */
    private $fechaIngreso;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="HorarioMaestro", mappedBy="maestro")
     */
    private $horarioMaestro;

    /**
     * Set idmaestro
     *
     * @param integer $idmaestro
     *
     * @return Maestros
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
     * Set codMaestro
     *
     * @param string $codMaestro
     *
     * @return Maestros
     */
    public function setCodMaestro($codMaestro)
    {
        $this->codMaestro = $codMaestro;

        return $this;
    }

    /**
     * Get codMaestro
     *
     * @return string
     */
    public function getCodMaestro()
    {
        return $this->codMaestro;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     *
     * @return Maestros
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get nombres
     *
     * @return string
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return Maestros
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set ci
     *
     * @param string $ci
     *
     * @return Maestros
     */
    public function setCi($ci)
    {
        $this->ci = $ci;

        return $this;
    }

    /**
     * Get ci
     *
     * @return string
     */
    public function getCi()
    {
        return $this->ci;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     *
     * @return Maestros
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     *
     * @return Maestros
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime
     */
    public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->horarioMaestro = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add horarioMaestro
     *
     * @param \Sistema\ColegioBundle\Entity\HorarioMaestro $horarioMaestro
     *
     * @return Maestros
     */
    public function addHorarioMaestro(\Sistema\ColegioBundle\Entity\HorarioMaestro $horarioMaestro)
    {
        $this->horarioMaestro[] = $horarioMaestro;

        return $this;
    }

    /**
     * Remove horarioMaestro
     *
     * @param \Sistema\ColegioBundle\Entity\HorarioMaestro $horarioMaestro
     */
    public function removeHorarioMaestro(\Sistema\ColegioBundle\Entity\HorarioMaestro $horarioMaestro)
    {
        $this->horarioMaestro->removeElement($horarioMaestro);
    }

    /**
     * Get horarioMaestro
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHorarioMaestro()
    {
        return $this->horarioMaestro;
    }
}

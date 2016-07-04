<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estudiantes
 *
 * @ORM\Table(name="estudiantes")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\EstudiantesRepository")
 */
class Estudiantes
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idestudiante", type="integer")
     */
    private $idestudiante;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_estudiante", type="string", length=21)
     */
    private $codEstudiante;

    /**
     * @var string
     *
     * @ORM\Column(name="nombres", type="string", length=200)
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=200)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=200)
     */
    private $sexo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date")
     */
    private $fechaNacimiento;


    /**
     * Set idestudiante
     *
     * @param integer $idestudiante
     *
     * @return Estudiantes
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
     * Set codEstudiante
     *
     * @param string $codEstudiante
     *
     * @return Estudiantes
     */
    public function setCodEstudiante($codEstudiante)
    {
        $this->codEstudiante = $codEstudiante;

        return $this;
    }

    /**
     * Get codEstudiante
     *
     * @return string
     */
    public function getCodEstudiante()
    {
        return $this->codEstudiante;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     *
     * @return Estudiantes
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
     * @return Estudiantes
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
     * Set sexo
     *
     * @param string $sexo
     *
     * @return Estudiantes
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     *
     * @return Estudiantes
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
}


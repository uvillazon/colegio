<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estudiantes
 *
 * @ORM\Table(name="public.estudiantes")
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
     * @ORM\Column(name="apellido_paterno", type="string", length=200)
     */
    private $apellidoPaterno;

    /**
     * @var string
     *
     * @ORM\Column(name="apelllido_materno", type="string", length=200)
     */
    private $apellidoMaterno;

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
     * @var string
     *
     * @ORM\Column(name="nombres_padre", type="string", length=200)
     */
    private $nombresPadre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos_padre", type="string", length=200)
     */
    private $apellidosPadre;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_padre", type="string", length=200)
     */
    private $correoPadre;

    /**
     * @var string
     *
     * @ORM\Column(name="celular_padre", type="string", length=200)
     */
    private $celularPadre;

    /**
     * @var string
     *
     * @ORM\Column(name="profesion_padre", type="string", length=200)
     */
    private $profesionPadre;

    /**
     * @var string
     *
     * @ORM\Column(name="trabajo_padre", type="string", length=200)
     */
    private $trabajoPadre;

    /**
     * @var string
     *
     * @ORM\Column(name="nombres_madre", type="string", length=200)
     */
    private $nombresMadre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos_madre", type="string", length=200)
     */
    private $apellidosMadre;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_madre", type="string", length=200)
     */
    private $correoMadre;

    /**
     * @var string
     *
     * @ORM\Column(name="celular_madre", type="string", length=200)
     */
    private $celular_madre;

    /**
     * @var string
     *
     * @ORM\Column(name="profesion_madre", type="string", length=200)
     */
    private $profesionMadre;

    /**
     * @var string
     *
     * @ORM\Column(name="trabajo_madre", type="string", length=200)
     */
    private $trabajoMadre;

    /**
     * @var string
     *
     * @ORM\Column(name="pin", type="string", length=200)
     */
    private $pin;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="DispositivosUsuarios", mappedBy="estudiante")
     */
    private $dispositivosUsuarios;

    public $materias;

    public $reuniones;
    public $notificaciones;

    public $grado;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dispositivosUsuarios = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return integer
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
     * Set apellidoPaterno
     *
     * @param string $apellidoPaterno
     *
     * @return Estudiantes
     */
    public function setApellidoPaterno($apellidoPaterno)
    {
        $this->apellidoPaterno = $apellidoPaterno;

        return $this;
    }

    /**
     * Get apellidoPaterno
     *
     * @return string
     */
    public function getApellidoPaterno()
    {
        return $this->apellidoPaterno;
    }

    /**
     * Set apellidoMaterno
     *
     * @param string $apellidoMaterno
     *
     * @return Estudiantes
     */
    public function setApellidoMaterno($apellidoMaterno)
    {
        $this->apellidoMaterno = $apellidoMaterno;

        return $this;
    }

    /**
     * Get apellidoMaterno
     *
     * @return string
     */
    public function getApellidoMaterno()
    {
        return $this->apellidoMaterno;
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

    /**
     * Set nombresPadre
     *
     * @param string $nombresPadre
     *
     * @return Estudiantes
     */
    public function setNombresPadre($nombresPadre)
    {
        $this->nombresPadre = $nombresPadre;

        return $this;
    }

    /**
     * Get nombresPadre
     *
     * @return string
     */
    public function getNombresPadre()
    {
        return $this->nombresPadre;
    }

    /**
     * Set apellidosPadre
     *
     * @param string $apellidosPadre
     *
     * @return Estudiantes
     */
    public function setApellidosPadre($apellidosPadre)
    {
        $this->apellidosPadre = $apellidosPadre;

        return $this;
    }

    /**
     * Get apellidosPadre
     *
     * @return string
     */
    public function getApellidosPadre()
    {
        return $this->apellidosPadre;
    }

    /**
     * Set correoPadre
     *
     * @param string $correoPadre
     *
     * @return Estudiantes
     */
    public function setCorreoPadre($correoPadre)
    {
        $this->correoPadre = $correoPadre;

        return $this;
    }

    /**
     * Get correoPadre
     *
     * @return string
     */
    public function getCorreoPadre()
    {
        return $this->correoPadre;
    }

    /**
     * Set celularPadre
     *
     * @param string $celularPadre
     *
     * @return Estudiantes
     */
    public function setCelularPadre($celularPadre)
    {
        $this->celularPadre = $celularPadre;

        return $this;
    }

    /**
     * Get celularPadre
     *
     * @return string
     */
    public function getCelularPadre()
    {
        return $this->celularPadre;
    }

    /**
     * Set profesionPadre
     *
     * @param string $profesionPadre
     *
     * @return Estudiantes
     */
    public function setProfesionPadre($profesionPadre)
    {
        $this->profesionPadre = $profesionPadre;

        return $this;
    }

    /**
     * Get profesionPadre
     *
     * @return string
     */
    public function getProfesionPadre()
    {
        return $this->profesionPadre;
    }

    /**
     * Set trabajoPadre
     *
     * @param string $trabajoPadre
     *
     * @return Estudiantes
     */
    public function setTrabajoPadre($trabajoPadre)
    {
        $this->trabajoPadre = $trabajoPadre;

        return $this;
    }

    /**
     * Get trabajoPadre
     *
     * @return string
     */
    public function getTrabajoPadre()
    {
        return $this->trabajoPadre;
    }

    /**
     * Set nombresMadre
     *
     * @param string $nombresMadre
     *
     * @return Estudiantes
     */
    public function setNombresMadre($nombresMadre)
    {
        $this->nombresMadre = $nombresMadre;

        return $this;
    }

    /**
     * Get nombresMadre
     *
     * @return string
     */
    public function getNombresMadre()
    {
        return $this->nombresMadre;
    }

    /**
     * Set apellidosMadre
     *
     * @param string $apellidosMadre
     *
     * @return Estudiantes
     */
    public function setApellidosMadre($apellidosMadre)
    {
        $this->apellidosMadre = $apellidosMadre;

        return $this;
    }

    /**
     * Get apellidosMadre
     *
     * @return string
     */
    public function getApellidosMadre()
    {
        return $this->apellidosMadre;
    }

    /**
     * Set correoMadre
     *
     * @param string $correoMadre
     *
     * @return Estudiantes
     */
    public function setCorreoMadre($correoMadre)
    {
        $this->correoMadre = $correoMadre;

        return $this;
    }

    /**
     * Get correoMadre
     *
     * @return string
     */
    public function getCorreoMadre()
    {
        return $this->correoMadre;
    }

    /**
     * Set celularMadre
     *
     * @param string $celularMadre
     *
     * @return Estudiantes
     */
    public function setCelularMadre($celularMadre)
    {
        $this->celular_madre = $celularMadre;

        return $this;
    }

    /**
     * Get celularMadre
     *
     * @return string
     */
    public function getCelularMadre()
    {
        return $this->celular_madre;
    }

    /**
     * Set profesionMadre
     *
     * @param string $profesionMadre
     *
     * @return Estudiantes
     */
    public function setProfesionMadre($profesionMadre)
    {
        $this->profesionMadre = $profesionMadre;

        return $this;
    }

    /**
     * Get profesionMadre
     *
     * @return string
     */
    public function getProfesionMadre()
    {
        return $this->profesionMadre;
    }

    /**
     * Set trabajoMadre
     *
     * @param string $trabajoMadre
     *
     * @return Estudiantes
     */
    public function setTrabajoMadre($trabajoMadre)
    {
        $this->trabajoMadre = $trabajoMadre;

        return $this;
    }

    /**
     * Get trabajoMadre
     *
     * @return string
     */
    public function getTrabajoMadre()
    {
        return $this->trabajoMadre;
    }

    /**
     * Set pin
     *
     * @param string $pin
     *
     * @return Estudiantes
     */
    public function setPin($pin)
    {
        $this->pin = $pin;

        return $this;
    }

    /**
     * Get pin
     *
     * @return string
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * Add dispositivosUsuario
     *
     * @param \Sistema\ColegioBundle\Entity\DispositivosUsuarios $dispositivosUsuario
     *
     * @return Estudiantes
     */
    public function addDispositivosUsuario(\Sistema\ColegioBundle\Entity\DispositivosUsuarios $dispositivosUsuario)
    {
        $this->dispositivosUsuarios[] = $dispositivosUsuario;

        return $this;
    }

    /**
     * Remove dispositivosUsuario
     *
     * @param \Sistema\ColegioBundle\Entity\DispositivosUsuarios $dispositivosUsuario
     */
    public function removeDispositivosUsuario(\Sistema\ColegioBundle\Entity\DispositivosUsuarios $dispositivosUsuario)
    {
        $this->dispositivosUsuarios->removeElement($dispositivosUsuario);
    }

    /**
     * Get dispositivosUsuarios
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDispositivosUsuarios()
    {
        return $this->dispositivosUsuarios;
    }
}

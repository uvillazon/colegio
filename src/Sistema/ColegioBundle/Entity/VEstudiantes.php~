<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VEstudiantes
 *
 * @ORM\Table(name="v_estudiantes")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\VEstudiantesRepository")
 */
class VEstudiantes
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idges_curso", type="integer")
     */
    private $idgesCurso;

    /**
     * @var int
     *
     * @ORM\Column(name="idgestion", type="integer")
     */
    private $idgestion;

    /**
     * @var int
     *
     * @ORM\Column(name="idcurso", type="integer")
     */
    private $idcurso;

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idcurso_mat", type="integer")
     */
    private $idcursoMat;

    /**
     * @var int
     *
     * @ORM\Column(name="idmateria", type="integer")
     */
    private $idmateria;

    /**
     * @var int
     *
     * @ORM\Column(name="idmaestro", type="integer")
     */
    private $idmaestro;

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="idcurso_estud", type="integer")
     */
    private $idcursoEstud;

    /**
     * @var int
     *
     * @ORM\Column(name="idestudiante", type="integer")
     */
    private $idestudiante;

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
     * @var \Maestros
     *
     * @ORM\ManyToOne(targetEntity="Maestros")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idmaestro", referencedColumnName="idmaestro")
     * })
     */
    private $maestro;

    /**
     * @var \Materias
     *
     * @ORM\ManyToOne(targetEntity="Materias")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idmateria", referencedColumnName="idmateria")
     * })
     */
    private $materia;

    /**
     * @var \Cursos
     *
     * @ORM\ManyToOne(targetEntity="Cursos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcurso", referencedColumnName="idcurso")
     * })
     */
    private $curso;


    

    /**
     * Set idgesCurso
     *
     * @param integer $idgesCurso
     *
     * @return VEstudiantes
     */
    public function setIdgesCurso($idgesCurso)
    {
        $this->idgesCurso = $idgesCurso;

        return $this;
    }

    /**
     * Get idgesCurso
     *
     * @return int
     */
    public function getIdgesCurso()
    {
        return $this->idgesCurso;
    }

    /**
     * Set idgestion
     *
     * @param integer $idgestion
     *
     * @return VEstudiantes
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
     * Set idcurso
     *
     * @param integer $idcurso
     *
     * @return VEstudiantes
     */
    public function setIdcurso($idcurso)
    {
        $this->idcurso = $idcurso;

        return $this;
    }

    /**
     * Get idcurso
     *
     * @return int
     */
    public function getIdcurso()
    {
        return $this->idcurso;
    }

    /**
     * Set idcursoMat
     *
     * @param integer $idcursoMat
     *
     * @return VEstudiantes
     */
    public function setIdcursoMat($idcursoMat)
    {
        $this->idcursoMat = $idcursoMat;

        return $this;
    }

    /**
     * Get idcursoMat
     *
     * @return int
     */
    public function getIdcursoMat()
    {
        return $this->idcursoMat;
    }

    /**
     * Set idmateria
     *
     * @param integer $idmateria
     *
     * @return VEstudiantes
     */
    public function setIdmateria($idmateria)
    {
        $this->idmateria = $idmateria;

        return $this;
    }

    /**
     * Get idmateria
     *
     * @return int
     */
    public function getIdmateria()
    {
        return $this->idmateria;
    }

    /**
     * Set idmaestro
     *
     * @param integer $idmaestro
     *
     * @return VEstudiantes
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
     * Set idcursoEstud
     *
     * @param integer $idcursoEstud
     *
     * @return VEstudiantes
     */
    public function setIdcursoEstud($idcursoEstud)
    {
        $this->idcursoEstud = $idcursoEstud;

        return $this;
    }

    /**
     * Get idcursoEstud
     *
     * @return int
     */
    public function getIdcursoEstud()
    {
        return $this->idcursoEstud;
    }

    /**
     * Set idestudiante
     *
     * @param integer $idestudiante
     *
     * @return VEstudiantes
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
     * Set estudiante
     *
     * @param \Sistema\ColegioBundle\Entity\Estudiantes $estudiante
     *
     * @return VEstudiantes
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

    /**
     * Set maestro
     *
     * @param \Sistema\ColegioBundle\Entity\Maestros $maestro
     *
     * @return VEstudiantes
     */
    public function setMaestro(\Sistema\ColegioBundle\Entity\Maestros $maestro = null)
    {
        $this->maestro = $maestro;

        return $this;
    }

    /**
     * Get maestro
     *
     * @return \Sistema\ColegioBundle\Entity\Maestros
     */
    public function getMaestro()
    {
        return $this->maestro;
    }

    /**
     * Set materia
     *
     * @param \Sistema\ColegioBundle\Entity\Materias $materia
     *
     * @return VEstudiantes
     */
    public function setMateria(\Sistema\ColegioBundle\Entity\Materias $materia = null)
    {
        $this->materia = $materia;

        return $this;
    }

    /**
     * Get materia
     *
     * @return \Sistema\ColegioBundle\Entity\Materias
     */
    public function getMateria()
    {
        return $this->materia;
    }

    /**
     * Set curso
     *
     * @param \Sistema\ColegioBundle\Entity\Cursos $curso
     *
     * @return VEstudiantes
     */
    public function setCurso(\Sistema\ColegioBundle\Entity\Cursos $curso = null)
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * Get curso
     *
     * @return \Sistema\ColegioBundle\Entity\Cursos
     */
    public function getCurso()
    {
        return $this->curso;
    }
}

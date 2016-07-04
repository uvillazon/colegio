<?php

namespace Sistema\ColegioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GesCurso
 *
 * @ORM\Table(name="ges_curso")
 * @ORM\Entity(repositoryClass="Sistema\ColegioBundle\Repository\GesCursoRepository")
 */
class GesCurso
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
     * @var \Gestion
     *
     * @ORM\ManyToOne(targetEntity="Gestion" , inversedBy="gesCurso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idgestion", referencedColumnName="idgestion")
     * })
     */
    private $gestion;

    /**
     * @var \Curso
     *
     * @ORM\ManyToOne(targetEntity="Cursos" , inversedBy="gesCurso")
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
     * @return GesCurso
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
     * @return GesCurso
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
     * @return GesCurso
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
     * Set gestion
     *
     * @param \Sistema\ColegioBundle\Entity\Gestion $gestion
     *
     * @return GesCurso
     */
    public function setGestion(\Sistema\ColegioBundle\Entity\Gestion $gestion = null)
    {
        $this->gestion = $gestion;

        return $this;
    }

    /**
     * Get gestion
     *
     * @return \Sistema\ColegioBundle\Entity\Gestion
     */
    public function getGestion()
    {
        return $this->gestion;
    }

    /**
     * Set curso
     *
     * @param \Sistema\ColegioBundle\Entity\Cursos $curso
     *
     * @return GesCurso
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

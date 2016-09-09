<?php

namespace Sistema\ColegioBundle\Repository;

/**
 * VEstudiantesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VEstudiantesRepository extends BaseRepository
{
    public function obtenerMateriasPorEstudianteGestion($idestudiante, $gestion)
    {
        $estudiantes = $this->findBy(array("idestudiante" => $idestudiante, "idgestion" => $gestion));
        $repoMaterias = $this->_em->getRepository("SistemaColegioBundle:Materias");
        $repoMaestros = $this->_em->getRepository("SistemaColegioBundle:Maestros");
        $repoCurso = $this->_em->getRepository("SistemaColegioBundle:Cursos");
        $rows = array();

        /**
         * @var \Sistema\ColegioBundle\Entity\VEstudiantes $estudiante
         * @var \Sistema\ColegioBundle\Entity\Materias $materia
         * @var \Sistema\ColegioBundle\Entity\Maestros $maestro
         * @var \Sistema\ColegioBundle\Entity\Cursos $curso
         */
        foreach ($estudiantes as $estudiante) {

            $materia = $repoMaterias->findOneBy(array("idmateria" => $estudiante->getIdmateria()));
            $maestro = $repoMaestros->findOneBy(array("idmaestro" => $estudiante->getIdmaestro()));
            $curso = $repoCurso->findOneBy(array("idcurso" => $estudiante->getIdcurso()));
            $row = array(
                "idmateria" => $materia->getIdmateria(),
                "idmaestro" => $maestro->getIdmaestro(),
                "cod_materia" => $materia->getCodMateria(),
                "materia" => $materia->getDescripcion(),
                "nota" => $this->obtenerUltimaNota($estudiante->getIdcursoEstud()),
                "cod_maestro" => $maestro->getCodMaestro(),
                "maestro" => sprintf("%s %s", $maestro->getNombres(), $maestro->getApellidos()),
                "grado" => $curso->getGrado(),
                "cod_grado" => $curso->getCodCurso(),
                "paralelo" => $curso->getParalelo(),
                "ciclo" => $curso->getCiclo()

            );
            array_push($rows, $row);
        }
        return $rows;
    }

    public function obtenerMateriaPorCursoEstudiante($idCursoEstudiante)
    {
//        var_dump($idCursoEstudiante);
        /**
         * @var \Sistema\ColegioBundle\Entity\VEstudiantes $estudiante
         */
        $estudiante = $this->findOneBy(array("idcursoEstud" => $idCursoEstudiante));
        if (is_null($estudiante)) {
            return null;
        }
        return array(
            "idmateria" => $estudiante->getIdmateria(),
            "idmaestro" => $estudiante->getIdmaestro(),
            "cod_materia" => $estudiante->getMateria()->getCodMateria(),
            "materia" => $estudiante->getMateria()->getDescripcion(),
            "nota" => $this->obtenerUltimaNota($estudiante->getIdcursoEstud()),
            "cod_maestro" => $estudiante->getMaestro()->getCodMaestro(),
            "maestro" => sprintf("%s %s", $estudiante->getMaestro()->getNombres(), $estudiante->getMaestro()->getApellidos()),
            "grado" => $estudiante->getCurso()->getGrado(),
            "cod_grado" => $estudiante->getCurso()->getCodCurso(),
            "paralelo" => $estudiante->getCurso()->getParalelo(),
            "ciclo" => $estudiante->getCurso()->getCiclo()

        );
    }

    public function obtenerUltimaNota($idCursoEst)
    {
        $repoEval = $this->_em->getRepository("SistemaColegioBundle:CursoEval");
        /**
         * @var \Sistema\ColegioBundle\Entity\CursoEval $eval
         */
        $eval = $repoEval->findOneBy(array("idcursoEstud" => $idCursoEst), array("idevaluacion" => "DESC"));

        return is_null($eval) ? 0 : $eval->getNotaN();
    }
}
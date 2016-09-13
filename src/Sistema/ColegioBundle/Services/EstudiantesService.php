<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 */

namespace Sistema\ColegioBundle\Services;


use Sistema\ColegioBundle\Model\RespuestaSP;

class EstudiantesService
{
    protected $em;
    protected $repoMaterias;
    protected $repoEstudiante;
    protected $repoEstDisp;
    protected $repoDisp;
    protected $repoNotificaciones;
    protected $repoReuniones;
    protected $repoVEstudiantes;
    protected $repoMaestro;
    protected $repoGestion;
    protected $repoCursoEval;
    protected $repoHorarioMaestro;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {

        $this->em = $em;
        $this->repoMaterias = $this->em->getRepository("SistemaColegioBundle:Materias");
        $this->repoEstudiante = $this->em->getRepository("SistemaColegioBundle:Estudiantes");
        $this->repoEstDisp = $this->em->getRepository("SistemaColegioBundle:DispositivosUsuarios");
        $this->repoDisp = $this->em->getRepository("SistemaColegioBundle:Dispositivos");
        $this->repoNotificaciones = $this->em->getRepository("SistemaColegioBundle:NotificacionesEstudiante");
        $this->repoReuniones = $this->em->getRepository("SistemaColegioBundle:ReunionMaestro");
        $this->repoVEstudiantes = $this->em->getRepository("SistemaColegioBundle:VEstudiantes");
        $this->repoMaestro = $this->em->getRepository("SistemaColegioBundle:Maestros");
        $this->repoGestion = $this->em->getRepository("SistemaColegioBundle:Gestion");
        $this->repoCursoEval = $this->em->getRepository("SistemaColegioBundle:CursoEval");
        $this->repoHorarioMaestro = $this->em->getRepository("SistemaColegioBundle:HorarioMaestro");
//        $this->repoDispositivos = $this->em->getRepository("SistemaColegioBundle:HorarioMaestro");
    }


    /**
     * @param \Sistema\ColegioBundle\Model\PaginacionModel $paginacion
     * @param array $array
     * @return \Sistema\ColegioBundle\Model\ResultPaginacion
     */
    public function obtenerEstudiantesParaApppPaginados($paginacion, $array)
    {
        $result = new \Sistema\ColegioBundle\Model\ResultPaginacion();
        $repo = $this->em->getRepository('SistemaColegioBundle:Estudiantes');
        $query = $repo->createQueryBuilder('app');
//        var_dump($query->getDQL());
        if (!is_null($paginacion->contiene)) {
            $query = $repo->consultaContiene($query, ["cod_estudiante", "nombres", "apellido_paterno", "apelllido_materno", "sexo"], $paginacion->contiene);
        }

        $query = $repo->filtrarDatos($query, $array);

        if (!is_null($array->get("idcurso"))) {
            $idestudiantes = $this->repoVEstudiantes->obtenerIdEstudiantesPorCursoGestion($array->get("idcurso"), 2016);

            $query = $repo->contieneInArray($query, $idestudiantes, "idestudiante");
        }
        $result->total = $repo->total($query);
        if (!$paginacion->isEmpty()) {
            $query = $repo->obtenerElementosPaginados($query, $paginacion);
        }
        $result->rows = $query->getQuery()->getResult();
        $result->success = true;
        return $result;
    }

    /**
     * @param \Sistema\ColegioBundle\Model\PaginacionModel $paginacion
     * @param array $array
     * @return \Sistema\ColegioBundle\Model\ResultPaginacion
     */
    public function obtenerEstudiantesPaginados($paginacion, $array, $iddispositivo)
    {
        $result = new \Sistema\ColegioBundle\Model\ResultPaginacion();
        $repo = $this->em->getRepository('SistemaColegioBundle:Estudiantes');
        $query = $repo->createQueryBuilder('app');
//        var_dump($query->getDQL());
        if (!is_null($paginacion->contiene)) {
            $query = $repo->consultaContiene($query, ["cod_estudiante", "nombres", "sexo"], $paginacion->contiene);
        }
        $query = $repo->filtrarDatos($query, $array);

        if (!is_null($iddispositivo)) {
            $query = $repo->filtrarPorDispositivos($query, $iddispositivo);
        }
        $result->total = $repo->total($query);
        if (!$paginacion->isEmpty()) {
            $query = $repo->obtenerElementosPaginados($query, $paginacion);
        }
        /**
         * @var \Sistema\ColegioBundle\Entity\Estudiantes $item
         */
        foreach ($query->getQuery()->getResult() as $item) {
            $item->materias = $this->repoVEstudiantes->obtenerMateriasPorEstudianteGestion($item->getIdestudiante(), 2016);
            $item->grado = count($item->materias) > 0 ? sprintf("%s %s - %s", $item->materias[0]["grado"], $item->materias[0]["paralelo"], $item->materias[0]["ciclo"]) : "";
            $item->reuniones = $this->repoReuniones->findBy(array("idestudiante" => $item->getIdestudiante()));
            $item->notificaciones = $this->repoNotificaciones->findBy(array("idestudiante" => $item->getIdestudiante()));

        }
        $result->rows = $query->getQuery()->getResult();
        $result->success = true;
        return $result;
    }

    public function guardarEstudianteDispositivo($data, $iddispositivo)
    {
        if (!array_key_exists("cod_estudiante", $data)) {
//            var_dump($data);
            return new RespuestaSP(false, "No Existe Estudiante", null, 401);
        }
        if (!array_key_exists("pin", $data)) {
            return new RespuestaSP(false, " No Existe el Pin", null, 401);
        }
        $est = $this->repoEstudiante->findOneBy(array("codEstudiante" => $data["cod_estudiante"], "pin" => $data["pin"]));
        if (is_null($est)) {
            return new RespuestaSP(false, "El PIN no es igual al del estudiante", null, 403);
        }
        $dispositivo = $this->repoDisp->findOneBy(array("iddispositivo" => $iddispositivo));
        if (is_null($dispositivo)) {
            return new RespuestaSP(false, "No existe el dispositivo", null, 403);
        }

        $disp = $this->repoEstDisp->findOneBy(array("idestudiante" => $est->getIdestudiante(), "iddispositivo" => $iddispositivo));
        if (!is_null($disp)) {
            return new RespuestaSP(false, "Existe el Estdudiante asociado el dispositivo", null, 403);
        }


        $disp = $this->repoDisp->find($iddispositivo);
        $result = $this->repoEstDisp->guardarUsuarioDispositivo($est, $dispositivo);
        $result->data->materias = $this->repoVEstudiantes->obtenerMateriasPorEstudianteGestion($est->getIdestudiante(), 2016);
        $result->data->grado = count($result->data->materias) > 0 ? sprintf("%s %s - %s", $result->data->materias[0]["grado"], $result->data->materias[0]["paralelo"], $result->data->materias[0]["ciclo"]) : "";
        $result->data->reuniones = $this->repoReuniones->findBy(array("idestudiante" => $est->getIdestudiante()));
        $result->data->notificaciones = $this->repoNotificaciones->findBy(array("idestudiante" => $est->getIdestudiante()));
        return $result;


    }

    /**
     * @param \Sistema\ColegioBundle\Model\PaginacionModel $paginacion
     * @param array $array
     * @return \Sistema\ColegioBundle\Model\ResultPaginacion
     */
    public function obtenerMateriasPorEstudiantePaginados($paginacion, $array)
    {
        $result = new \Sistema\ColegioBundle\Model\ResultPaginacion();
        $repo = $this->repoVEstudiantes;
        $query = $repo->createQueryBuilder('app');
        $query = $repo->filtrarDatos($query, $array);
        $result->total = $repo->total($query);
        if (!$paginacion->isEmpty()) {
            $query = $repo->obtenerElementosPaginados($query, $paginacion);
        }

        $rows = array();
        /**
         * @var \Sistema\ColegioBundle\Entity\VEstudiantes $estudiante
         * @var \Sistema\ColegioBundle\Entity\Materias $materia
         * @var \Sistema\ColegioBundle\Entity\Maestros $maestro
         */
        foreach ($query->getQuery()->getResult() as $estudiante) {

            $materia = $this->repoMaterias->findOneBy(array("idmateria" => $estudiante->getIdmateria()));
            $maestro = $this->repoMaestro->findOneBy(array("idmaestro" => $estudiante->getIdmaestro()));
            $row = array(
                "idmateria" => $materia->getIdmateria(),
                "cod_materia" => $materia->getCodMateria(),
                "materia" => $materia->getDescripcion(),
                "nota" => $this->repoVEstudiantes->obtenerUltimaNota($estudiante->getIdcursoEstud()),
                "cod_maestro" => $maestro->getCodMaestro(),
                "maestro" => sprintf("%s %s", $maestro->getNombres(), $maestro->getApellidos())

            );
            array_push($rows, $row);
        }


        $result->rows = $rows;
        $result->success = true;
        return $result;
    }

    /**
     * @param \Sistema\ColegioBundle\Model\PaginacionModel $paginacion
     * @param array $array
     * @return \Sistema\ColegioBundle\Model\ResultPaginacion
     */
    public function obtenerMaestrosPorEstudiantePaginados($paginacion, $array)
    {
        $result = new \Sistema\ColegioBundle\Model\ResultPaginacion();
        $repo = $this->repoVEstudiantes;
        $query = $repo->createQueryBuilder('app');
        $query = $repo->filtrarDatos($query, $array);
        $result->total = $repo->total($query);
        if (!$paginacion->isEmpty()) {
            $query = $repo->obtenerElementosPaginados($query, $paginacion);
        }

        $rows = array();
        $exist = array();
        /**
         * @var \Sistema\ColegioBundle\Entity\VEstudiantes $estudiante
         * @var \Sistema\ColegioBundle\Entity\Maestros $maestro
         */
        foreach ($query->getQuery()->getResult() as $estudiante) {


            $maestro = $this->repoMaestro->findOneBy(array("idmaestro" => $estudiante->getIdmaestro()));
            if (!in_array($maestro->getCodMaestro(), $exist)) {
                $row = array(
                    "id" => $estudiante->getIdcursoMat(),
                    "idmaestro" => $maestro->getIdmaestro(),
                    "cod_maestro" => $maestro->getCodMaestro(),
                    "nombres" => sprintf("%s %s", $maestro->getNombres(), $maestro->getApellidos()),
                    "ci" => $maestro->getCi(),
                    "horarios" => $maestro->getHorarioMaestro(),
                    "disponibles" => $this->repoHorarioMaestro->getHorariosDiponibles($maestro->getIdmaestro(), 2016)


                );
                array_push($rows, $row);
                array_push($exist, $maestro->getCodMaestro());
            }

        }


        $result->rows = $rows;
        $result->success = true;
        return $result;
    }

    /**
     * @param \Sistema\ColegioBundle\Model\PaginacionModel $paginacion
     * @param array $array
     * @return \Sistema\ColegioBundle\Model\ResultPaginacion
     */
    public function obtenerReunionesPorEstudiantePaginados($paginacion, $array)
    {
//        var_dump($array);
        $result = new \Sistema\ColegioBundle\Model\ResultPaginacion();
        $repo = $this->repoReuniones;
        $query = $repo->createQueryBuilder('app');
//        var_dump($query->getDQL());
        if (!is_null($paginacion->contiene)) {
            $query = $repo->consultaContiene($query, ["observaciones"], $paginacion->contiene);
        }
        $query = $repo->filtrarDatos($query, $array);

        $result->total = $repo->total($query);
        if (!$paginacion->isEmpty()) {
            $query = $repo->obtenerElementosPaginados($query, $paginacion);
        }
        $result->rows = $query->getQuery()->getResult();
        $result->success = true;
        return $result;
    }

    /**
     * @param \Sistema\ColegioBundle\Model\PaginacionModel $paginacion
     * @param array $array
     * @return \Sistema\ColegioBundle\Model\ResultPaginacion
     */
    public function obtenerNotificacionesPorEstudiantePaginados($paginacion, $array)
    {
        $result = new \Sistema\ColegioBundle\Model\ResultPaginacion();
        $repo = $this->repoNotificaciones;
        $query = $repo->createQueryBuilder('app');
//        var_dump($query->getDQL());
        if (!is_null($paginacion->contiene)) {
            $query = $repo->consultaContiene($query, ["mensaje"], $paginacion->contiene);
        }
        $query = $repo->filtrarDatos($query, $array);

        $result->total = $repo->total($query);
        if (!$paginacion->isEmpty()) {
            $query = $repo->obtenerElementosPaginados($query, $paginacion);
        }
        $result->rows = $query->getQuery()->getResult();
        $result->success = true;
        return $result;
    }

    public function obtenerDetalleMateriaPorEstudiante($array, $idestudiante, $idmateria)
    {
        $result = new \Sistema\ColegioBundle\Model\RespuestaSP();
        $rows = array();
        $idgestion = $this->repoGestion->obtenerGestionActual();
        /**
         * @var \Sistema\ColegioBundle\Entity\VEstudiantes $estudiante ;
         */

        $estudiante = $this->repoVEstudiantes->findOneBy(array("idgestion" => $idgestion, "idestudiante" => $idestudiante, "idmateria" => $idmateria));
        if (is_null($estudiante)) {
            return new RespuestaSP(false, "No Existe Estudiante Con esa Materia", null, 401);
        }
        $rows["materia"] = $this->repoVEstudiantes->obtenerMateriaPorCursoEstudiante($estudiante->getIdcursoEstud());

        $cursoEval = $this->repoCursoEval->obtenerPeriodoEvaluacionPorIdCursoEstud($estudiante->getIdcursoEstud());
        $rows["periodos"] = $cursoEval;
        $result->data = $rows;
//        var_dump($estudiante->getMateria()->getCodMateria());
        return $result;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 */

namespace Sistema\ColegioBundle\Services;


use Sistema\ColegioBundle\Model\RespuestaSP;

class ReunionesService
{
    protected $em;
    protected $repoHorarioMaestro;
    protected $repoMaestro;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {

        $this->em = $em;
        $this->repoHorarioMaestro = $this->em->getRepository("SistemaColegioBundle:HorarioMaestro");
        $this->repoMaestro = $this->em->getRepository("SistemaColegioBundle:Maestros");

    }

    public function guardarReunionEstudiateMaestro($data)
    {
        if (!array_key_exists("fecha_ini", $data)) {
//            var_dump($data);
            return new RespuestaSP(false, "No Existe Fecha", null, 401);
        }
        if (!array_key_exists("idestudiante", $data)) {
            return new RespuestaSP(false, " No Existe el Estudiante", null, 401);
        }
        if (!array_key_exists("observaciones", $data)) {
            $data["observaciones"] ="sin observacion";
//            return new RespuestaSP(false, " No Existe el Observaciones", null, 401);
        }
        if (!array_key_exists("idmaestro", $data)) {
            return new RespuestaSP(false, " No Existe el Maestro", null, 401);
        }

        $maestro = $this->repoMaestro->find($data["idmaestro"]);

        return $this->repoHorarioMaestro->guardarReunionMaestroEstudiante($data, $maestro);


    }

}
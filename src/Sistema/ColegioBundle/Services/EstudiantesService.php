<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 */

namespace Sistema\ColegioBundle\Services;


class EstudiantesService
{
    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {

        $this->em = $em;
    }

    /**
     * @param \Sistema\ColegioBundle\Model\PaginacionModel $paginacion
     * @param array $array
     * @return \Sistema\ColegioBundle\Model\ResultPaginacion
     */
    public function obtenerEstudiantesPaginados($paginacion, $array)
    {
        $result = new \Sistema\ColegioBundle\Model\ResultPaginacion();
        $repo = $this->em->getRepository('SistemaColegioBundle:Estudiantes');
        $query = $repo->createQueryBuilder('app');
//        var_dump($query->getDQL());
        if (!is_null($paginacion->contiene)) {
            $query = $repo->consultaContiene($query, ["cod_estudiante","nombres","sexo"], $paginacion->contiene);
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

}
<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 */

namespace Sistema\ColegioBundle\Services;


class CursosService
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
    public function obtenerCursosPaginados($paginacion, $array)
    {
        $result = new \Sistema\ColegioBundle\Model\ResultPaginacion();
        $repo = $this->em->getRepository('SistemaColegioBundle:Cursos');
        $query = $repo->createQueryBuilder('app');
        if (!is_null($paginacion->contiene)) {
            $query = $repo->consultaContiene($query, ["cod_curso", "ciclo", "turno"], $paginacion->contiene);
        }
        $query = $repo->filtrarDatos($query, $array);
        $result->total = $repo->total($query);
        if (!$paginacion->isEmpty()) {
            $query = $repo->obtenerElementosPaginados($query, $paginacion);
        }
        foreach ($query->getQuery()->getResult() as $curso) {
            $curso->optimizar();
        }
        $result->rows = $query->getQuery()->getResult();
        $result->success = true;
        return $result;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 */

namespace Sistema\ColegioBundle\Services;


class DispositivosService
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
    public function obtenerDispositivosPaginados($paginacion, $array)
    {
        $result = new \Sistema\ColegioBundle\Model\ResultPaginacion();
        $repo = $this->em->getRepository('SistemaColegioBundle:Dispositivos');
        $query = $repo->createQueryBuilder('app');
        if (!is_null($paginacion->contiene)) {
            $query = $repo->consultaContiene($query, ["imei", "token", "estado"], $paginacion->contiene);
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


    public function editarDispositivo($data)
    {
        $repo = $this->em->getRepository('SistemaColegioBundle:Dispositivos');
        $result = $repo->editarDispositivo($data);
        return $result;

    }

}
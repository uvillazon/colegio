<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 */

namespace Sistema\ColegioBundle\Services;


class EstudiantesService
{
    protected $em;
    protected $repoMaterias;

    public function __construct(\Doctrine\ORM\EntityManager $em)
    {

        $this->em = $em;
        $this->repoMaterias = $this->em->getRepository("SistemaColegioBundle:Materias");
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
            $item->materias = $this->repoMaterias->findAll();
        }
        $result->rows = $query->getQuery()->getResult();
        $result->success = true;
        return $result;
    }

}
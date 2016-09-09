<?php

namespace Sistema\ColegioBundle\Controller;

use Sistema\ColegioBundle\Model\RespuestaSP;
use Sistema\ColegioBundle\Model\ResultPaginacion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;


class ProfesoresController extends BaseController
{
    /**
     * Obtener Notificaciones Paginados
     * formato de respuesta pagiandos
     * rows  : listas de objetos segun lo paginado, success : false o true  , total cantidad de registros encontrados
     * formato de envio
     * start : desde donde empieza, limit : cantidad para mostrar , dir : Ordenamiento ASC o DESC , sort Ordenar por la propiedad (Propiedad de alguna columna a ordenar ) ,
     * contiene : para buscar text libre ,
     * para filtros de datos enviar
     * propiedad de la tabla : valor , operador = AND o OR por defecto esta AND
     * por ejemplo para periodos quiero filtrar todos los periodos con etapa a REGIMEN y nro resolucion LL tengo que enviar
     * etapa : REGIMEN , nro_resolucion : lL
     * @Rest\Get("/profesores/{id}/reuniones")
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Notificaciones Paginado",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     */
    public function getProfesoresReunionesAction(Request $request)
    {
        //TODO filtrar por sysdate y filtrar por estado = {disponible}
//          $paginacion = $this->obtenerPaginacion($request);
//        $servicio = $this->get('colegiobundle.estudiantes_service');
//        $dispo = $this->container->get("JWTDispositivo");
////        var_dump($dispo);
//        $iddispositivo = is_null($dispo) ? null : $dispo->iddispositivo;
//        $array = $request->query;
//        $result = $servicio->obtenerEstudiantesPaginados($paginacion, $array, $iddispositivo);
        $fecha_ini = new \DateTime('2016-08-29T15:00:00.0');
        $fecha_fin = new \DateTime('2016-08-29T15:15:00.0');
        $rows = array(
            array("fecha_ini" => $fecha_ini, "fecha_fin" => $fecha_fin),
            array("fecha_ini" => $fecha_ini->add(), "fecha_fin" => $fecha_fin),
        );


        return $this->response(new ResultPaginacion(true, null, $rows, 2));
    }
}

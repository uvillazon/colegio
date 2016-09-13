<?php

namespace Sistema\ColegioBundle\Controller;

use Sistema\ColegioBundle\Model\RespuestaSP;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;


class NotificacionesController extends BaseController
{
    /**
     * Obtener Depositos Fisicos Paginados
     * formato de respuesta pagiandos
     * rows  : listas de objetos segun lo paginado, success : false o true  , total cantidad de registros encontrados
     * formato de envio
     * start : desde donde empieza, limit : cantidad para mostrar , dir : Ordenamiento ASC o DESC , sort Ordenar por la propiedad (Propiedad de alguna columna a ordenar ) ,
     * contiene : para buscar text libre ,
     * para filtros de datos enviar
     * propiedad de la tabla : valor , operador = AND o OR por defecto esta AND
     * por ejemplo para periodos quiero filtrar todos los periodos con etapa a REGIMEN y nro resolucion LL tengo que enviar
     * etapa : REGIMEN , nro_resolucion : lL
     * @Rest\Get("/notificaciones")
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Depositos Fisicos Paginado",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     */
    public function getNotificacionesAction(Request $request)
    {
        $paginacion = $this->obtenerPaginacion($request);
        $servicio = $this->get('colegiobundle.notificaciones_service');
        $array = $request->query;
        $result = $servicio->obtenerNotificacionesPaginados($paginacion, $array);
        return $result;
    }

    /**
     * @Rest\get("/notificaciones/tipo")
     * @param Request $request
     * @return mixed
     */
    public function getTipoNotificacionesAction(Request $request)
    {
        $paginacion = $this->obtenerPaginacion($request);
        $servicio = $this->get('colegiobundle.notificaciones_service');
        $array = $request->query;
        $result = $servicio->obtenerTiposNotificacionesPaginados($paginacion, $array);
        return $result;
    }

    /**
     * @Rest\Post("/notificaciones")
     * @param Request $requesta
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function postEnviarEstudianteAction(Request $request)
    {
        $data = $this->arrayToFormPost($request);
//        var_dump($data);
        $servicio = $this->get('colegiobundle.notificaciones_service');
        if ($data["idtipo_notificacion"] === "1") {
            $result = $servicio->enviarNotificacionesPorEstudiante($data, "rsaavedra");
        } else if ($data["idtipo_notificacion"] === "2") {
            $result = $servicio->enviarNoticicacionesPorCurso($data, "rsaavedra");
        } else {
            $result = new RespuestaSP(false, " No esta implementado el tipo", null, 403);
        }
        return $this->response($result);
    }
}

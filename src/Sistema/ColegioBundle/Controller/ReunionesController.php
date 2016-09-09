<?php

namespace Sistema\ColegioBundle\Controller;

use Sistema\ColegioBundle\Model\RespuestaSP;
use Sistema\ColegioBundle\Model\ResultPaginacion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;


class ReunionesController extends BaseController
{
    /**
     * Obtener reuniones Paginados
     * formato de respuesta pagiandos
     * rows  : listas de objetos segun lo paginado, success : false o true  , total cantidad de registros encontrados
     * formato de envio
     * start : desde donde empieza, limit : cantidad para mostrar , dir : Ordenamiento ASC o DESC , sort Ordenar por la propiedad (Propiedad de alguna columna a ordenar ) ,
     * contiene : para buscar text libre ,
     * para filtros de datos enviar
     * propiedad de la tabla : valor , operador = AND o OR por defecto esta AND
     * por ejemplo para periodos quiero filtrar todos los periodos con etapa a REGIMEN y nro resolucion LL tengo que enviar
     * etapa : REGIMEN , nro_resolucion : lL
     * @Rest\Get("/reuniones")
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Reuniones Paginado",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     */
    public function getReunionesAction(Request $request)
    {
//          $paginacion = $this->obtenerPaginacion($request);
//        $servicio = $this->get('colegiobundle.estudiantes_service');
//        $dispo = $this->container->get("JWTDispositivo");
////        var_dump($dispo);
//        $iddispositivo = is_null($dispo) ? null : $dispo->iddispositivo;
//        $array = $request->query;
//        $result = $servicio->obtenerEstudiantesPaginados($paginacion, $array, $iddispositivo);
        return $this->response(new ResultPaginacion());
    }

    /**
     * parametros a enviar
     *{idestudiante , idmaestro , fecha_ini , fecha_fin, motivo }
     * msg = "mensaje de la accion" , id = "Id del objeto guardado" , data = datos del estudiantes guardado}
     * Se debe enviar los nombres de las propiedades de las tablas de la BD
     * s
     * @Rest\Post("/reuniones")
     * @ApiDoc(
     *   resource = true,
     *   description = "agregar estudiante a dispositivo",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     *
     */
    public function ReuncionesAction(Request $request)
    {
        //TODO registrar relacion entre dispositovo y esudiante y retornar en el data los datos del estudiante retornar 201
//        guardarReunionEstudiateMaestro
        $servicio = $this->get('colegiobundle.reunion_service');
        $data = $request->request->all();
        $result = $servicio->guardarReunionEstudiateMaestro($data);
        return $this->response($result);
    }
}

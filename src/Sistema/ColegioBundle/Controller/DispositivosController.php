<?php

namespace Sistema\ColegioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;


class DispositivosController extends BaseController
{
    /**
     * Obtener Estudiantes Paginados
     * formato de respuesta pagiandos
     * rows  : listas de objetos segun lo paginado, success : false o true  , total cantidad de registros encontrados
     * formato de envio
     * start : desde donde empieza, limit : cantidad para mostrar , dir : Ordenamiento ASC o DESC , sort Ordenar por la propiedad (Propiedad de alguna columna a ordenar ) ,
     * contiene : para buscar text libre ,
     * para filtros de datos enviar
     * propiedad de la tabla : valor , operador = AND o OR por defecto esta AND
     * por ejemplo para periodos quiero filtrar todos los periodos con etapa a REGIMEN y nro resolucion LL tengo que enviar
     * etapa : REGIMEN , nro_resolucion : lL
     * @Rest\Get("/")
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Estudiantes Paginado",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     */
    public function getDispositivosAction(Request $request)
    {
        $paginacion = $this->obtenerPaginacion($request);
        $servicio = $this->get('colegiobundle.dispositivo_service');
        $array = $request->query;
        $result = $servicio->obtenerDispositivosPaginados($paginacion, $array);
        return $result;
    }

    /**
     * Este Metodo desasignar lotes a Ordenes de Trabajo
     * como resultado devuelve los sig. datos{ success= true cuando esta correcto o false si ocurrio algun problema}
     * msg = "mensaje de la accion" , id = "Id del objeto guardado" , data = datos del objeto guardado}
     * Se debe enviar los nombres de las propiedades de las tablas de la BD
     * @Rest\Put("/")
     * @ApiDoc(
     *   resource = true,
     *   description = "Metodo de Designacion de Lote de  Ordenes de Trabajo",
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
    public function putDispositivosAction(Request $request) {

        $data = $this->arrayToFormPost($request);
        $servicio = $this->get('colegiobundle.dispositivo_service');
        $result = $servicio->editarDispositivo($data);
        return $result;

    }
}

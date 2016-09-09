<?php

namespace Sistema\ColegioBundle\Controller;

use Sistema\ColegioBundle\Model\RespuestaSP;
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
     * @Rest\Get("dispositivos")
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
     * enviar fcm_token
     * msg = "mensaje de la accion" , id = "Id del objeto guardado" , data = datos del objeto guardado}
     * Se debe enviar los nombres de las propiedades de las tablas de la BD
     * s
     * @Rest\Put("/dispositivos/{imei}")
     * @ApiDoc(
     *   resource = true,
     *   description = "Actualizar",
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
    public function putDispositivosAction(Request $request, $imei)
    {
        //validar el imei es igual al de token para actualiazar el token

        $data = $this->arrayToFormPost($request);
        $dispo = $this->container->get("JWTDispositivo");
//        var_dump($imei);
        if ($imei != $dispo->imei) {
            return new RespuestaSP(false, "Imei no corresponde con el token enviado", null, 401);
        }
        $iddispositivo = is_null($dispo) ? null : $dispo->iddispositivo;

        $servicio = $this->get('colegiobundle.dispositivo_service');
        $data["iddispositivo"] = $iddispositivo;
        $result = $servicio->editarDispositivo($data);
//        return $result;
        return $this->response($result);

    }
}

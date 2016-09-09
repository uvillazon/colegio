<?php

namespace Sistema\ColegioBundle\Controller;

use Sistema\ColegioBundle\Model\RespuestaSP;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;


class EstudiantesController extends BaseController
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
     * @Rest\Get("/estudiantes")
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
    public function getEstudiantesAction(Request $request)
    {
        //TODO retornar materias , reuniones , notificaciones
        $paginacion = $this->obtenerPaginacion($request);
        $servicio = $this->get('colegiobundle.estudiantes_service');
        $dispo = $this->container->get("JWTDispositivo");
//        var_dump($dispo);
        $iddispositivo = is_null($dispo) ? null : $dispo->iddispositivo;
        $array = $request->query;
        $result = $servicio->obtenerEstudiantesPaginados($paginacion, $array, $iddispositivo);
        return $this->response($result);
    }

    /**
     * Obtener reuniones del estudiante Paginados
     * formato de respuesta pagiandos
     * rows  : listas de objetos segun lo paginado, success : false o true  , total cantidad de registros encontrados
     * formato de envio
     * start : desde donde empieza, limit : cantidad para mostrar , dir : Ordenamiento ASC o DESC , sort Ordenar por la propiedad (Propiedad de alguna columna a ordenar ) ,
     * contiene : para buscar text libre ,
     * para filtros de datos enviar
     * propiedad de la tabla : valor , operador = AND o OR por defecto esta AND
     * por ejemplo para periodos quiero filtrar todos los periodos con etapa a REGIMEN y nro resolucion LL tengo que enviar
     * etapa : REGIMEN , nro_resolucion : lL
     * @Rest\Get("/estudiantes/{id}/reuniones")
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
    public function getReunionesEstudiantesAction(Request $request, $id)
    {
        $paginacion = $this->obtenerPaginacion($request);
        $servicio = $this->get('colegiobundle.estudiantes_service');
        $array = $request->query;
        $array->set('idestudiante', $id);
        $result = $servicio->obtenerReunionesPorEstudiantePaginados($paginacion, $array);
        return $this->response($result);
    }

    /**
     * Obtener reuniones del estudiante Paginados
     * formato de respuesta pagiandos
     * rows  : listas de objetos segun lo paginado, success : false o true  , total cantidad de registros encontrados
     * formato de envio
     * start : desde donde empieza, limit : cantidad para mostrar , dir : Ordenamiento ASC o DESC , sort Ordenar por la propiedad (Propiedad de alguna columna a ordenar ) ,
     * contiene : para buscar text libre ,
     * para filtros de datos enviar
     * propiedad de la tabla : valor , operador = AND o OR por defecto esta AND
     * por ejemplo para periodos quiero filtrar todos los periodos con etapa a REGIMEN y nro resolucion LL tengo que enviar
     * etapa : REGIMEN , nro_resolucion : lL
     * @Rest\Get("/estudiantes/{id}/notificaciones")
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
    public function getNotificacionesEstudiantesAction(Request $request, $id)
    {
        $paginacion = $this->obtenerPaginacion($request);
        $servicio = $this->get('colegiobundle.estudiantes_service');
        $array = $request->query;
        $array->set('idestudiante', $id);
        $result = $servicio->obtenerNotificacionesPorEstudiantePaginados($paginacion, $array);
        return $this->response($result);
    }

    /**
     * Obtener reuniones del estudiante Paginados
     * formato de respuesta pagiandos
     * rows  : listas de objetos segun lo paginado, success : false o true  , total cantidad de registros encontrados
     * formato de envio
     * start : desde donde empieza, limit : cantidad para mostrar , dir : Ordenamiento ASC o DESC , sort Ordenar por la propiedad (Propiedad de alguna columna a ordenar ) ,
     * contiene : para buscar text libre ,
     * para filtros de datos enviar
     * propiedad de la tabla : valor , operador = AND o OR por defecto esta AND
     * por ejemplo para periodos quiero filtrar todos los periodos con etapa a REGIMEN y nro resolucion LL tengo que enviar
     * etapa : REGIMEN , nro_resolucion : lL
     * @Rest\Get("/estudiantes/{id}/profesores")
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
    public function getProfesoresEstudiantesAction(Request $request, $id)
    {
        //TODO agregar fechas disponibles {fecha_ini datetime - fecha_fin datetime} apartir de cuando lo solicita
        $paginacion = $this->obtenerPaginacion($request);
        $servicio = $this->get('colegiobundle.estudiantes_service');
        $array = $request->query;
        $array->set("idestudiante", $id);
        $array->set("idgestion", 2016);
        $result = $servicio->obtenerMaestrosPorEstudiantePaginados($paginacion, $array);
        return $this->response($result);
    }

    /**
     * Obtener materias Paginados
     * formato de respuesta pagiandos
     * rows  : listas de objetos segun lo paginado, success : false o true  , total cantidad de registros encontrados
     * formato de envio
     * start : desde donde empieza, limit : cantidad para mostrar , dir : Ordenamiento ASC o DESC , sort Ordenar por la propiedad (Propiedad de alguna columna a ordenar ) ,
     * contiene : para buscar text libre ,
     * para filtros de datos enviar
     * propiedad de la tabla : valor , operador = AND o OR por defecto esta AND
     * por ejemplo para periodos quiero filtrar todos los periodos con etapa a REGIMEN y nro resolucion LL tengo que enviar
     * etapa : REGIMEN , nro_resolucion : lL
     * @Rest\Get("/estudiantes/{id}/materias")
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Materias del estudiante Paginado",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     */
    public function getMateriasEstudiantesAction(Request $request, $id)
    {
        //TODO Obtener materias de  la gestion activa retornar la nota del ultimo periodo
        $paginacion = $this->obtenerPaginacion($request);
        $servicio = $this->get('colegiobundle.estudiantes_service');
        $array = $request->query;
        $array->set("idestudiante", $id);
        $array->set("idgestion", 2016);
        $result = $servicio->obtenerMateriasPorEstudiantePaginados($paginacion, $array);
        return $this->response($result);
    }

    /**
     * Obtener materias Paginados
     * formato de respuesta pagiandos
     * rows  : listas de objetos segun lo paginado, success : false o true  , total cantidad de registros encontrados
     * formato de envio
     * start : desde donde empieza, limit : cantidad para mostrar , dir : Ordenamiento ASC o DESC , sort Ordenar por la propiedad (Propiedad de alguna columna a ordenar ) ,
     * contiene : para buscar text libre ,
     * para filtros de datos enviar
     * propiedad de la tabla : valor , operador = AND o OR por defecto esta AND
     * por ejemplo para periodos quiero filtrar todos los periodos con etapa a REGIMEN y nro resolucion LL tengo que enviar
     * etapa : REGIMEN , nro_resolucion : lL
     * @Rest\Get("/estudiantes/{idestudiante}/materias/{idmateria}")
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Materias del estudiante Paginado",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     */
    public function getMateriasEstudiantesDetalleAction(Request $request, $idestudiante, $idmateria)
    {
        $servicio = $this->get('colegiobundle.estudiantes_service');
        $array = $request->query;
        $result = $servicio->obtenerDetalleMateriaPorEstudiante($array, $idestudiante, $idmateria);
        return $this->response($result);
    }


    /**
     * parametros a enviar
     *{cod_estudiante , pin}
     * msg = "mensaje de la accion" , id = "Id del objeto guardado" , data = datos del estudiantes guardado}
     * Se debe enviar los nombres de las propiedades de las tablas de la BD
     * s
     * @Rest\Post("/estudiantes")
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
    public function EstudiantesAction(Request $request)
    {
        //TODO registrar relacion entre dispositovo y esudiante y retornar en el data los datos del estudiante retornar 201

        $dispo = $this->container->get("JWTDispositivo");
        $servicio = $this->get('colegiobundle.estudiantes_service');
        $data = $request->request->all();
        $result = $servicio->guardarEstudianteDispositivo($data, $dispo->iddispositivo);
        return $this->response($result);

    }


    /**
     * Obtener Estadisticas de Estudiante
     * respuesta data : {notas_estudiante : {array(periodo , nota)}, notas_curso {array(periodo , nota)}}
     * @Rest\Get("/estudiantes/{idestudiante}/estadisticas")
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Mat Paginado",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     */
    public function getEstadisticasAction(Request $request)
    {
        /**
         * TODO
         * tipo=1 obligatorio enviar el idmateria
         * estadistica por materia del estdiante
         * respuesta data : {notas_estudiante : {array(periodo , nota)}, notas_curso {array(periodo , notas)}}
         */
//          $paginacion = $this->obtenerPaginacion($request);
//        $servicio = $this->get('colegiobu ndle.estudiantes_service');
//        $dispo = $this->container->get("JWTDispositivo");
////        var_dump($dispo);
//        $iddispositivo = is_null($dispo) ? null : $dispo->iddispositivo;
//        $array = $request->query;
//        $result  = $servicio->obtenerEstudiantesPaginados($paginacion, $array, $iddispositivo);
        return $this->response(new RespuestaSP());
    }
}

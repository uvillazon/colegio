<?php

namespace Sistema\ColegioBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\Date;

class TokenController extends BaseController
{

    /**
     * Obtencion de Token como parametros se tiene que enviar
     * @Rest\Get("/token")
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener ass Paginado",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     */
    public function getTokenAction(Request $request)
    {
        $servicio = $this->get('sgauthbundle.autenticacion_service');
        $array = $request->query;
        $header = $request->headers;
        $result = $servicio->generarTokenPorUsuarioApp($array, $header);
//        $result = $servicio->generarTokenPorUsuarioApp($array,$header);
        return $result;
    }

    /**
     * Obtencion de Token como parametros se tiene que enviar {codigoApp : codigo de aplicacion
     * username : usuario
     * password : password}
     * }
     * @Rest\Post("/token")
     * @ApiDoc(
     *   resource = true,
     *   description = "Obtener Token",
     *   output = "Array",
     *   authentication = true,
     *   statusCodes = {
     *     200 = "Returned when successful",
     *     404 = "Returned when the page is not found",
     *     403 = "Returned when permission denied"
     *   }
     * )
     */
    public function postTokenAction(Request $request)
    {

        $servicio = $this->get('colegiobundle.autenticacion_service');
        $array = $request->request->all();

        $header = $request->headers;
        $result = $servicio->generarTokenPorDispositivo($array, $header);


        return $result;
    }
}

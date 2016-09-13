<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 */

namespace Sistema\ColegioBundle\Services;

use Sistema\ColegioBundle\Model\RespuestaSP;
use sngrl\PhpFirebaseCloudMessaging\Client;
use sngrl\PhpFirebaseCloudMessaging\Message;
use sngrl\PhpFirebaseCloudMessaging\Recipient\Device;
use sngrl\PhpFirebaseCloudMessaging\Notification;

class NotificacionesService
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
    public function obtenerTiposNotificacionesPaginados($paginacion, $array)
    {
        $result = new \Sistema\ColegioBundle\Model\ResultPaginacion();
        $repo = $this->em->getRepository('SistemaColegioBundle:TipoNotificacion');
        $query = $repo->createQueryBuilder('app');
        if (!is_null($paginacion->contiene)) {
            $query = $repo->consultaContiene($query, ["tipo"], $paginacion->contiene);
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

    /**
     * @param \Sistema\ColegioBundle\Model\PaginacionModel $paginacion
     * @param array $array
     * @return \Sistema\ColegioBundle\Model\ResultPaginacion
     */
    public function obtenerNotificacionesPaginados($paginacion, $array)
    {
        $result = new \Sistema\ColegioBundle\Model\ResultPaginacion();
        $repo = $this->em->getRepository('SistemaColegioBundle:NotificacionesEstudiante');
        $repoEst = $this->em->getRepository('SistemaColegioBundle:Estudiantes');
        $query = $repo->createQueryBuilder('app');
        if (!is_null($paginacion->contiene)) {
            $query = $repo->consultaContiene($query, ["titulo"], $paginacion->contiene);
        }
        $query = $repo->filtrarDatos($query, $array);
        $result->total = $repo->total($query);
        if (!$paginacion->isEmpty()) {
            $query = $repo->obtenerElementosPaginados($query, $paginacion);
        }
        foreach ($query->getQuery()->getResult() as $item) {
            $est = $repoEst->find($item->getIdestudiante());
            $item->estudiante = is_null($est) ? "" : $est->getNombres() . " " . $est->getApellidoPaterno() . " " . $est->getApellidoMaterno();
        }
        $result->rows = $query->getQuery()->getResult();
        $result->success = true;
        return $result;
    }

    /**
     * @param \Sistema\ColegioBundle\Model\PaginacionModel $paginacion
     * @param array $array
     * @return \Sistema\ColegioBundle\Model\ResultPaginacion
     */
    public function enviarNotificacionese($paginacion, $array)
    {
        var_dump(openssl_get_cert_locations());
        $server_key = 'AIzaSyAs4q70QOMW6K6ur4k0-kp0mzTMcYkeum4';
        $client = new Client();
//        var_dump($client);
        $client->setApiKey($server_key);
        $client->injectGuzzleHttpClient(new \GuzzleHttp\Client());

        $message = new Message();
        $message->setPriority('high');
        $message->addRecipient(new Device('e2AYHkWRIwQ:APA91bFGe19fQPVlq-jU9Ft7u66FEqDAY9zfpPwRuawKokLbMTiGqZyce-p1LbBB4avAn_PZtcWclnrs4xJTYHN58JSOqmEOT9BkbUx8_QsnUX-uWOexKqzeaimdqa-ceojAITQkFAON'));
        $message
            ->setNotification(new Notification('some title', 'some body'))
            ->setData(['key' => 'value']);

        $response = $client->send($message);
        var_dump($response->getStatusCode());
        var_dump($response->getBody()->getContents());

        var_dump($paginacion);


        $fcm = new \FCMSimple("AIzaSyAs4q70QOMW6K6ur4k0-kp0mzTMcYkeum4");
        $fcm->setTokens(array("1"));
        var_dump($fcm);
        $messageData = array(
            'notification' =>
                array(
                    "title" => "Portugal vs. Denmark",
                    "text" => "5 to 1"
                ),
            'to' => "e2AYHkWRIwQ:APA91bFGe19fQPVlq-jU9Ft7u66FEqDAY9zfpPwRuawKokLbMTiGqZyce-p1LbBB4avAn_PZtcWclnrs4xJTYHN58JSOqmEOT9BkbUx8_QsnUX-uWOexKqzeaimdqa-ceojAITQkFAON"
        );
        $response = $fcm->send($messageData);

        var_dump($response);
        die();

    }

    public function send($data, $registers_ids)
    {
        try {
            $fcm = new \FCMSimple("AIzaSyAs4q70QOMW6K6ur4k0-kp0mzTMcYkeum4");
            $fcm->setTokens($registers_ids);
            $messageData = $data;
//            var_dump($messageData);
            $response = $fcm->send($messageData);
//            var_dump($response);
            return $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtenerDispositivosPorEstudiante($idestudiante)
    {
        $repo = $this->em->getRepository("SistemaColegioBundle:DispositivosUsuarios");
        $dispositivos = $repo->findBy(array("idestudiante" => $idestudiante));
        /**
         * @var \Sistema\ColegioBundle\Entity\DispositivosUsuarios $dispositivo
         */
        $register_ids = array();
        foreach ($dispositivos as $dispositivo) {
            $fcmtoken = $dispositivo->getDispositivo()->getFcmToken();
            $register_ids[] = $fcmtoken;
        }
//        var_dump(array_values($register_ids));
        return array_values($register_ids);
    }

    public function enviarNoticicacionesPorCurso($data, $login)
    {
        if (!array_key_exists("idcurso", $data)) {
            return new RespuestaSP(false, "no existe el campo idcurso", null, 403);
        }
        $repo = $this->em->getRepository("SistemaColegioBundle:Cursos");
        $curso = $repo->find($data["idcurso"]);
        if (is_null($curso)) {
            return new RespuestaSP(false, "no existe el curso", null, 403);

        }
        $repoVestudiante = $this->em->getRepository("SistemaColegioBundle:VEstudiantes");
        $idestudiantes = $repoVestudiante->obtenerIdEstudiantesPorCursoGestion($data["idcurso"], 2016);
        $error = array();
        for ($i = 0; $i < count($idestudiantes); $i++) {
            $data["idestudiante"] = $idestudiantes[$i];
            $result = $this->enviarNotificacionesPorEstudiante($data, $login);
            if (!$result->success) {
                array_push($error, $result->msg);
            }
        }
        return new RespuestaSP(true, $error, null, 200);


    }

    public function enviarNotificacionesPorEstudiante($data, $login)
    {

        /**
         * @var \Sistema\ColegioBundle\Entity\Estudiantes $estudiante
         *
         */
        $repoNotifi = $this->em->getRepository("SistemaColegioBundle:Notificacion");
        if (!array_key_exists("idestudiante", $data)) {
            return new RespuestaSP(false, "no existe el campo idestudiante", null, 403);
        }
        $repo = $this->em->getRepository("SistemaColegioBundle:Estudiantes");
        $estudiante = $repo->find($data["idestudiante"]);
        if (is_null($estudiante)) {
            return new RespuestaSP(false, "no existe el estudiante", null, 403);

        }
        $repoDis = $this->em->getRepository("SistemaColegioBundle:DispositivosUsuarios");
        $dispositivos = $repoDis->findBy(array("idestudiante" => $data["idestudiante"]));
        if (count($dispositivos) === 0) {
            return new RespuestaSP(false, "no tiene dispositivos para enviar", null, 403);
        }
        $date = new \DateTime();
        $message = array(
            "idestudiante" => (integer)$estudiante->getIdestudiante(),
            "fecha_envio" => $date,
            "titulo" => $data["titulo"],
            "mensaje" => $data["mensaje"],
            "nombre_emisor" => $login,
            "idnotificacion" => 1

        );
//        var_dump($message);
        $ids = $this->obtenerDispositivosPorEstudiante($estudiante->getIdestudiante());
//        var_dump($ids);
        $mensajefcm = $this->send($message, $ids);


        $repoNotifi->guardarNotificacion($message);
        return new RespuestaSP(true, "proceso ejectuado correctamente", array("ids" => $ids, "message" => $mensajefcm), 200);
    }

    public function sendNotificaciones($data, $login)
    {
        $data = array(
            "idestudiante" => 1,

        );
    }

}
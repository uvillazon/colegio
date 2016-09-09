<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 */

namespace Sistema\ColegioBundle\Services;

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
    public function enviarNotificaciones($paginacion, $array)
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
            ->setData(['key' => 'value'])
        ;

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

}
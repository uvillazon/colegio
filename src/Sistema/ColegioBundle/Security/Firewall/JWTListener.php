<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 */

namespace Sistema\ColegioBundle\Security\Firewall;


use Sistema\ColegioBundle\Security\Authentication\Token\JWTUserToken;
use Firebase\JWT\JWT;
use Symfony\Component\HttpFoundation\Tests\StringableObject;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Http\Firewall\ListenerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\AuthenticationManagerInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;


class JWTListener implements ListenerInterface
{
    /**
     * @var $container Container
     */
    protected $container;
    protected $tokenStorage;
    protected $authenticationManager;
    protected $secret = "developmentSessionSecret";

    public function __construct(TokenStorageInterface $tokenStorage, AuthenticationManagerInterface $authenticationManager)
    {
        $this->tokenStorage = $tokenStorage;
        $this->authenticationManager = $authenticationManager;
    }

    /**
     * This interface must be implemented by firewall listeners.
     *
     * @param GetResponseEvent $event
     */
    public function handle(GetResponseEvent $event)
    {

        $request = $event->getRequest();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $encoder = str_replace("Bearer ", "", $request->headers->get('Authorization'));
        if (empty($encoder)) {
            $response->setStatusCode(Response::HTTP_FORBIDDEN);
            $event->setResponse($response);
        } else {
            try {
                $decoded = JWT::decode($encoder, $this->secret, array('HS256'));
                $token = new JWTUserToken();
                $token->setRawToken($decoded);
                $this->container->set("JWTToken", $token);
                $this->container->set("JWTDispositivo", $decoded->dispositivo);
//                var_dump($token);
                //Ccreamos la coneccion
//                $coneccion = $this->container->get("database_connection");
//                $coneccion->close();

//                $refCon = new \ReflectionObject($coneccion);

//                $refParams = $refCon->getProperty("_params");
//                $refParams->setAccessible("public");
//
//                $params = $refParams->getValue($coneccion);
//                $params["dbname"] = $keydecoded->dbname;
//                $params["user"] = $keydecoded->user;
//                $params["password"] = $keydecoded->password;
//                $params["driver"] = $keydecoded->driver;
//                $params["host"] = $keydecoded->host;
//                $params["port"] = $keydecoded->port;
//                $refParams->setAccessible("private");
//                $refParams->setValue($coneccion, $params);
//                $this->container->get("doctrine")->resetEntityManager("default");
                return;
            } catch (\Exception $a) {
                if ($a->getMessage() === "Expired token") {
//                    var_dump($a->getCode());
                    $response->setContent($a->getMessage());
                    $response->setStatusCode(Response::HTTP_FORBIDDEN);
//                    $response->set
                    $event->setResponse($response);
                } else {
//                    var_dump($encoder);
                    $response->setContent($a->getMessage()+" "+$encoder);
                    var_dump($a->getMessage());
                    $response->setStatusCode(Response::HTTP_FAILED_DEPENDENCY);
                    $event->setResponse($response);
                }
            }
        }
    }

    public function setContainer(Container $container = null)
    {
        $this->container = $container;
    }
}
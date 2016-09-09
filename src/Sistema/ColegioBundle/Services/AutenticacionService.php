<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 * Date: 16/07/2015
 * Time: 03:59 PM
 */

namespace Sistema\ColegioBundle\Services;


use Doctrine\ORM\Tools\Export\ExportException;
use Exception;
use Firebase\JWT\JWT;
use Sistema\ColegioBundle\Model\RespuestaSP;

class AutenticacionService
{
    protected $em;
    private $usrArray = array();
    private $idUsr = 0;
    private $signature1 = "mVLHKIEd785USmwZfSD6tSOr4/M=";
    private $signature2 = "3FyKWEU/LSEdiYk1f5hE8DjknO8=";
    private $versionIni = 1;
    private $versionFin = 30;


    public function __construct(\Doctrine\ORM\EntityManager $em)
    {

        $this->em = $em;
    }

    private function verificarSignature($imei, $key)
    {
        $repo = $this->em->getRepository("ColegioSistemaBundle:Key");
        $keys = $repo->findBy(array("estado" => "activo"));
        /**
         * @var \Sistema\ColegioBundle\Entity\Key $key
         */
        foreach ($keys as $key) {
            $hash1 = $imei . "" . $key->getKey() . "" . $key->getKey();
            if ($key === sha1($hash1)) {
                return true;
            }
        }
        return false;

//        for ($i = $this-> = versionIni; $i <= $this->versionFin; $i++) {
//            $hash1 = $imei . "" . $this->signature1 . "" . (string)$i;
//            $hash2 = $imei . "" . $this->signature2 . "" . (string)$i;
//            if ($key === sha1($hash1)) {
//                return true;
//            }
//        }
//        $hash = $imei . "" . $this->signature . "" . $this->version;
////        var_dump($hash);
//        if ($key === sha1($hash) || $key === sha1($hash)) {
//            return true;
//        }
        return false;
    }

    public function generarTokenPorDispositivo($data)
    {
        $result = new \Sistema\ColegioBundle\Model\RespuestaSP();
        $imei = $data["imei"];
        $key = $data["key"];
        if (!$this->verificarSignature($imei, $key)) {

            $result->success = false;
            $result->msg = "Signature Failed";
            $result->code = 401;
            return $result;
        }

        if (array_key_exists("key", $data)) {
//        var_dump($key);
            $managerDispositivo = $this->em->getRepository('SistemaColegioBundle:Dispositivos');
            $aplic = $managerDispositivo->obtenerAplicacion($imei);
//            var_dump($aplic);
            if (!is_null($aplic)) {
                $token = [
                    "exp" => time() + 2880000,
                    "dispositivo" => array(
                        "iddispositivo" => $aplic->getIddispositivo(),
                        "imei" => $aplic->getImei(),
                        "token" => $aplic->getToken(),
                        "estado" => $aplic->getEstado()
                    )
//                    "iddispositivo" => $aplic->getIddispositivo()
                ];
                $jwt = JWT::encode($token, "developmentSessionSecret");
                $result->success = true;
                $result->msg = "proceso ejecutado correctamente";
                $result->data = array("token" => $jwt, "dipositivo" => $aplic->getImei());

            } else {
                $result->msg = "No existe el IMEI asociado al sistema";
                $result->success = false;
            }

        } else {
            $result->msg = "es necesario enviar el parametro : key";
            $result->success = false;
        }

        return $result;

    }

    public function verificarAcceso($data)
    {
//        var_dump($data);
        $repo = $this->em->getRepository("SistemaColegioBundle:UsuarioApp");
        $login = $data["login"];
        $contrasena = $data["contrasena"];
        $usuario = $repo->findOneBy(array("usuario" => $login, "contrasena" => $contrasena));
        if (is_null($usuario)) {
            return new RespuestaSP(false, "Contrasena Incorrecta", null, 200);
        }
        return new RespuestaSP(true, "proceso ejecutado correctamente", $usuario, 200);


    }

//    public function generarTokenPorUsuarioApp($data, $header)
//    {
//
//
//        $result = new \Sistema\ColegioBundle\Model\RespuestaSP();
//        if (is_null($data->get('codigoApp'))) {
//            $result->msg = "Tiene que Ingresar un codigo de aplicacion";
//            $result->success = false;
//        } else {
//            $codigoApp = $data->get('codigoApp');
//            $managerApp = $this->em->getRepository('ElfecSgauthBundle:aplicaciones');
//
//            $obj = $managerApp->findOneBy(array('codigo' => $codigoApp));
////            var_dump($data);
////            var_dump(is_null($data->get('id_aplic')));
//            $aplicacion = !is_null($data->get('id_aplic')) ? $managerApp->find($data->get('id_aplic')) : null;
////            var_dump($aplicacion);
//            if (is_null($obj)) {
//                $result->msg = "Codigo de Apliacion  no existe";
//                $result->success = false;
//            } else {
//                $test = $this->testConnection($data->get('usuario'), $data->get('password'), $obj);
////                var_dump($test);die();
//                if (is_numeric($test) && $data->get('codigoApp') != 'SISMAN') {
//                    $usrTest = $this->esUsuarioAppActivo($data->get('usuario'), $obj->getIdAplic());
//                    if (is_numeric($usrTest)) {
//                        $result->msg = "Proceso Ejecutado Correctamente";
//                        $result->success = true;
//                        $result->data = $this->obtenerTokenPerfil($usrTest, $obj ,$aplicacion);
//                        $result->data = !is_null($aplicacion) ?   $this->pushArrayApp($aplicacion,$result->data) : $result->data;
//                    } else {
//                        $result->msg = $usrTest;
//                        $result->success = false;
//                    }
//                } else if (is_numeric($test) && $data->get('codigoApp') == 'SISMAN') {
//                    $result->msg = "Proceso Ejecutado Correctamente";
//                    $result->success = true;
//                    $result->data = $this->obtenerTokenSisman($obj, $data);
//                } else {
//                    $result->msg = $test;
//                    $result->success = false;
//                }
//
//            }
//        }
//        return $result;
//    }
//
//    /**
//     * @param \Elfec\SgauthBundle\Entity\aplicaciones $app
//     * @param array $array
//     * @return array
//     */
//    private function pushArrayApp($app, $array)
//    {
////        var_dump($array);
//        $row = array(
//            "codigo" => $app->getCodigo(),
//            "aplicacion" => $app->getNombre(),
//            "id_aplic" => $app->getIdAplic()
//
//        );
//
//        $array["aplicacion"] = $row;
////        array_push($array, $row);
//
////            var_dump($array);
//        return $array;
//    }

//    /**
//     * metodo temporal para obtener
//     */
//    private function obtenerTokenSisman($app, $data)
//    { $key = $app->getSecretKey();
//        $connect = JWT::encode(JWT::encode($this->usrArray["dbConnect"], $key), $key);
//        $token = [
//            "exp" => time() + 28800,
//
//            "key" => $connect
//
//        ];
////        var_dump($data);
//        $jwt = JWT::encode($token, $key);
//        $result = array(
//            "token" => $jwt,
//            "usuario" => array(
//                "login" => $data->get("usuario"),
//                "codigoApp" => $data->get("codigoApp")
//            )
//        );
//        return $result;
//
//    }
//
//
//    /**
//     * @param $idPerfil
//     * @param \Elfec\SgauthBundle\Entity\aplicaciones $app
//     * @return array
//     */
//    private function obtenerTokenPerfil($idPerfil, $app,$aplicacion)
//    {
//        $key = $app->getSecretKey();
//        $repoUsr = $this->em->getRepository('ElfecSgauthBundle:perfilesOpciones');
//        $menus = $repoUsr->obtenerOpcionesMenuPorPerfil($idPerfil);
//        $repoUsr = $this->em->getRepository('ElfecSgauthBundle:appUsr');
//        /**
//         * @var appUsr $usr
//         */
//        $usr = $repoUsr->findOneBy(array('perfil' => $idPerfil, 'usuario' => $this->idUsr));
//        $connect = JWT::encode(JWT::encode($this->usrArray["dbConnect"], $key), $key);
//        $usuario = array(
//            "login" => $usr->getIdUsuario()->getLogin(),
//            "nombre" => $usr->getIdUsuario()->getNombre(),
//            "perfil" => $usr->getIdPerfil()->getNombre(),
//            "id_perfil" => $usr->getIdPerfil()->getIdPerfil(),
//            "id_usuario" => $usr->getIdUsuario()->getIdUsuario(),
//            "email" => $usr->getIdUsuario()->getEmail(),
//            "estado" => $usr->getIdUsuario()->getEstado(),
//            "aplicacion" => $usr->getIdAplic()->getNombre(),
//            "codigoApp" => $usr->getIdAplic()->getCodigo(),
//            "id_aplic" => $usr->getIdAplic()->getIdAplic()
//        );
//        if ($app->getCodigo() === "SGCST") {
//            $token = [
//                "exp" => time() + 28800,
//                "menu" => $menus,
//                "usuario" => $usuario,
//                "key" => $connect
//
//            ];
//        } else {
//            $token = [
//                "exp" => time() + 28800,
//                "usuario" => $usuario,
//                "key" => $connect
//            ];
//        }
//        $token = !is_null($aplicacion) ? $this->pushArrayApp($aplicacion,$token) : $token;
//        $jwt = JWT::encode($token, $key);
//        $result = array(
//            "token" => $jwt,
//            "menu" => $menus,
//            "usuario" => $usuario
//        );
//        return $result;
//    }
//
//    /**
//     * @param string $usuario
//     * @return string
//     */
//    private function esUsuarioAppActivo($usuario, $idApp)
//    {
//        $repoUsr = $this->em->getRepository('ElfecSgauthBundle:usuarios');
//        /**
//         * @var usuarios $usr
//         */
//        $usr = $repoUsr->findOneBy(array('login' => $usuario));
//        $result = "";
//        if (is_null($usr)) {
//            $result = sprintf("el usuario: %s No tiene permiso para acceder a la Aplicacion", $usuario);
//        } else {
//            if ($usr->getEstado() == "ACTIVO") {
//                $repoUsrApp = $this->em->getRepository('ElfecSgauthBundle:appUsr');
//                /**
//                 * @var appUsr $usrApp
//                 */
//                $usrApp = $repoUsrApp->findOneBy(array('usuario' => $usr->getIdUsuario(), 'aplicacion' => $idApp));
////                var_dump($usrApp->getEstado());
//                if (is_null($usrApp)) {
//                    $result = sprintf("el usuario: %s No tiene permiso para acceder a la Aplicacion", $usuario);
//                } else {
//                    if ($usrApp->getEstado() == "ACTIVO") {
//                        $result = $usrApp->getIdPerfil()->getIdPerfil();
//                        $usrArray = array(
//                            "usuario" => $usr->getLogin(),
//                            "nombre" => $usr->getNombre(),
//                            "estado" => $usr->getEstado(),
//                            "email" => $usr->getEmail()
//                        );
//                        $this->idUsr = $usr->getIdUsuario();
//                        $this->usrArray["usuario"] = $usrArray;
//                    } else {
//                        $result = sprintf("el usuario: %s esta INACTIVO", $usuario);
//                    }
//                }
//            } else {
//                $result = sprintf("el usuario: %s esta INACTIVO", $usuario);
//            }
//        }
//        return $result;
//
//    }
//
//    /**
//     * @param string $usuario
//     * @param string $password
//     * @param \Elfec\SgauthBundle\Entity\aplicaciones $app
//     * @return string
//     */
//    private function testConnection($usuario, $password, $app)
//    {
//        try {
//            $config = new \Doctrine\DBAL\Configuration();
//            $connectionParams = array(
//                'dbname' => $app->getBdPrinc(),
//                'user' => $usuario,
//                'password' => $password,
//                'host' => $app->getBdHost(),
//                'port' => $app->getBdPort(),
//                'driver' => $app->getBdDrive(),
//                'service' => true
//            );
////            var_dump($connectionParams);
//            $conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);
//            $conn->connect();
//            $conn->close();
//            $this->usrArray["dbConnect"] = $connectionParams;
////            array_push($this->usrArray,$connectionParams);
//            $result = 1;
//        } catch (Exception $ex) {
//            $result = $ex->getMessage();
//        }
//        return $result;
//    }
}
<?php

namespace Sistema\ColegioBundle\Repository;

/**
 * DispositivosRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DispositivosRepository extends BaseRepository
{
    public function obtenerAplicacion($imei)
    {
//        $array = explode("|", $sha);
//        var_dump($imei);
        try {
            $array = array("imei" => $imei);
//            var_dump($array);
            $result = $this->findOneBy(array('imei' => $imei));
//            var_dump($result->getImei());
            if (is_null($result)) {

//            var_dump($sha);die();

                $aplicacion = new \Sistema\ColegioBundle\Entity\Dispositivos();
                $aplicacion->setImei($imei);
                $aplicacion->setIddispositivo($this->max());
                $aplicacion->setEstado("PENDIENTE");
                $aplicacion->setToken("123456aaa");
                $this->_em->persist($aplicacion);
                $this->_em->flush();
                $result = $aplicacion;
            }
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
        return $result;
    }

    public function editarDispositivo($data)
    {
        $result = new \Sistema\ColegioBundle\Model\RespuestaSP();
        try {
            $app = $this->find($data["iddispositivo"]);
            /**
             * @var \Sistema\ColegioBundle\Entity\Dispositivos $app
             */
            if (!is_null($app)) {

//                $app->setToken($data["token"]);
//                $app->setEstado($data["estado"]);
//                $app->setImei($data["imei"]);
                $app->setFcmToken($data["fcm_token"]);
                $this->_em->flush();
                $result->success = true;
                $result->msg = "Proceso Ejectuado Correctamente";
                return $result;
            }
            $result->msg = "No Existe el dispositivo";
            $result->success = false;
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            $result->msg = $e->getCode();
            $result->success = false;
            $result->code = 401;
        }
        return $result;

    }
}

<?php

namespace Sistema\ColegioBundle\Repository;

use Sistema\ColegioBundle\Entity\NotifEstudiante;
use Sistema\ColegioBundle\Entity\Notificacion;
use Sistema\ColegioBundle\Model\RespuestaSP;

/**
 * NotificacionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NotificacionRepository extends BaseRepository
{

    public function guardarNotificacion($data)
    {
        try {
            $notificacion = new Notificacion();
            $notificacion->setIdgestion(2016);
            $notificacion->setFechaEnvio($data["fecha_envio"]);
            $notificacion->setFechaRegistro(new \DateTime());
            $notificacion->setMensaje($data["mensaje"]);
            $notificacion->setTitulo(($data["titulo"]));
            $notificacion->setNombreEmisor("rsaavedra");
            $notificacion->setIdestadoNotif(1);



            $this->_em->persist($notificacion);
            $this->_em->flush();
            $notiEst = new NotifEstudiante();
            $notiEst->setFechaEnvio(new \DateTime());
            $notiEst->setFechaCreacion(new \DateTime());
            $notiEst->setIdestudiante($data["idestudiante"]);
            $notiEst->setIdestadoNotif(1);
            $notiEst->setIdnotificacion($notificacion->getIdnotificacion());


            $this->_em->persist($notiEst);
            $this->_em->flush();
            return new RespuestaSP();

        } catch (\Exception $e) {
            return new RespuestaSP(false, $e->getMessage(), null, 422);
        }
//        $notificacion->set

    }
}

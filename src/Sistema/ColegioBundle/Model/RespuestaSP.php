<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 * Date: 16/07/2015
 * Time: 03:06 PM
 */

namespace Sistema\ColegioBundle\Model;


class RespuestaSP
{
    public $success;
    public $msg;
    public $id;
    public $data;
    public $code;

    /**
     * RespuestaSP constructor.
     * @param bool $success
     * @param string $msg
     * @param null $data
     * @param int $code
     */
    public function __construct($success = true, $msg = "proceso ejecutado correctamente", $data = null, $code = 200)
    {

        $this->success = $success;
        $this->msg = $msg;
        $this->data = $data;
        $this->code = $code;
    }

}
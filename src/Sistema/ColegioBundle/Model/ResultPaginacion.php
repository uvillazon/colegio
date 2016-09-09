<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 * Date: 16/07/2015
 * Time: 03:06 PM
 */

namespace Sistema\ColegioBundle\Model;


class ResultPaginacion
{
    public $success = true;
    public $rows;
    public $total = 0;
    public $page;
    public $msg = "proceeso ejectuado correctamente";
    public $code = 200;

    public function __construct($success = true, $msg = "proceso ejecutado correctamente", $rows = null, $total = 0, $code = 200)
    {

        $this->success = $success;
        $this->msg = $msg;
        $this->rows = $rows;
        $this->total = $total;
        $this->code = $code;
    }
}
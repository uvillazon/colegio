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
    public $success;
    public $rows;
    public $total;
    public $page;
    public $msg;
    public $code=200;
}
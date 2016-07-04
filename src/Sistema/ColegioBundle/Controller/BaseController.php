<?php
/**
 * Created by PhpStorm.
 * User: uvillazon
 * Date: 17/05/2016
 * Time: 09:03
 */

namespace Sistema\ColegioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;
use Sistema\ColegioBundle\Model\PaginacionModel;

class BaseController extends Controller
{
    protected $nameArray = "data";
    /**
     * @param Request $request
     * @return PaginacionModel
     */
    public function obtenerPaginacion(Request $request)
    {
        $paginacion = new PaginacionModel();
        $paginacion->contiene= $request->query->get('contiene');
        $paginacion->condicion= $request->query->get('condicion');
        $paginacion->dir = $request->query->get('dir');
        $paginacion->sort = $request->query->get('sort');
        $paginacion->limit = $request->query->get('limit');
        $paginacion->start = $request->query->get('start');
        $paginacion->startDate = $request->query->get('startDate');
        $paginacion->endDate = $request->query->get('endDate');
        $paginacion->contiene = ($paginacion->contiene =="")? null :$paginacion->contiene ;
        return $paginacion;
    }

    /**
     * @param Request $request
     * @param bool $many
     * @return mixed
     */
    public function arrayToFormPost(Request $request , $many = false) {
        $data = $request->request->all();

//        var_dump($data);
        if(!$many){
//            $array = $data[$this->nameArray];
            $array = array_key_exists($this->nameArray,$data ) ? $data[$this->nameArray][0] : $data;
//            var_dump($array);
            return $array;
        }
        else{
            $array = array_key_exists($this->nameArray,$data ) ? $data[$this->nameArray] : $data;
            return  $array;
        }

//        var_dump($data);die();
    }

}
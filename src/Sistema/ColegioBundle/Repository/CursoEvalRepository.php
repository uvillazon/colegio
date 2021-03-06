<?php

namespace Sistema\ColegioBundle\Repository;

/**
 * CursoEvalRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CursoEvalRepository extends BaseRepository
{
    public function obtenerPeriodoEvaluacionPorIdCursoEstud($id)
    {
        $rows = array();

//        var_dump($id);
        $evaluaciones = $this->findBy(array("idcursoEstud" => $id));
        $periodos = array();
        $arrayPeridos = array();
        /**
         * @var \Sistema\ColegioBundle\Entity\CursoEval $evaluacion
         */
        foreach ($evaluaciones as $evaluacion) {
            if (!in_array($evaluacion->getEvaluacion()->getIdperiodo(), $periodos)) {
                array_push($periodos, $evaluacion->getEvaluacion()->getIdperiodo());
                $peri = array("idperiodo" => $evaluacion->getEvaluacion()->getIdperiodo(), "periodo" => $evaluacion->getEvaluacion()->getPeriodo()->getDescripcion(), "gestion" => $evaluacion->getEvaluacion()->getIdgestion());
                array_push($arrayPeridos, $peri);
            }
        }
        for ($i = 0; $i < count($arrayPeridos); $i++) {
//            var_dump($arrayPeridos[$i]);
            $arrayEval = array();
            foreach ($evaluaciones as $evaluacion) {
                if ($evaluacion->getEvaluacion()->getIdperiodo() == $arrayPeridos[$i]["idperiodo"]) {
                    $dimensionesArray = array();
                    /**
                     * @var \Sistema\ColegioBundle\Entity\CursoEvalDim $cursoEvalDim
                     * @var \Sistema\ColegioBundle\Entity\CursoEvalDimActividad $cursoEvalDimActividad
                     */
                    foreach ($evaluacion->getCursoEvalDim() as $cursoEvalDim) {
                        $actividadesArray = array();
                        foreach ($cursoEvalDim->getCursoEvalDimActividad() as $cursoEvalDimActividad) {
                            array_push($actividadesArray, array(
                                "nota_n" => $cursoEvalDimActividad->getNotaN(),
                                "nota_l" => $cursoEvalDimActividad->getNotaL(),
                                "activdad" => $cursoEvalDimActividad->getActividad()->getDescripcion(),
                                "observacion" => $cursoEvalDimActividad->getObservacion()
                            ));
                        };

                        array_push($dimensionesArray, array(
                            "iddimension" => $cursoEvalDim->getDimension()->getIddimension(),
                            "dimension" => $cursoEvalDim->getDimension()->getDescripcion(),
                            "porcentaje" => $cursoEvalDim->getDimension()->getPorcentaje(),
                            "nota_n" => $cursoEvalDim->getNotaN(),
                            "observacion" => $cursoEvalDim->getObservacion(),
                            "actividades" => $actividadesArray
                        ));

                    }
                    $dimensionesArray = $this->sortArray($dimensionesArray, "iddimension");
                    array_push($arrayEval, array(
                        "evaluacion" => $evaluacion->getEvaluacion()->getEvaluacion(),
                        "nota_n" => $evaluacion->getNotaN(),
                        "observacion" => $evaluacion->getObservacion(),
                        "nota_l" => $evaluacion->getNotaL(),
                        "dimesiones" => $dimensionesArray

                    ));
                }
            }
            $arrayPeridos[$i]["evaluaciones"] = $arrayEval;
        }
        return $arrayPeridos;
    }
}

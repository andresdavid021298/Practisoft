<?php

require_once "../../Model/DAO/Actividades_Plan_Trabajo_Model.php";

function listarActividadesPlanTrabajoPorEstudiante($id_estudiante)
{
    $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
    return $obj_actividad_plan_trabajo->listarActividadesPlanTrabajoPorEstudiante($id_estudiante);
}

if (isset($_POST['accion'])) {
    if ($_POST['accion'] == "insertar_actividad_plan_trabajo") {
        $id_estudiante = $_POST['id_estudiante'];
        $actividades = $_POST['actividades'];
        $response = array();
        $aux = 1;
        $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
        for ($i = 0; $i < count($actividades); $i = $i + 2) {
            $rta = $obj_actividad_plan_trabajo->insertarActividadPlanTrabajo($id_estudiante, $actividades[$i], $actividades[$i + 1]);
            if ($rta == 0) {
                $aux = 0;
                break;
            }
        }
        if ($aux == 0) {
            $response['title'] = "Ocurrio un error";
            $response['state'] = "error";
        } else {
            $response['title'] = "Plan de Trabajo Agregado Correctamente";
            $response['state'] = "success";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "eliminar_actividad_plan_trabajo") {
        $id_estudiante = $_POST['id_estudiante'];
        $response = array();
        $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
        $rta = $obj_actividad_plan_trabajo->eliminarTodasActividadesPlanTrabajoPorEstudiante($id_estudiante);
    }
}

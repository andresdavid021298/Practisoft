<?php

require_once "../../Model/DAO/Actividad_Model.php";

// Metodo que conecta con la vista para enviar el total de horas de actividades de un practicante
function verHorasPorEstudiante($id_estudiante)
{
    $obj_actividad_model = new ActividadModel();
    return $obj_actividad_model->sumarHorasDelEstudiante($id_estudiante);
}

// Metodo que conecta con la vista para enviar los datos de todas las actividades de cierto practicante
function listarActividadesPorEstudiante($id_estudiante)
{
    $obj_actividad_model = new ActividadModel();
    return $obj_actividad_model->listarActividadesPorEstudiante($id_estudiante);
}

if (isset($_POST['accion'])) {
    if ($_POST['accion'] == "validar_actividad") {
        $response = array();
        $id_actividad = $_POST['id_actividad'];
        $obj_actividad_model = new ActividadModel();
        $rta = $obj_actividad_model->cambiarActividadAprobado($id_actividad);
        if ($rta == 0) {
            $response['state'] = "error";
            $response['title'] = "Ocurrio un error";
        } else {
            $response['state'] = "success";
            $response['title'] = "Actividad aprobada correctamente";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "rechazar_actividad") {
        $response = array();
        $id_actividad = $_POST['id_actividad'];
        $observaciones = $_POST['observaciones'];
        $obj_actividad_model = new ActividadModel();
        $rta = $obj_actividad_model->cambiarActividadReprobado($id_actividad, $observaciones);
        if ($rta == 0) {
            $response['state'] = "error";
            $response['title'] = "Ocurrio un error";
        } else {
            $response['state'] = "success";
            $response['title'] = "ID Actividad: $id_actividad" . "\n Observaciones: " . $observaciones;
        }
        echo json_encode($response);
    }
}

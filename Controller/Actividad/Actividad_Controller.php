<?php

require_once "../../Model/DAO/Actividad_Model.php";

// Metodo que conecta con la vista para enviar el total de horas de actividades de un practicante
function verHorasPorEstudiante($id_estudiante)
{
    $obj_actividad_model = new ActividadModel();
    return $obj_actividad_model->sumarHorasDelEstudiante($id_estudiante);
}

// Metodo que conecta con la vista para enviar los datos de todas las actividades de cierto practicante
function listarActividadesPorActividadPlanTrabajo($id_actividad_plan_trabajo)
{
    $obj_actividad_model = new ActividadModel();
    return $obj_actividad_model->listarActividadesPorActividadPlanTrabajo($id_actividad_plan_trabajo);
}

// Metodo que conecta con la vista para enviar los datos de todas las actividades de cierto practicante
function sumarHorasPorActividadPlanTrabajo($id_actividad_plan_trabajo)
{
    $obj_actividad_model = new ActividadModel();
    return $obj_actividad_model->sumarHorasPorActividadPlanTrabajo($id_actividad_plan_trabajo);
}

// Metodo que conecta con el modelo para generar el informe de subactividades
function generarInformeDeSubactividades($id_actividad_plan_trabajo)
{
    $obj_actividad_model = new ActividadModel();
    return $obj_actividad_model->generarInformeDeSubactividades($id_actividad_plan_trabajo);
}

// Metodo que conecta con el modelo para generar el encabezado del informe de subactividades
function generarEncabezadoInformeDeSubactividades($id_actividad_plan_trabajo)
{
    $obj_actividad_model = new ActividadModel();
    return $obj_actividad_model->generarEncabezadoInformeDeSubactividades($id_actividad_plan_trabajo);
}

// Metodo que conecta con el modelo para generar el encabezado del informe de subactividades
function cantidadDeSubactividadesPorActividad($id_actividad_plan_trabajo)
{
    $obj_actividad_model = new ActividadModel();
    return $obj_actividad_model->cantidadDeSubactividadesPorActividad($id_actividad_plan_trabajo);
}

// Metodo que conecta con el modelo para contar las subactividades que se encuentran en espera
function cantidadSubactividadesEnEspera($id_actividad_plan_trabajo){
    $obj_actividad_model = new ActividadModel();
    return $obj_actividad_model->cantidadDeSubactividadesPorActividadEnEspera($id_actividad_plan_trabajo);
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
            $response['title'] = "Actividad Rechazada";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "agregar_actividad") {
        $response = array();
        $id_actividad_plan_trabajo= $_POST['id'];
        $fecha_actividad = $_POST['fecha'];
        $horas_actividad = $_POST['horas'];
        $descripcion_actividad = $_POST['descripcion'];
        $obj_actividad_model = new ActividadModel();
        $rta = $obj_actividad_model->insertarActividades($id_actividad_plan_trabajo, $fecha_actividad, $descripcion_actividad, $horas_actividad);
        if ($rta == 0) {
            $response['state'] = "error";
            $response['title'] = "Ocurrio un error";
        } else {
            $response['state'] = "success";
            $response['title'] = "SubActividad Agregada Correctamente";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "actualizar_actividad") {
        $response = array();
        $id_actividad = $_POST['id'];
        $fecha_actividad = $_POST['fecha'];
        $horas_actividad = $_POST['horas'];
        $descripcion_actividad = $_POST['descripcion'];
        $obj_actividad_model = new ActividadModel();
        $rta = $obj_actividad_model->actualizarActividad($id_actividad, $fecha_actividad, $descripcion_actividad, $horas_actividad);
        if ($rta == 0) {
            $response['state'] = "error";
            $response['title'] = "Ocurrio un error";
        } else {
            $response['state'] = "success";
            $response['title'] = "SubActividad Actualizada Correctamente";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "eliminar_actividad") {
        $response = array();
        $id_actividad = $_POST['id_actividad'];
        $obj_actividad_model = new ActividadModel();
        $rta = $obj_actividad_model->eliminarActividad($id_actividad);
        if ($rta == 0) {
            $response['state'] = "error";
            $response['title'] = "Ocurrio un error";
        } else {
            $response['state'] = "success";
            $response['title'] = "SubActividad Eliminada Correctamente";
        }
        echo json_encode($response);
    }
}

<?php

require_once "../../Model/DAO/Actividades_Plan_Trabajo_Model.php";

function listarActividadesPlanTrabajoPorEstudiante($id_estudiante)
{
    $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
    return $obj_actividad_plan_trabajo->listarActividadesPlanTrabajoPorEstudiante($id_estudiante);
}

function listarActividadesPlanTrabajoPorEstudianteAprobadas($id_estudiante)
{
    $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
    return $obj_actividad_plan_trabajo->listarActividadesPlanTrabajoPorEstudianteAprobadas($id_estudiante);
}

function buscarActividaPlanTrabajo($id_actividad_plan_trabajo)
{
    $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
    return $obj_actividad_plan_trabajo->buscarActividadPlanTrabajo($id_actividad_plan_trabajo);
}

function estado_plan_trabajo($id_estudiante){
    $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
    return $obj_actividad_plan_trabajo->contarPlanTrabajoAprobado($id_estudiante);
}

function planTrabajoRechazado($id_estudiante){
    $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
    return $obj_actividad_plan_trabajo->contarPlanTrabajoRechazado($id_estudiante);
}

function planTrabajoEspera($id_estudiante){
    $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
    return $obj_actividad_plan_trabajo->contarPlanTrabajoEspera($id_estudiante);
}

function generarEncabezadoInformeDeActividades($id_estudiante){
    $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
    return $obj_actividad_plan_trabajo->generarEncabezadoInformeDeActividades($id_estudiante);
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
    } else if ($_POST['accion'] == "validar_plan_trabajo") {
        $id_estudiante = $_POST['id_estudiante'];
        $response = array();
        $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
        $rta = $obj_actividad_plan_trabajo->planTrabajoAprobado($id_estudiante);
        if ($rta == 0) {
            $response['title'] = "Ocurrio un error";
            $response['state'] = "error";
            $response['location'] = "ver_estudiantes_plan_trabajo.php";
        } else {
            $response['title'] = "El plan de trabajo se ha validado correctamente";
            $response['state'] = "success";
            $response['location'] = "ver_estudiantes_plan_trabajo.php";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "rechazar_plan_trabajo") {
        $id_estudiante = $_POST['id_estudiante'];
        $observacion = $_POST['observacion'];
        $response = array();
        $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
        $rta = $obj_actividad_plan_trabajo->planTrabajoReprobado($id_estudiante, $observacion);
        if ($rta == 0) {
            $response['title'] = "Ocurrio un error";
            $response['state'] = "error";
            $response['location'] = "ver_estudiantes_plan_trabajo.php";
        } else {
            $response['title'] = "El plan de trabajo se ha rechazado correctamente";
            $response['state'] = "success";
            $response['location'] = "ver_estudiantes_plan_trabajo.php";
        }
        echo json_encode($response);     
}       
}

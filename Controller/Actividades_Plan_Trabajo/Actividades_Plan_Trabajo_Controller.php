<?php

require_once "../../Model/DAO/Actividades_Plan_Trabajo_Model.php";

// Metodo que conecta con la vista para listar las actividades del plan de trabajo de un estudiante
function listarActividadesPlanTrabajoPorEstudiante($id_estudiante)
{
    $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
    return $obj_actividad_plan_trabajo->listarActividadesPlanTrabajoPorEstudiante($id_estudiante);
}

// Metodo que conecta con la vista para listar las actividades aprobadas del plan de trabajo de un estudiante
function listarActividadesPlanTrabajoPorEstudianteAprobadas($id_estudiante)
{
    $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
    return $obj_actividad_plan_trabajo->listarActividadesPlanTrabajoPorEstudianteAprobadas($id_estudiante);
}

// Metodo que conecta con la vista para detallar una actividad del plan de trabajo
function buscarActividaPlanTrabajo($id_actividad_plan_trabajo)
{
    $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
    return $obj_actividad_plan_trabajo->buscarActividadPlanTrabajo($id_actividad_plan_trabajo);
}

// Metodo que conecta con la vista para buscar el estado del plan de trabajo de un estudiante
function estado_plan_trabajo($id_estudiante)
{
    $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
    return $obj_actividad_plan_trabajo->contarPlanTrabajoAprobado($id_estudiante);
}

// 
function planTrabajoRechazado($id_estudiante)
{
    $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
    return $obj_actividad_plan_trabajo->contarPlanTrabajoRechazado($id_estudiante);
}

// 
function planTrabajoEspera($id_estudiante)
{
    $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
    return $obj_actividad_plan_trabajo->contarPlanTrabajoEspera($id_estudiante);
}

// 
function generarEncabezadoInformeDeActividades($id_estudiante)
{
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
    } else  if ($_POST['accion'] == "actualizar_plan_trabajo") {
        $id_estudiante = $_POST['id_estudiante'];
        $actividades = $_POST['actividades'];
        $response = array();
        $aux = 1;
        $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
        $rta_eliminar = $obj_actividad_plan_trabajo->eliminarTodasActividadesPlanTrabajoPorEstudiante($id_estudiante);
        if ($rta_eliminar == 1) {
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
                $response['title'] = "Plan de Trabajo Actualizado Correctamente";
                $response['state'] = "success";
            }
        } else {
            $response['title'] = "Ocurrio un error";
            $response['state'] = "error";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "eliminar_todas_actividad_plan_trabajo") {
        $id_estudiante = $_POST['id_estudiante'];
        $response = array();
        $obj_actividad_plan_trabajo = new ActividadPlanTabajoModel();
        $rta = $obj_actividad_plan_trabajo->eliminarTodasActividadesPlanTrabajoPorEstudiante($id_estudiante);
        if ($rta == 0) {
            $response['state'] = "error";
            $response['title'] = "Ocurrio un error";
        } else {
            $response['state'] = "info";
            $response['title'] = "Se eliminaron las actividades previas";
        }
        echo json_encode($response);
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

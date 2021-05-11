<?php
require_once "../../Model/DAO/Estudiante_Model.php";

// Metodo que conecta con la vista para mostrar informacion de practicantes asignados a una empresa
function listarEstudiantesPorEmpresa($id_empresa)
{
    $obj_estudiante_model = new EstudianteModel();
    return $obj_estudiante_model->listarEstudiantesPorEmpresa($id_empresa);
}

// Metodo que conecta con la vista para enviar los datos de un determinado estudiante
function buscarEstudiante($id_estudiante)
{
    $obj_estudiante_model = new EstudianteModel();
    return $obj_estudiante_model->buscarEstudiante($id_estudiante);
}

// Metodo que conecta con la vista para enviar la cantidad de estudiantes asignados a una empresa
function cantidadDeEstudiantesPorEmpresa($id_empresa)
{
    $obj_estudiante_model = new EstudianteModel();
    return $obj_estudiante_model->cantidadEstudiantesPorEmpresa($id_empresa);
}

function listarEstudiantes()
{
    $obj_estudiante_model = new EstudianteModel();
    return $obj_estudiante_model->listarEstudiantes();
}

if (isset($_POST['accion'])) {
    if ($_POST['accion'] == "actualizar_perfil") {
        $response = array();
        $id_estudiante = $_POST['id_estudiante'];
        $nombre_estudiante = $_POST['nombre'];
        $codigo_estudiante = $_POST['codigo'];
        $celular_estudiante = $_POST['celular'];
        $obj_estudiante_model = new EstudianteModel();
        $rta = $obj_estudiante_model->actualizarEstudiante($id_estudiante, $nombre_estudiante, $codigo_estudiante, $celular_estudiante);
        if ($rta == 0) {
            $response['state'] = "error";
            $response['title'] = "Ocurrio un error";
        } else {
            $response['state'] = "success";
            $response['title'] = "Perfil Actualizado Correctamente";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "asignar_tutor_estudiante") {
        $response = array();
        $id_estudiante = $_POST['id_estudiante'];
        $id_tutor = $_POST['id_tutor'];

        $obj_estudiante_model = new EstudianteModel();
        $rta = $obj_estudiante_model->vincularEstudianteConTutor($id_estudiante, $id_tutor);
        if ($rta == 0) {
            $response['state'] = "error";
            $response['title'] = "Ocurrio un error";
            $response['location'] = "ver_practicantes.php";
        } else {
            $response['state'] = "success";
            $response['title'] = "Tutor Asignado Correctamente";
            $response['location'] = "ver_practicantes.php";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "asignar_empresa_estudiante") {
        $response = array();
        $id_estudiante = $_POST['id_estudiante'];
        $id_empresa = $_POST['id_empresa'];
        $obj_estudiante_model = new EstudianteModel();
        $rta = $obj_estudiante_model->vincularEstudianteConEmpresa($id_estudiante, $id_empresa);
        if ($rta == 0) {
            $response['state'] = "error";
            $response['title'] = "Ocurrio un error";
        } else {
            $response['state'] = "success";
            $response['title'] = "Estudiante asignado correctamente";
        }
        echo json_encode($response);
    }
}

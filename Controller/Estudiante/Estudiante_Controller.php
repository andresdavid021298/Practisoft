<?php
require_once "../../Model/DAO/Estudiante_Model.php";
require_once "../../Model/DAO/Solicitud_Model.php";
require_once "../../Model/DAO/Historico_Model.php";
include_once "../../vendor/autoload.php";

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

function listarEstudiantesPorGrupo($id_grupo)
{
    $obj_estudiante_model = new EstudianteModel();
    return $obj_estudiante_model->listarEstudiantesPorGrupo($id_grupo);
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
        $id_solicitud = $_POST['id_solicitud'];

        $funciones = $_POST['funciones'];
        $nombre_estudiante = $_POST['nombre_estudiante'];
        $nombre_empresa = $_POST['nombre_empresa'];

        $obj_historico_model = new HistoricoModel();
        $res = $obj_historico_model->insertarAlHistoricoEstudiante($nombre_estudiante, $id_empresa, $funciones);
        $obj_solicitud_model = new SolicitudModel();
        $result = $obj_solicitud_model->disminuirNumeroDePracticantes($id_solicitud);
        $obj_estudiante_model = new EstudianteModel();
        $datos_estudiante = buscarEstudiante($id_estudiante);
        $rta = $obj_estudiante_model->vincularEstudianteConEmpresa($id_estudiante, $id_empresa, $id_solicitud);
        if ($result == 0) {
            $response['state'] = "error";
            $response['title'] = "Ocurrio un error";
        } else {
            if ($rta == 0) {
                $response['state'] = "error";
                $response['title'] = "Ocurrio un error";
            } else {
                $response['state'] = "success";
                $response['title'] = "Estudiante asignado correctamente";
            }
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "eliminar_estudiante") {
        $response = array();
        $id_estudiante = $_POST['id_estudiante'];
        $obj_estudiante_model = new EstudianteModel();
        $rta = $obj_estudiante_model->eliminarEstudiante($id_estudiante);
        if ($rta == 0) {
            $response['state'] = "error";
            $response['title'] = "Ocurrio un error";
        } else {
            $response['state'] = "success";
            $response['title'] = "Estudiante eliminado correctamente";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "agregar_estudiante_individual") {
        $response = array();
        $correo_estudiante = $_POST['correo_estudiante'];
        $id_grupo = $_POST['input_id_grupo'];
        $extension = strrchr($correo_estudiante, "@");

        if ($extension != "@ufps.edu.co") {
            $response['state'] = "error";
            $response['title'] = "El correo debe ser institucional";
        } else {
            $obj_estudiante_model = new EstudianteModel();
            $rta = $obj_estudiante_model->insertarEstudiante($correo_estudiante, $id_grupo);
            if ($rta == 0) {
                $response['state'] = "error";
                $response['title'] = "Ocurrio un error";
            } else {
                $response['state'] = "success";
                $response['title'] = "Estudiante agregado correctamente";
            }
        }

        echo json_encode($response);
    }
} else if (isset($_FILES['input_archivo']['name'])) {
    $response = array();
    $id_grupo = $_POST['input_id_grupo'];
    $nombre_archivo = $_FILES['input_archivo']['name'];
    $formato_nombre = "Estudiantes_Practicas";
    $extension = strrchr($nombre_archivo, ".");
    $archivo = $formato_nombre . $extension;
    $location = $_SERVER['DOCUMENT_ROOT'] . '/PractiSoft/Documentos/' . $archivo;
    $tipo_archivo = $_FILES['input_archivo']['type'];

    if ($tipo_archivo != "text/plain") {
        $response['title'] = "Solo se permiten archivos de texto plano (TXT)";
        $response['state'] = "warning";
    } else {
        move_uploaded_file($_FILES['input_archivo']['tmp_name'], $location);
        $content = file($location);
        unlink($location);
        $obj_estudiante_model = new EstudianteModel();
        $result = NULL;


        foreach ($content as $correo) {
            $correo_estudiante = str_replace(',', '', $correo);
            $result = stristr($correo_estudiante, '@ufps.edu.co');
            if ($result != false) {
                $correo_sin_espacios = trim($correo_estudiante);
                $obj_estudiante_model->insertarEstudiante($correo_sin_espacios, $id_grupo);
            }
        }
        if ($result != NULL) {
            $response['title'] = "Estudiantes Agregados Correctamente";
            $response['state'] = "success";
        }
    }
    echo json_encode($response);
}

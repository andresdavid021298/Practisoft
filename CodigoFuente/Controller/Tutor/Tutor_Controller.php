<?php

require_once "../../Model/DAO/Tutor_Model.php";
// Valida si se envia por metodo POST en algun campo "accion"
if (isset($_POST['accion'])) {
    //Pregunta si la accion es "registrar_tutor"
    if ($_POST['accion'] == "registrar_tutor") {
        $response = array();
        $nombre_tutor = $_POST['nombre_tutor'];
        $correo_tutor = $_POST['correo_tutor'];
        $celular_tutor = $_POST['celular_tutor'];
        $id_empresa = $_POST['id'];

        $obj_tutor_model = new TutorModel();
        $rta = $obj_tutor_model->insertarTutor($nombre_tutor, $correo_tutor, $celular_tutor, $id_empresa);
        if ($rta == 0) {
            $response['title'] = "Ocurrio un error";
            $response['state'] = "error";
            $response['location'] = "ver_tutores.php";
        } else {
            $response['title'] = "Tutor Agregado Correctamente";
            $response['state'] = "success";
            $response['location'] = "ver_tutores.php";
        }
        echo json_encode($response);
        // Pregunta si la accion es "logearse"
    } else if ($_POST['accion'] == "actualizar_tutor") {
        $response = array();
        $id_empresa = $_POST['id'];
        $id_tutor = $_POST['id_tutor'];
        $nombre_tutor = $_POST['nombre_tutor'];
        $correo_tutor = $_POST['correo_tutor'];
        $celular_tutor = $_POST['celular_tutor'];

        $tutor = new TutorModel();
        $rta = $tutor->actualizarTutor($id_tutor, $nombre_tutor, $correo_tutor, $celular_tutor);
        if ($rta == 0) {
            $response['title'] = "Error al editar los datos";
            $response['state'] = "error";
            $response['location'] = "ver_tutores.php";
        } else {
            $response['title'] = "Datos editados correctamente";
            $response['state'] = "success";
            $response['location'] = "ver_tutores.php";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "eliminar_tutor") {
        $response = array();

        $id_tutor = $_POST['id_tutor'];
        $tutor = new TutorModel();
        $rta = $tutor->eliminarTutor($id_tutor);
        if ($rta == 0) {
            $response['title'] = "Error al eliminar tutor";
            $response['state'] = "error";
            $response['location'] = "ver_tutores.php";
        } else {
            $response['title'] = "Tutor Eliminado correctamente";
            $response['state'] = "success";
            $response['location'] = "ver_tutores.php";
        }
        echo json_encode($response);
    }
}

function mostrarDatosTutorEmpresa($id_empresa)
{
    $tutor = new TutorModel();
    return $tutor->mostrarDatosTutorPorEmpresa($id_empresa);
}

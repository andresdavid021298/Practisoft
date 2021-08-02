<?php
require_once '../../Model/DAO/Coordinador_Model.php';

if (isset($_POST['accion'])) {
    if ($_POST['accion'] == 'actualizar_perfil') {
        $id_coordinador =  $_POST['id_coordinador'];
        $codigo_coordinador = $_POST['codigo_coordinador'];
        $celular_coordinador = $_POST['celular_coordinador'];
        $coordinador = new CoordinadorModel();
        $rta = $coordinador->actualizarCoordinador($id_coordinador, $codigo_coordinador, $celular_coordinador);
        if ($rta == 0) {
            $response['title'] = "Error al actualizar coordinador";
            $response['state'] = "error";
            $response['location'] = "perfil.php";
        } else {
            $response['title'] = "Coordinador actualizado correctamente";
            $response['state'] = "success";
            $response['location'] = "perfil.php";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "agregar_coordinador") {
        $response = array();
        $nombre_coordinador = $_POST['nombre_coordinador'];
        $correo_coordinador = $_POST['correo_coordinador'];
        // Validar la extensión ufps.edu.co
        $extension = strrchr($correo_coordinador, "@");

        if ($extension != "@ufps.edu.co") {
            $response['state'] = "error";
            $response['title'] = "El correo debe ser institucional";
        } else {
            $obj_coordinador_model = new CoordinadorModel();
            $rta = $obj_coordinador_model->insertarCoordinador($nombre_coordinador, $correo_coordinador);
            if ($rta == 0) {
                $response['state'] = "error";
                $response['title'] = "Ocurrio un error";
            } else {
                $response['state'] = "success";
                $response['title'] = "Coordinador Agregado Correctamente";
            }
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "eliminar_coordinador") {
        $response = array();
        $id_coordinador = $_POST['id_coordinador'];
        $obj_coordinador_model = new CoordinadorModel();
        $rta = $obj_coordinador_model->eliminarCoordinador($id_coordinador);
        if ($rta == 0) {
            $response['state'] = "error";
            $response['title'] = "Ocurrio un error";
        } else {
            $response['state'] = "success";
            $response['title'] = "Coordinador Eliminado Correctamente";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "actualizar_coordinador") {
        $response = array();
        $id_coordinador = $_POST['id_coordinador'];
        $nombre_coordinador = $_POST['nombre_coordinador'];
        $correo_coordinador = $_POST['correo_coordinador'];
        $extension = strrchr($correo_coordinador, "@");

        if ($extension != "@ufps.edu.co") {
            $response['state'] = "error";
            $response['title'] = "El correo debe ser institucional";
        } else {
            $obj_coordinador_model = new CoordinadorModel();
            $rta = $obj_coordinador_model->actualizarCoordinadorDesdeDirector($id_coordinador, $nombre_coordinador, $correo_coordinador);
            if ($rta == 0) {
                $response['state'] = "error";
                $response['title'] = "Ocurrio un error";
            } else {
                $response['state'] = "success";
                $response['title'] = "Coordinador Actualizado Correctamente";
            }
        }
        echo json_encode($response);
    }
}

// Metodo que conecta con la vista para traer datos de un coordinador
function buscarCoordinador($id_coordinador)
{
    $obj_coordinador_model = new CoordinadorModel();
    return $obj_coordinador_model->buscarCoordinador($id_coordinador);
}

// Metodo que conecta con la vista para listar todos los coordinadores
function listarCoordinadores()
{
    $obj_coordinador_model = new CoordinadorModel();
    return $obj_coordinador_model->listarCoordinadores();
}

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
    }
}

function buscarCoordinador($id_coordinador){
    $obj_coordinador_model = new CoordinadorModel();
    return $obj_coordinador_model->buscarCoordinador($id_coordinador);
}


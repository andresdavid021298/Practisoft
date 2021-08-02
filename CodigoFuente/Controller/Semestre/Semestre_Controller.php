<?php

require_once "../../Model/DAO/Semestre_Model.php";

if (isset($_POST['accion'])) {
    if ($_POST['accion'] == "insertar_semestre") {
        $nombre_semestre = $_POST['nombre_semestre'];
        $obj_semestre_model = new SemestreModel();
        $rta = $obj_semestre_model->insertarSemestre($nombre_semestre);
        
        if ($rta == 0) {
            $response['title'] = "Error al insertar semestre";
            $response['state'] = "error";
        } else {
            $response['title'] = "Creación de Semestre Exitosa";
            $response['state'] = "success";
        }
        echo json_encode($response);
    }
}

function listarSemestre()
{
    $obj_semestre_model = new SemestreModel();
    return $obj_semestre_model->listarSemestre();
}

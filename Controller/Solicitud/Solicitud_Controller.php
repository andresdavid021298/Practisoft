<?php

require_once "../../Model/DAO/Solicitud_Model.php";
if (isset($_POST['accion'])) {
    if($_POST['accion'] == 'agregarSolicitud'){
        $id_empresa = $_POST['id']; 
        $numero_practicantes = $_POST['practicantes'];
        $lista_areas = $_POST['areas'];
        //$listado_areas = implode(",", $lista_areas);
        $solicitud = new SolicitudModel();
        $rta = $solicitud->insertarSolicitud($id_empresa, $numero_practicantes, $lista_areas);
        if($rta == 0){
            $response['title'] = "Error al ingresar la solicitud";
            $response['state'] = "error";
            $response['location'] = "solicitud_practicante.php";
        }    
        else {
            $response['title'] = "Solicitud agregada correctamente";
            $response['state'] = "success";
            $response['location'] = "solicitud_practicante.php";
        }
        echo json_encode($response);
    }
}

function mostrarInformacion($id_empresa)
{
    $solicitud = new SolicitudModel();
    return $solicitud->listarSolicitudesPorEmpresa($id_empresa);
}

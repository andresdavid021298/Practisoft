<?php

require_once "../../Model/DAO/Solicitud_Model.php";
if (isset($_POST['accion'])) {
    if ($_POST['accion'] == 'agregar_solicitud') {
        $id_empresa = $_POST['id'];
        $numero_practicantes = $_POST['practicantes'];
        $lista_areas = $_POST['areas'];
        $solicitud = new SolicitudModel();
        $rta = $solicitud->insertarSolicitud($id_empresa, $numero_practicantes, $lista_areas);
        if ($rta == 0) {
            $response['title'] = "Error al ingresar la solicitud";
            $response['state'] = "error";
            $response['location'] = "solicitud_practicante.php";
        } else {
            $response['title'] = "Solicitud agregada correctamente";
            $response['state'] = "success";
            $response['location'] = "solicitud_practicante.php";
        }
        echo json_encode($response);
    }
    else if($_POST['accion'] == 'validar_solicitud'){
        $id_solicitud = $_POST['id_solicitud'];
        $solicitud = new SolicitudModel();
        $rta = $solicitud->cambiarSolicitudAprobada($id_solicitud);
        if($rta == 0){
            $response['title'] = "Error al validar la solicitud";
            $response['state'] = "error";
            $response['location'] = "revision_solicitudes.php";
        } else {
            $response['title'] = "Solicitud agregada correctamente";
            $response['state'] = "success";
            $response['location'] = "revision_solicitudes.php";
        }
        echo json_encode($response);
    }
    else if($_POST['accion'] == 'rechazar_solicitud'){
        $id_solicitud = $_POST['id_solicitud'];
        $observacion = $_POST['observacion'];
        $solicitud = new SolicitudModel();
        $rta = $solicitud->cambiarSolicitudRechazada($id_solicitud, $observacion);
        if($rta == 0){
            $response['title'] = "Error al rechazar la solicitud";
            $response['state'] = "error";
            $response['location'] = "revision_solicitudes.php";
        } else {
            $response['title'] = "Solicitud rechazada correctamente";
            $response['state'] = "success";
            $response['location'] = "revision_solicitudes.php";
        }
        echo json_encode($response);
    }
}

// Metodo que conecta con la vista para enviar los datos de las solicitudes de una empresa
function mostrarInformacion($id_empresa)
{
    $solicitud = new SolicitudModel();
    return $solicitud->listarSolicitudesPorEmpresa($id_empresa);
}
// Metodo que conecta con la vista para enviar la cantidad de solicitudes aprobadas de una empresa
function cantidadSolicitudesAprobadas($id_empresa)
{
    $obj_solicitud_model = new SolicitudModel();
    return $obj_solicitud_model->cantidadSolicitudesAprobadasPorEmpresa($id_empresa);
}

// Metodo que conecta con la vista para enviar la cantidad de solicitudes en espera de una empresa
function cantidadSolicitudesEnEspera($id_empresa)
{
    $obj_solicitud_model = new SolicitudModel();
    return $obj_solicitud_model->cantidadSolicitudesEnEsperaPorEmpresa($id_empresa);
}

// Metodo que conecta con la vista para enviar las solicitudes recibidas por parte de las empresas
function listaSolicitudEmpresas(){
    $obj_solicitud_model = new SolicitudModel();
    return $obj_solicitud_model->listarSolicitudes();
}
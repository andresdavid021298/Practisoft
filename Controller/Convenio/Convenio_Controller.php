<?php

require_once "../../Model/DAO/Convenio_Model.php";

if (isset($_POST['fecha_inicio']) || isset($_POST['fecha_expiracion']) || isset($_POST['input_archivo'])) {
    $response = array();
    $fechaInicio = $_POST['fecha_inicio'];
    $fechaExpiracion = $_POST['fecha_expiracion'];
    $nombre_empresa = $_POST['nombre_empresa'];
    $idEmpresa = $_POST['id_empresa'];
    $nombreArchivo = $_FILES['input_archivo']['name'];
    $ruta = $_SERVER['DOCUMENT_ROOT'] . '/PractiSoft/Documentos/Convenios/';
    $formatoNombre = "Convenio_" . $nombre_empresa;
    $extension = strrchr($nombreArchivo, ".");
    $archivo = $formatoNombre . $extension;
    $tipoArchivo = $_FILES['input_archivo']['type'];
    if ($tipoArchivo != "application/pdf") {
        $response['title'] = "Solo se permiten archivos PDF";
        $response['state'] = "warning";
    } else {
        try {
            move_uploaded_file($_FILES['input_archivo']['tmp_name'], $ruta . $archivo);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $convenio = new ConvenioModel();
        $rta = $convenio->insertarConvenio($idEmpresa, $archivo, $fechaInicio, $fechaExpiracion);
        if ($rta == 0) {
            $response['title'] = "Error al subir el convenio";
            $response['state'] = "error";
        } else {
            $response['title'] = "Información cargada correctamente";
            $response['state'] = "success";
        }
    }
    echo json_encode($response);
}

function mostrarConvenio($id_empresa)
{
    $convenio = new ConvenioModel();
    return $convenio->mostrarConvenio($id_empresa);
}

<?php

require_once "../../Model/DAO/Convenio_Model.php";

if (isset($_POST['fecha_inicio']) || isset($_POST['fecha_expiracion']) || isset($_FILES['input_archivo_documentos']['name'])) {
    $response = array();
    $nombreArchivo = $_FILES['input_archivo_documentos']['name'];
    $idEmpresa = $_POST['id_empresa'];
    $nombre_empresa = $_POST['nombre_empresa'];
    $formatoNombre = "Convenio_" . $nombre_empresa;
    $extension = strrchr($nombreArchivo, ".");
    $archivo = $formatoNombre . $extension;
    $ruta = $_SERVER['DOCUMENT_ROOT'] . '/PractiSoft/Documentos/Convenios/' . $archivo;
    $fechaInicio = $_POST['fecha_inicio'];
    $fechaExpiracion = $_POST['fecha_expiracion'];
    $tipoArchivo = $_FILES['input_archivo_documentos']['type'];
    if ($tipoArchivo != "application/pdf") {
        $response['title'] = "Solo se permiten archivos PDF";
        $response['state'] = "warning";
    } else {
        move_uploaded_file($_FILES['input_archivo_documentos']['tmp_name'], $ruta);
        $convenio = new ConvenioModel();
        $registros = $convenio->verificarRegistroDocumento($idEmpresa);
        if ($registros == 0) {
            $rta = $convenio->insertarConvenio($idEmpresa, $archivo, $fechaInicio, $fechaExpiracion);
            if ($rta == 0) {
                $response['title'] = "Error al subir el convenio";
                $response['state'] = "error";
            } else {
                $response['title'] = "Convenio cargado correctamente";
                $response['state'] = "success";
            }
        } else {
            $rta = $convenio->actualizarConvenio($idEmpresa, $archivo, $fechaInicio, $fechaExpiracion);
            if ($rta == 0) {
                $response['title'] = "Error al actualizar el convenio";
                $response['state'] = "error";
            } else {
                $response['title'] = "Convenio actualizado correctamente";
                $response['state'] = "success";
            }
        }
    }
    echo json_encode($response);
}

function mostrarConvenio($id_empresa)
{
    $convenio = new ConvenioModel();
    return $convenio->mostrarConvenio($id_empresa);
}

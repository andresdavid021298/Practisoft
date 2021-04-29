<?php

require_once "../../Model/DAO/Documentos_Empresa_Model.php";

if (isset($_FILES['input_archivo']['name'])) {
    $response = array();
    $nombreArchivo = $_FILES['input_archivo']['name'];
    $idEmpresa = $_POST['id_empresa'];
    $nombre_empresa = $_POST['nombre_empresa'];
    $formatoNombre = "Protocolos_" . $nombre_empresa;
    $extension = strrchr($nombreArchivo, ".");
    $archivo = $formatoNombre . $extension;
    $location = $_SERVER['DOCUMENT_ROOT'] . '/PractiSoft/Documentos/ProtocolosBioseguridad/' . $archivo;
    $tipoArchivo = $_FILES['input_archivo']['type'];
    if ($tipoArchivo != "application/pdf") {
        $response['title'] = "Solo se permiten archivos PDF";
        $response['state'] = "warning";
    } else {
        move_uploaded_file($_FILES['input_archivo']['tmp_name'], $location);
        $protocolos = new DocumentosEmpresaModel();
        $registros = verificarRegistros($idEmpresa);
        if ($registros == 0) {
            $rta = $protocolos->insertarDocumentoProtocolos($idEmpresa, $archivo);
            if ($rta == 0) {
                $response['title'] = "Error al subir el convenio";
                $response['state'] = "error";
            } else {
                $response['title'] = "Información cargada correctamente";
                $response['state'] = "success";
            }
        } else {
            $rta = $protocolos->actualizarDocumentoProtocolos($idEmpresa, $archivo);
            if ($rta == 0) {
                $response['title'] = "Error al subir el convenio";
                $response['state'] = "error";
            } else {
                $response['title'] = "Información actualizada correctamente";
                $response['state'] = "success";
            }
        }
    }
    echo json_encode($response);
}

function mostrarDatosProtocolos($id_empresa)
{
    $protocolos = new DocumentosEmpresaModel();
    return $protocolos->mostrarProtocolos($id_empresa);
}

function mostrarDatosCertificado($id_empresa)
{
    $certificado = new DocumentosEmpresaModel();
    return $certificado->mostrarCertificado($id_empresa);
}

function verificarRegistros($id_empresa)
{
    $registros = new DocumentosEmpresaModel();
    return $registros->verificarRegistroDocumento($id_empresa);
}

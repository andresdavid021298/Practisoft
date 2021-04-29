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
    move_uploaded_file($_FILES['input_archivo']['tmp_name'], $location);
    $id = intval($idEmpresa);
    $protocolos = new DocumentosEmpresaModel();
    $rta = $protocolos->insertarDocumentoProtocolos($id, $archivo);
    if ($rta == 0) {
        $response['title'] = "Error al subir el convenio";
        $response['state'] = "error";
    } else {
        $response['title'] = "Información cargada correctamente";
        $response['state'] = "success";
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

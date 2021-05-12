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
                $response['title'] = "Error al subir los protocolos de bioseguridad";
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
} else if (isset($_FILES['input_archivo_certificado']['name'])) {
    $response = array();
    $nombreArchivo = $_FILES['input_archivo_certificado']['name'];
    $idEmpresa = $_POST['id_empresa'];
    $nombre_empresa = $_POST['nombre_empresa'];
    $formatoNombre = "Certificado_" . $nombre_empresa;
    $extension = strrchr($nombreArchivo, ".");
    $archivo = $formatoNombre . $extension;
    $location = $_SERVER['DOCUMENT_ROOT'] . '/PractiSoft/Documentos/CertificadoExistencia/' . $archivo;
    $tipoArchivo = $_FILES['input_archivo_certificado']['type'];
    if ($tipoArchivo != "application/pdf") {
        $response['title'] = "Solo se permiten archivos PDF";
        $response['state'] = "warning";
    } else {
        move_uploaded_file($_FILES['input_archivo_certificado']['tmp_name'], $location);
        $certificado = new DocumentosEmpresaModel();
        $registros = verificarRegistros($idEmpresa);
        if ($registros == 0) {
            $rta = $certificado->insertarDocumentoCertificado($idEmpresa, $archivo);
            if ($rta == 0) {
                $response['title'] = "Error al subir el certificado de existencia";
                $response['state'] = "error";
            } else {
                $response['title'] = "Información cargada correctamente";
                $response['state'] = "success";
            }
        } else {
            $rta = $certificado->actualizarDocumentoCertificado($idEmpresa, $archivo);
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
} else if (isset($_FILES['input_archivo_rut']['name'])) {
    $response = array();
    $nombreArchivo = $_FILES['input_archivo_rut']['name'];
    $idEmpresa = $_POST['id_empresa'];
    $nombre_empresa = $_POST['nombre_empresa'];
    $formatoNombre = "RUT_" . $nombre_empresa;
    $extension = strrchr($nombreArchivo, ".");
    $archivo = $formatoNombre . $extension;
    $location = $_SERVER['DOCUMENT_ROOT'] . '/PractiSoft/Documentos/RUT/' . $archivo;
    $tipoArchivo = $_FILES['input_archivo_rut']['type'];
    if ($tipoArchivo != "application/pdf") {
        $response['title'] = "Solo se permiten archivos PDF";
        $response['state'] = "warning";
    } else {
        move_uploaded_file($_FILES['input_archivo_rut']['tmp_name'], $location);
        $certificado = new DocumentosEmpresaModel();
        $registros = verificarRegistros($idEmpresa);
        if ($registros == 0) {
            $rta = $certificado->insertarDocumentoRUT($idEmpresa, $archivo);
            if ($rta == 0) {
                $response['title'] = "Error al subir el RUT";
                $response['state'] = "error";
            } else {
                $response['title'] = "Información cargada correctamente";
                $response['state'] = "success";
            }
        } else {
            $rta = $certificado->actualizarDocumentoRUT($idEmpresa, $archivo);
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
}else if (isset($_FILES['input_archivo_representante']['name'])) {
    $response = array();
    $nombreArchivo = $_FILES['input_archivo_representante']['name'];
    $idEmpresa = $_POST['id_empresa'];
    $nombre_empresa = $_POST['nombre_empresa'];
    $formatoNombre = "CCRepresentante_" . $nombre_empresa;
    $extension = strrchr($nombreArchivo, ".");
    $archivo = $formatoNombre . $extension;
    $location = $_SERVER['DOCUMENT_ROOT'] . '/PractiSoft/Documentos/CedulaRepresentante/' . $archivo;
    $tipoArchivo = $_FILES['input_archivo_representante']['type'];
    if ($tipoArchivo != "application/pdf") {
        $response['title'] = "Solo se permiten archivos PDF";
        $response['state'] = "warning";
    } else {
        move_uploaded_file($_FILES['input_archivo_representante']['tmp_name'], $location);
        $representante = new DocumentosEmpresaModel();
        $registros = verificarRegistros($idEmpresa);
        if ($registros == 0) {
            $rta = $representante->insertarDocumentoRepresentante($idEmpresa, $archivo);
            if ($rta == 0) {
                $response['title'] = "Error al subir el documento del representante";
                $response['state'] = "error";
            } else {
                $response['title'] = "Documento de Representante cargada correctamente";
                $response['state'] = "success";
            }
        } else {
            $rta = $representante->actualizarDocumentoRepresentante($idEmpresa, $archivo);
            if ($rta == 0) {
                $response['title'] = "Error al actualizar documento";
                $response['state'] = "error";
            } else {
                $response['title'] = "Documento de representante actualizada correctamente";
                $response['state'] = "success";
            }
        }
    }
    echo json_encode($response);
}

// Metodo que conecta con la vista para verificar si existe registro de algun documento para una empresa
function verificarRegistros($id_empresa)
{
    $obj_documentos_empresa_model = new DocumentosEmpresaModel();
    return $obj_documentos_empresa_model->verificarRegistroDocumento($id_empresa);
}

// Metodo que conecta con la vista para listar todos los documentos de una empresa
function listarDocumentosPorEmpresa($id_empresa)
{
    $obj_documentos_empresa_model = new DocumentosEmpresaModel();
    return $obj_documentos_empresa_model->verDocumentosEmpresa($id_empresa);
}

function mostrarDatosProtocolos($id_empresa)
{
    $obj_documentos_empresa_model = new DocumentosEmpresaModel();
    return $obj_documentos_empresa_model->mostrarProtocolos($id_empresa);
}

function mostrarDatosRepresentante($id_empresa){
    $obj_documentos_empresa_model = new DocumentosEmpresaModel();
    return $obj_documentos_empresa_model->mostrarRepresentante($id_empresa);
}

function mostrarDatosCertificado($id_empresa)
{
    $obj_documentos_empresa_model = new DocumentosEmpresaModel();
    return $obj_documentos_empresa_model->mostrarCertificado($id_empresa);
}

function mostrarDatosRUT($id_empresa)
{
    $obj_documentos_empresa_model = new DocumentosEmpresaModel();
    return $obj_documentos_empresa_model->mostrarRUT($id_empresa);
}

<?php

require_once "../../Model/DAO/Documentos_Empresa_Model.php";

if (isset($_FILES['input_archivo_documentos']['name'])) {
    $response = array();
    $nombreArchivo = $_FILES['input_archivo_documentos']['name'];
    $columna = $_POST['columna'];
    $nombre_documento = $_POST['nombre_documento'];
    $idEmpresa = $_POST['id_empresa'];
    $nombre_empresa = $_POST['nombre_empresa'];
    $formatoNombre = $nombre_documento ."_" . $nombre_empresa;
    $extension = strrchr($nombreArchivo, ".");
    $archivo = $formatoNombre . $extension;
    $location = $_SERVER['DOCUMENT_ROOT'] . '/PractiSoft/Documentos/' . $archivo;
    $tipoArchivo = $_FILES['input_archivo_documentos']['type'];
    if ($tipoArchivo != "application/pdf") {
        $response['title'] = "Solo se permiten archivos PDF";
        $response['state'] = "warning";
    } else {
        move_uploaded_file($_FILES['input_archivo_documentos']['tmp_name'], $location);
        $nuevo_documento = new DocumentosEmpresaModel();
        $registros = verificarRegistros($idEmpresa);
        $lista_documentos = verificarDocumentacion($idEmpresa);
        if ($registros == 0) {
            $rta = $nuevo_documento->insertarDocumento($idEmpresa, $columna, $archivo);
            if ($rta == 0) {
                $response['title'] = "Error al subir el documento " . $nombre_documento;
                $response['state'] = "error";
            } else {
                $response['title'] = "Documento" . $nombre_documento . "cargado correctamente";
                $response['state'] = "success";
            }
        } else {
            if ($lista_documentos[$columna] == NULL) {
                $rta = $nuevo_documento->actualizarDocumento($idEmpresa, $columna, $archivo);
                if ($rta == 0) {
                    $response['title'] = "Error al subir el documento " . $nombre_documento;
                    $response['state'] = "error";
                } else {
                    $response['title'] = "Documento " . $nombre_documento . " cargado correctamente";
                    $response['state'] = "success";
                }
            } else {
                $rta = $nuevo_documento->actualizarDocumento($idEmpresa, $columna, $archivo);
                if ($rta == 0) {
                    $response['title'] = "Error al subir el documento " . $nombre_documento;
                    $response['state'] = "error";
                } else {
                    $response['title'] = "Documento " . $nombre_documento . " actualizado correctamente";
                    $response['state'] = "success";
                }
            }
        }
    }
    echo json_encode($response);
}

if (isset($_POST['accion'])) {
    if ($_POST['accion'] == "crear_documento_BD") {
        $nombre_documento = $_POST['nombre_documento'];
        $obj_documentos_empresa_model = new DocumentosEmpresaModel();
        $rta = $obj_documentos_empresa_model->agregarDocumentoBD($nombre_documento);
        if ($rta == 0) {
            $response['title'] = "Error al crear documento";
            $response['state'] = "error";
        } else {
            $response['title'] = "Documento creado correctamente";
            $response['state'] = "success";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "actualizar_documento_BD") {
        $nombre_documento_nuevo = $_POST['nombre_documento_nuevo'];
        $nombre_documento_antiguo = $_POST['nombre_documento_antiguo'];
        $obj_documentos_empresa_model = new DocumentosEmpresaModel();
        $rta = $obj_documentos_empresa_model->actualizarDocumentoBD($nombre_documento_antiguo, $nombre_documento_nuevo);
        if ($rta == 0) {
            $response['title'] = "Error al actualizar el documento";
            $response['state'] = "error";
        } else {
            $response['title'] = "Documento actualizado correctamente";
            $response['state'] = "success";
        }
        echo json_encode($response);
    } else if($_POST['accion'] == "eliminar_documento_BD"){
        $nombre_documento = $_POST['nombre_documento'];
        $obj_documentos_empresa_model = new DocumentosEmpresaModel();
        $rta = $obj_documentos_empresa_model->eliminarDocumentoBD($nombre_documento);
        if ($rta == 0) {
            $response['title'] = "Error al eliminar el documento";
            $response['state'] = "error";
        } else {
            $response['title'] = "Documento eliminado correctamente";
            $response['state'] = "success";
        }
        echo json_encode($response);
    }
}

//Método para listar los documentos de la BD
function verDocumentosBD()
{
    $obj_documentos_empresa_model = new DocumentosEmpresaModel();
    return $obj_documentos_empresa_model->verDocumentosBD();
}

// Metodo que conecta con la vista para verificar si existe registro de algun documento para una empresa
function verificarRegistros($id_empresa)
{
    $obj_documentos_empresa_model = new DocumentosEmpresaModel();
    return $obj_documentos_empresa_model->verificarRegistroDocumento($id_empresa);
}

function verificarDocumentacion($id_empresa)
{
    $obj_documentos_empresa_model = new DocumentosEmpresaModel();
    return $obj_documentos_empresa_model->verificarDocumentacion($id_empresa);
}

// Metodo que conecta con la vista para listar todos los documentos de una empresa
function listarDocumentosPorEmpresa($id_empresa)
{
    $obj_documentos_empresa_model = new DocumentosEmpresaModel();
    return $obj_documentos_empresa_model->verDocumentosEmpresa($id_empresa);
}

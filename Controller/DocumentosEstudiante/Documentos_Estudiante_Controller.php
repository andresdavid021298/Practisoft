<?php

require_once '../../Model/DAO/Documentos_Estudiante_Model.php';

function verificarRegistros($id_estudiante)
{
    $registros = new DocumentosEstudianteModel();
    return $registros->verificarRegistroDocumento($id_estudiante);
}

function mostrarDocumentoCartaCompromisoria($id_estudiante)
{
    $obj_carta_compromisoria = new DocumentosEstudianteModel();
    return $obj_carta_compromisoria->mostrarDocumentoCartaCompromisoria($id_estudiante);
}

function mostrarDocumentoInformeDeAvance($id_estudiante)
{
    $obj_informe_avance = new DocumentosEstudianteModel();
    return $obj_informe_avance->mostrarDocumentoInformeDeAvance($id_estudiante);
}

if (isset($_FILES['input_archivo_carta']['name'])) {
    $response = array();
    $nombreArchivo = $_FILES['input_archivo_carta']['name'];
    $idEstudiante = $_POST['id_estudiante'];
    $nombre_estudiante = $_POST['nombre_estudiante'];
    $formatoNombre = "Carta_Compromisoria_" . $nombre_estudiante;
    $extension = strrchr($nombreArchivo, ".");
    $archivo = $formatoNombre . $extension;
    $location = $_SERVER['DOCUMENT_ROOT'] . '/PractiSoft/Documentos/CartaCompromisoria/' . $archivo;
    $tipoArchivo = $_FILES['input_archivo_carta']['type'];
    if ($tipoArchivo != "application/pdf") {
        $response['title'] = "Solo se permiten archivos PDF";
        $response['state'] = "warning";
    } else {
        move_uploaded_file($_FILES['input_archivo_carta']['tmp_name'], $location);
        $carta = new DocumentosEstudianteModel();
        $registros = verificarRegistros($idEstudiante);
        if ($registros == 0) {
            $rta = $carta->insertarDocumentoCartaCompromisoria($idEstudiante, $archivo);
            if ($rta == 0) {
                $response['title'] = "Error al subir la carta compromisoria";
                $response['state'] = "error";
            } else {
                $response['title'] = "Carta compromisoria cargada correctamente";
                $response['state'] = "success";
            }
        } else {
            $rta = $carta->actualizarDocumentoCartaCompromisoria($idEstudiante, $archivo);
            if ($rta == 0) {
                $response['title'] = "Error al subir la carta compromisoria";
                $response['state'] = "error";
            } else {
                $response['title'] = "Información actualizada correctamente";
                $response['state'] = "success";
            }
        }
    }
    echo json_encode($response);
} else if (isset($_FILES['input_archivo_informe']['name'])) {
    $response = array();
    $nombreArchivo = $_FILES['input_archivo_informe']['name'];
    $idEstudiante = $_POST['id_estudiante'];
    $nombre_estudiante = $_POST['nombre_estudiante'];
    $formatoNombre = "Informe_Avance_" . $nombre_estudiante;
    $extension = strrchr($nombreArchivo, ".");
    $archivo = $formatoNombre . $extension;
    $location = $_SERVER['DOCUMENT_ROOT'] . '/PractiSoft/Documentos/InformeAvance/' . $archivo;
    $tipoArchivo = $_FILES['input_archivo_informe']['type'];
    if ($tipoArchivo != "application/pdf") {
        $response['title'] = "Solo se permiten archivos PDF";
        $response['state'] = "warning";
    } else {
        move_uploaded_file($_FILES['input_archivo_informe']['tmp_name'], $location);
        $informe = new DocumentosEstudianteModel();
        $registros = verificarRegistros($idEstudiante);
        if ($registros == 0) {
            $rta = $informe->insertarDocumentoInformeDeAvance($idEstudiante, $archivo);
            if ($rta == 0) {
                $response['title'] = "Error al subir el informe de avance";
                $response['state'] = "error";
            } else {
                $response['title'] = "Informe de avance cargado correctamente";
                $response['state'] = "success";
            }
        } else {
            $rta = $informe->actualizarDocumentoInformeDeAvance($idEstudiante, $archivo);
            if ($rta == 0) {
                $response['title'] = "Error al subir el informe de avance";
                $response['state'] = "error";
            } else {
                $response['title'] = "Información actualizada correctamente";
                $response['state'] = "success";
            }
        }
    }
    echo json_encode($response);
}

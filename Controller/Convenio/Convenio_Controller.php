<?php

require_once "../../Model/DAO/Convenio_Model.php";

if (isset($_POST['btn_subir_convenio'])) {
    $fechaInicio = $_POST['fecha_inicio'];
    $fechaFin = $_POST['fecha_fin'];
    $nombre_empresa = $_POST['nombre_empresa'];
    $idEmpresa = $_POST['id_empresa'];
    $nombreArchivo = $_FILES['input_archivo']['name'];
    $tipoArchivo = $_FILES['input_archivo']['type'];
    $tamanio = $_FILES['input_archivo']['size'];
    $ruta = $_SERVER['DOCUMENT_ROOT'] . '/PractiSoft/Documentos/Convenios/';
    $nombreServidor = $_SERVER['SERVER_NAME'] . '/PractiSoft/Documentos/';
    $formatoNombre = "Convenio_" . $nombre_empresa;
    try {
        $extension = strrchr($nombreArchivo, ".");
        $archivo = $formatoNombre . $extension;
        move_uploaded_file($_FILES['input_archivo']['tmp_name'], $ruta . $formatoNombre . $extension);
        // echo "Archivo subido correctamente, descarguelo <a href=" . ('../../Documentos/Convenios/' . $formatoNombre . $extension) . ">aqui<a/> ";
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $convenio = new ConvenioModel();
    $rta = $convenio->insertarConvenio($idEmpresa, $archivo, $fechaInicio, $fechaFin);
    if ($rta == 0) {
        $response['title'] = "Error al subir el convenio";
        $response['state'] = "error";
        $response['location'] = "../../View/Company/convenio.php";
    } else {
        $response['title'] = "Información cargada correctamente";
        $response['state'] = "success";
        $response['location'] = "../../View/Company/convenio.php";
    }
    echo json_encode($response);
}

function mostrarConvenio($id_empresa)
{
    $convenio = new ConvenioModel();
    return $convenio->mostrarConvenio($id_empresa);
}

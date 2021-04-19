<?php

require_once "../Model/Empresa_Model.php";

if (isset($_POST['accion'])) {
    if ($_POST["accion"] == "insertar") {
        $response = array();
        $nombre_empresa = $_POST['nombre_empresa'];
        $representante_legal = $_POST['representante_legal'];
        $direccion_empresa = $_POST['direccion_empresa'];
        $correo_empresa = $_POST['correo_empresa'];
        $celular_empresa = $_POST['celular_empresa'];
        $sector_empresa = $_POST['sector_empresa'];
        $clave_empresa = $_POST['clave_empresa'];
        $clave_codificada = password_hash($clave_empresa, PASSWORD_DEFAULT);
        $response['title'] = "Empresa Agregada Correctamente";
        $response['state'] = "success";
        echo json_encode($response);
        // $obj_empresa_model = new EmpresaModel();
        // $rta = $obj_empresa_model->insertarEmpresa($nombre_empresa, $representante_legal, $direccion_empresa, $correo_empresa, $celular_empresa, $sector_empresa, $clave_empresa);
        // if ($rta == 0) {
        //     echo "Mal";
        // } else {
        //     echo "Bien";
        // }

    }
}

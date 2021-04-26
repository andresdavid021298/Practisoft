<?php

require_once "../../Model/DAO/Empresa_Model.php";

if (isset($_POST['accion'])) {
    if ($_POST['accion'] == "registrar") {
        $response = array();
        $nombre_empresa = $_POST['nombre_empresa'];
        $representante_legal = $_POST['representante_legal'];
        $NIT = $_POST['NIT'];
        $direccion_empresa = $_POST['direccion_empresa'];
        $municipio_empresa = $_POST['municipio'];
        $correo_empresa = $_POST['correo_empresa'];
        $celular_empresa = $_POST['celular_empresa'];
        $sector_empresa = $_POST['sector_empresa'];
        $clave_empresa = $_POST['clave_empresa'];
        $clave_codificada = password_hash($clave_empresa, PASSWORD_DEFAULT);
        $obj_empresa_model = new EmpresaModel();
        $rta = $obj_empresa_model->insertarEmpresa($nombre_empresa, $representante_legal, $NIT, $direccion_empresa, $municipio_empresa, $correo_empresa, $celular_empresa, $sector_empresa, $clave_codificada);
        if ($rta == 0) {
            $response['title'] = "Ocurrio un error";
            $response['state'] = "error";
        } else {
            $response['title'] = "Empresa Agregada Correctamente";
            $response['state'] = "success";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "login") {
        $response = array();
        $correo_empresa = $_POST['correo'];
        $clave_empresa = $_POST['clave'];
        $obj_empresa_model = new EmpresaModel();
        $rta = $obj_empresa_model->verificarExistencia($correo_empresa, $clave_empresa);
        if ($rta == 0) {
            $response['title'] = "Ocurrio un error";
            $response['state'] = "error";
            $response['location'] = "index.php";
        } else if ($rta == 2) {
            $response['title'] = "Datos Incorrectos";
            $response['state'] = "warning";
            $response['location'] = "index.php";
        } else {
            $response['title'] = "Bienvenido " . $rta['nombre_empresa'];
            $response['state'] = "success";
            $response['location'] = "View/Company/index_company.php";
            session_start();
            $_SESSION["id_empresa"] = $rta['id_empresa'];
            $_SESSION["nombre_empresa"] = $rta['nombre_empresa'];
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "actualizarDatos") {
        $response = array();
        $id_empresa = $_POST['id'];
        $representante_legal = $_POST['representante'];
        $direccion_empresa = $_POST['direccion'];
        $municipio_empresa = $_POST['municipio'];
        $tutor = $_POST['tutor'];
        $correo_empresa = $_POST['correo'];
        $celular_empresa = $_POST['contacto'];
        $empresa = new EmpresaModel();
        $rta = $empresa->actualizarEmpresa($id_empresa, $representante_legal, $direccion_empresa, $municipio_empresa, $tutor, $correo_empresa, $celular_empresa);
        if ($rta == 0) {
            $response['title'] = "Error al editar los datos";
            $response['state'] = "error";
            $response['location'] = "actualizar_perfil.php";
        } else {
            $response['title'] = "Datos editados correctamente";
            $response['state'] = "success";
            $response['location'] = "actualizar_perfil.php";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == 'cambiarClave') {
        $response = array();
        $id_empresa = $_SESSION['id_empresa'];
        $clave1 = $_POST['clave1'];
        $clave2 = $_POST['clave2'];
        $clave_codificada = password_hash($clave1, PASSWORD_DEFAULT);
        $empresa = new EmpresaModel();
        $rta = $empresa->cambiarClave($id_empresa, $clave_codificada);
        if ($rta == 0) {
            $response['title'] = "Error al cambiar la contraseña";
            $response['state'] = "error";
            $response['location'] = "cambiar_clave.php";
        } else {
            $response['title'] = "Clave cambiada correctamente. Por favor vuelve a iniciar sesión";
            $response['state'] = "success";
            $response['location'] = "../../index.php";
        }
        echo json_encode($response);
    }
}

function mostrarDatos($id_empresa)
{
    $empresa = new EmpresaModel();
    return $empresa->mostrarDatos($id_empresa);
}

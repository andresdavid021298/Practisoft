<?php

require_once "../../Model/DAO/Empresa_Model.php";
require_once "../../Model/DAO/Restablecimiento_Clave_Model.php";

//Importación de la librería de PHPMailer
require_once "../../PHPMailer-master/src/Exception.php";
require_once "../../PHPMailer-master/src/PHPMailer.php";
require_once "../../PHPMailer-master/src/SMTP.php";
require_once '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

// Valida si se envia por metodo POST en algun campo "accion"
if (isset($_POST['accion'])) {
    // Pregunta si la accion es "registrar"
    if ($_POST['accion'] == "registrar") {
        $response = array();
        $nombre_empresa = $_POST['nombre_empresa'];
        $representante_legal = $_POST['representante_legal'];
        $NIT = $_POST['NIT'];
        $direccion_empresa = $_POST['direccion_empresa'];
        $municipio_empresa = $_POST['municipio'];
        $correo_empresa = $_POST['correo_empresa'];
        $pagina_web_empresa = $_POST['pagina_web_empresa'];
        $celular_empresa = $_POST['celular_empresa'];
        $telefono_empresa = $_POST['telefono_empresa'];
        $sector_empresa = $_POST['sector_empresa'];
        $actividad_empresa = $_POST['actividad_empresa'];
        $clave_empresa = $_POST['clave_empresa'];
        $clave_codificada = password_hash($clave_empresa, PASSWORD_DEFAULT);
        $obj_empresa_model = new EmpresaModel();
        $servidor = $_SERVER['SERVER_NAME'];
        $rta = $obj_empresa_model->insertarEmpresa($nombre_empresa, $representante_legal, $NIT, $direccion_empresa, $municipio_empresa, $correo_empresa, $pagina_web_empresa, $celular_empresa, $telefono_empresa, $sector_empresa, $actividad_empresa, $clave_codificada);
        if ($rta == 1) {
            $result = $obj_empresa_model->mostrarIdYNombreEmpresa($correo_empresa);
            $head = "<html><h3 style='text-align: center;'><span style='color: #D61117;'><img src='https://ingsistemas.cloud.ufps.edu.co/rsc/img/logo_vertical_ingsistemas_ht180.png' style='border-style: solid'; width='388' height='132' /></span></h3>
            <h1 style='text-align: center;'><span style='color: #D61117;'>PractiSoft - Sistema de Prácticas Empresariales</span></h1>
            <h3 style='text-align: center;'><strong>Mensaje de confirmación de empresa</strong></h3>
            <p>Para validar su empresa en el sistema, ingrese <a href='" . $servidor . "/Practisoft/View/Company/confirmar_registro_empresa.php?id_empresa=" . $result['id_empresa'] . "'>aquí.</a></p>";
            try {
                $oMail = new PHPMailer();
                $oMail->isSMTP();
                $oMail->Host = "smtp.gmail.com";
                $oMail->Port = 587;
                $oMail->SMTPSecure = "tls";
                $oMail->SMTPAuth = true;
                $oMail->Username = "practisoftufps@gmail.com";
                $oMail->Password = "practisoftufps2021@";
                $oMail->setFrom("practisoftufps@gmail.com");
                $oMail->addAddress($correo_empresa);
                $oMail->Subject = 'Registro de Empresa' . ' - ' . 'PractiSoft UFPS' . ' - ' . $result['nombre_empresa'];
                $oMail->msgHTML($head);
                if (!$oMail->send()) {
                    $response['title'] = $oMail->ErrorInfo;
                    $response['state'] = "error";
                }
            } catch (Exception $e) {
                $response['title'] = $e->getMessage();
                $response['state'] = "error";
            }
            $response['title'] = "Solicitud recibida. Por favor revise su correo";
            $response['state'] = "success";
        } else {
            $response['title'] = "Ocurrió un error";
            $response['state'] = "error";
        }
        echo json_encode($response);
        // Pregunta si la accion es "logearse"
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
            $result = $obj_empresa_model->verificarEstadoEmpresa($rta['id_empresa']);
            if ($result['estado'] == 'Inactivo') {
                $response['title'] = "No se ha validado la empresa. Por favor revise su correo.";
                $response['state'] = "error";
                $response['location'] = "index.php";
            } else {
                $response['title'] = "Bienvenido " . $rta['nombre_empresa'];
                $response['state'] = "success";
                $response['location'] = "View/Company/index_company.php";
                session_start();
                $_SESSION["id_empresa"] = $rta['id_empresa'];
                $_SESSION["nombre_empresa"] = $rta['nombre_empresa'];
            }
        }
        echo json_encode($response);
        // Pregunta si la accion es "actualizar datos"
    } else if ($_POST['accion'] == "actualizar_datos") {
        $response = array();
        $id_empresa = $_POST['id'];
        $representante_legal = $_POST['representante'];
        $direccion_empresa = $_POST['direccion'];
        $municipio_empresa = $_POST['municipio'];
        $correo_empresa = $_POST['correo'];
        $celular_empresa = $_POST['contacto'];
        $telefono_empresa = $_POST['telefono'];
        $pagina_web = $_POST['pagina_web'];
        $empresa = new EmpresaModel();
        $rta = $empresa->actualizarEmpresa($id_empresa, $representante_legal, $direccion_empresa, $municipio_empresa, $correo_empresa, $pagina_web, $celular_empresa, $telefono_empresa);
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
        // Pregunta si la accion es "cambiar la clave"
    } else if ($_POST['accion'] == 'cambiar_clave') {
        $response = array();
        $id_empresa = $_POST['id_empresa'];
        $clave_empresa = $_POST['clave'];
        $clave_codificada = password_hash($clave_empresa, PASSWORD_DEFAULT);
        $empresa = new EmpresaModel();
        $rta = $empresa->cambiarClave($id_empresa, $clave_codificada);
        if ($rta == 0) {
            $response['title'] = "Error al cambiar la contraseña";
            $response['state'] = "error";
            $response['location'] = "cambiar_clave.php";
        } else {
            $response['title'] = "Clave cambiada correctamente. Por favor vuelva a iniciar sesión";
            $response['state'] = "success";
            $response['location'] = "../../index.php";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == 'cambiar_clave_email') {

        $response = array();
        $correo_empresa = $_POST['input_correo'];
        $token = bin2hex(random_bytes(8));
        $empresa = new EmpresaModel();
        $result = $empresa->mostrarIdYNombreEmpresa($correo_empresa);
        $servidor = $_SERVER['SERVER_NAME'];

        if ($result != NULL) {
            $head = "<html><h3 style='text-align: center;'><span style='color: #D61117;'><img src='https://ingsistemas.cloud.ufps.edu.co/rsc/img/logo_vertical_ingsistemas_ht180.png' style='border-style: solid'; width='388' height='132' /></span></h3>
            <h1 style='text-align: center;'><span style='color: #D61117;'>PractiSoft - Sistema de Prácticas Empresariales</span></h1>
            <h3 style='text-align: center;'><strong>Mensaje de recuperación de clave</strong></h3>
            <p>Empresa <b>" . $result['nombre_empresa'] . "</b>, recuerde que tiene una hora para restablecer su contraseña antes de que caduque el link.</p>
            <p>Para restablecer su contraseña, acceda al siguiente <a href='" . $servidor . "/Practisoft/View/Company/Recuperar_clave_email.php?id_empresa=" . $result['id_empresa'] . "&token=" . $token . "'>link.</a></p>";
            try {
                $oMail = new PHPMailer();
                $oMail->isSMTP();
                $oMail->Host = "smtp.gmail.com";
                $oMail->Port = 587;
                $oMail->SMTPSecure = "tls";
                $oMail->SMTPAuth = true;
                $oMail->Username = "practisoftufps@gmail.com";
                $oMail->Password = "practisoftufps2021@";
                $oMail->setFrom("practisoftufps@gmail.com");
                $oMail->addAddress($correo_empresa);
                $oMail->Subject = "Restablecimiento de Clave - PractiSoft UFPS" . " - " . $result['nombre_empresa'];
                $oMail->msgHTML($head);
                $response['title'] = "Solicitud recibida. Por favor revise su correo.";
                $response['state'] = "success";
                if (!$oMail->send()) {
                    $response['title'] = $oMail->ErrorInfo;
                    $response['state'] = "error";
                }
                $restablecimientoClave = new RestablecimientoClaveModel();
                $rta = $restablecimientoClave->insertarSolicitudCambioClave($result['id_empresa'], $token);
            } catch (Exception $e) {
                $response['title'] = $e->getMessage();
                $response['state'] = "error";
            }
        } else {
            $response['title'] = "Correo no registrado en el sistema";
            $response['state'] = "error";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == 'restablecer_clave') {
        $response = array();
        $id_empresa = $_POST['id_empresa'];
        $inputClave1 = $_POST['inputClave1'];
        $token = $_POST['token'];
        $clave_codificada = password_hash($inputClave1, PASSWORD_DEFAULT);
        $restablecimientoClave = new RestablecimientoClaveModel();
        $result = $restablecimientoClave->buscarSolicitudRestablecimientoClave($id_empresa, $token);
        if ($result != NULL) {
            $empresa = new EmpresaModel();
            $rta = $empresa->cambiarClave($id_empresa, $clave_codificada);
            if ($rta == 0) {
                $response['title'] = "Error al restablecer la contraseña";
                $response['state'] = "error";
                $response['location'] = "cambiar_clave.php";
            } else {
                $response['title'] = "Contraseña restablecida correctamente. Por favor vuelve a iniciar sesión";
                $response['state'] = "success";
                $response['location'] = "../../index.php";
            }
        } else {
            $response['title'] = "El token de verificación se ha vencido";
            $response['state'] = "error";
            $response['location'] = "../../index.php";
        }
        echo json_encode($response);
    }
}

// Metodo que conecta con la vista para enviar los datos de la empresa que trae desde modelo Empresa
function mostrarDatos($id_empresa)
{
    $obj_empresa_model = new EmpresaModel();
    return $obj_empresa_model->mostrarDatos($id_empresa);
}

// Metodo que conecta con la vista para enviar los datos de la empresa a signada a un estudiante
function mostrarEmpresaAsignadaEstudiante($id_estudiante)
{
    $obj_empresa_model = new EmpresaModel();
    return $obj_empresa_model->verEmpresaAsignadaEstudiante($id_estudiante);
}

// Metodo que conecta con la vista para enviar la lista de empresas que hay registradas en el sistema
function listarTodasLasEmpresas()
{
    $obj_empresa_model = new EmpresaModel();
    return $obj_empresa_model->listarEmpresas();
}

// Metodo que conecta con el modelo para generar el informe de empresas
function generarInformeDeEmpresas()
{
    $obj_empresa_model = new EmpresaModel();
    return $obj_empresa_model->generarInformeDeEmpresas();
}

// Metodo que conecta con el modelo para activar el estado de la empresa
function activarEstadoEmpresa($id_empresa)
{
    $obj_empresa_model = new EmpresaModel();
    return $obj_empresa_model->activarEstadoEmpresa($id_empresa);
}

// Metodo que conecta con el modelo para revisar el estado de la empresa
function verificarEstadoEmpresa($id_empresa)
{
    $obj_empresa_model = new EmpresaModel();
    return $obj_empresa_model->verificarEstadoEmpresa($id_empresa);
}

// Metodo que conecta con el modelo para mostrar la cantidad de empresas según la actividad económica
function verCantidadEmpresasSegunActividad()
{
    $obj_empresa_model = new EmpresaModel();
    return $obj_empresa_model->verCantidadEmpresasSegunActividad();
}

// Metodo que conecta con el modelo para mostrar la cantidad de empresas según el sector
function verCantidadEmpresasSegunSector()
{
    $obj_empresa_model = new EmpresaModel();
    return $obj_empresa_model->verCantidadEmpresasSegunSector();
}

// Metodo que conecta con el modelo para mostrar la cantidad de empresas según el sector y la fecha
function verCantidadEmpresasSegunSectorHistorico($fecha_inicio, $fecha_fin)
{
    $obj_empresa_model = new EmpresaModel();
    return $obj_empresa_model->verCantidadEmpresasSegunSectorHistorico($fecha_inicio, $fecha_fin);
}

// Metodo que conecta con el modelo para mostrar la cantidad de empresas según el sector y la fecha
function verCantidadEmpresasSegunActividadHistorico($fecha_inicio, $fecha_fin)
{
    $obj_empresa_model = new EmpresaModel();
    return $obj_empresa_model->verCantidadEmpresasSegunActividadHistorico($fecha_inicio, $fecha_fin);
}
<?php
require_once "../../Model/DAO/Estudiante_Model.php";
require_once "../../Model/DAO/Solicitud_Model.php";
require_once "../../Model/DAO/Historico_Model.php";

//Importación de la librería de PHPMailer
require_once "../../PHPMailer-master/src/Exception.php";
require_once "../../PHPMailer-master/src/PHPMailer.php";
require_once "../../PHPMailer-master/src/SMTP.php";
require_once '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;

// Metodo que conecta con la vista para mostrar informacion de practicantes asignados a una empresa
function listarEstudiantesPorEmpresa($id_empresa)
{
    $obj_estudiante_model = new EstudianteModel();
    return $obj_estudiante_model->listarEstudiantesPorEmpresa($id_empresa);
}

// Metodo que conecta con la vista para enviar los datos de un determinado estudiante
function buscarEstudiante($id_estudiante)
{
    $obj_estudiante_model = new EstudianteModel();
    return $obj_estudiante_model->buscarEstudiante($id_estudiante);
}

// Metodo que conecta con la vista para enviar la cantidad de estudiantes asignados a una empresa
function cantidadDeEstudiantesPorEmpresa($id_empresa)
{
    $obj_estudiante_model = new EstudianteModel();
    return $obj_estudiante_model->cantidadEstudiantesPorEmpresa($id_empresa);
}

function listarEstudiantes()
{
    $obj_estudiante_model = new EstudianteModel();
    return $obj_estudiante_model->listarEstudiantes();
}

function listarEstudiantesPorGrupo($id_grupo)
{
    $obj_estudiante_model = new EstudianteModel();
    return $obj_estudiante_model->listarEstudiantesPorGrupo($id_grupo);
}

if (isset($_POST['accion'])) {
    if ($_POST['accion'] == "actualizar_perfil") {
        $response = array();
        $id_estudiante = $_POST['id_estudiante'];
        $nombre_estudiante = $_POST['nombre'];
        $codigo_estudiante = $_POST['codigo'];
        $celular_estudiante = $_POST['celular'];
        $obj_estudiante_model = new EstudianteModel();
        $rta = $obj_estudiante_model->actualizarEstudiante($id_estudiante, $nombre_estudiante, $codigo_estudiante, $celular_estudiante);
        if ($rta == 0) {
            $response['state'] = "error";
            $response['title'] = "Ocurrio un error";
        } else {
            $response['state'] = "success";
            $response['title'] = "Perfil Actualizado Correctamente";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "asignar_tutor_estudiante") {
        $response = array();
        $id_estudiante = $_POST['id_estudiante'];
        $id_tutor = $_POST['id_tutor'];

        $obj_estudiante_model = new EstudianteModel();
        $rta = $obj_estudiante_model->vincularEstudianteConTutor($id_estudiante, $id_tutor);
        if ($rta == 0) {
            $response['state'] = "error";
            $response['title'] = "Ocurrio un error";
            $response['location'] = "ver_practicantes.php";
        } else {
            $response['state'] = "success";
            $response['title'] = "Tutor Asignado Correctamente";
            $response['location'] = "ver_practicantes.php";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "asignar_empresa_estudiante") {
        $response = array();
        $id_estudiante = $_POST['id_estudiante'];
        $id_empresa = $_POST['id_empresa'];
        $id_solicitud = $_POST['id_solicitud'];

        $funciones = $_POST['funciones'];
        $nombre_estudiante = $_POST['nombre_estudiante'];
        $nombre_empresa = $_POST['nombre_empresa'];

        $obj_historico_model = new HistoricoModel();
        $res = $obj_historico_model->insertarAlHistoricoEstudiante($nombre_estudiante, $id_empresa, $funciones);
        $obj_solicitud_model = new SolicitudModel();
        $result = $obj_solicitud_model->disminuirNumeroDePracticantes($id_solicitud);
        $obj_estudiante_model = new EstudianteModel();
        $datos_estudiante = buscarEstudiante($id_estudiante);
        $rta = $obj_estudiante_model->vincularEstudianteConEmpresa($id_estudiante, $id_empresa, $id_solicitud);
        if ($result == 0) {
            $response['state'] = "error";
            $response['title'] = "Ocurrio un error";
        } else {
            if ($rta == 0) {
                $response['state'] = "error";
                $response['title'] = "Ocurrio un error";
            } else {
                $response['state'] = "success";
                $response['title'] = "Estudiante asignado correctamente";
            }
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "eliminar_estudiante") {
        $response = array();
        $id_estudiante = $_POST['id_estudiante'];
        $obj_estudiante_model = new EstudianteModel();
        $rta = $obj_estudiante_model->eliminarEstudiante($id_estudiante);
        if ($rta == 0) {
            $response['state'] = "error";
            $response['title'] = "Ocurrio un error";
        } else {
            $response['state'] = "success";
            $response['title'] = "Estudiante eliminado correctamente";
        }
        echo json_encode($response);
    } else if ($_POST['accion'] == "agregar_estudiante_individual") {
        $response = array();
        $correo_estudiante = $_POST['correo_estudiante'];
        $id_grupo = $_POST['input_id_grupo'];
        $extension = strrchr($correo_estudiante, "@");

        if ($extension != "@ufps.edu.co") {
            $response['state'] = "error";
            $response['title'] = "El correo debe ser institucional";
        } else {
            $obj_estudiante_model = new EstudianteModel();
            $rta = $obj_estudiante_model->insertarEstudiante($correo_estudiante, $id_grupo);
            if ($rta == 0) {
                $response['state'] = "error";
                $response['title'] = "Ocurrio un error";
            } else {
                try {
                    $head = "<html><h3 style='text-align: center;'><span style='color: #D61117;'><img src='https://ingsistemas.cloud.ufps.edu.co/rsc/img/logo_vertical_ingsistemas_ht180.png' style='border-style: solid'; width='388' height='132' /></span></h3>
            <h1 style='text-align: center;'><span style='color: #D61117;'>PractiSoft - Sistema de Prácticas Empresariales</span></h1>
            <h3 style='text-align: center;'><strong>Mensaje de Registro en el Sistema</strong></h3>
            <p>El sistema PractiSoft de la UFPS le da la bienvenida. A partir de este momento, usted puede ingresar al <a href='https://practisoftufps.online/'>sistema</a>,
            iniciar sesión con su correo institucional, completar sus datos personales e iniciar con su proceso de prácticas empresariales de acuerdo con las indicaciones del docente.</p>";
                    $oMail = new PHPMailer();
                    $oMail->isSMTP();
                    $oMail->Host = "smtp.gmail.com";
                    $oMail->Port = 587;
                    $oMail->SMTPSecure = "tls";
                    $oMail->SMTPAuth = true;
                    $oMail->Username = "practisoftufps@gmail.com";
                    $oMail->Password = "practisoftufps2021@";
                    $oMail->setFrom("practisoftufps@gmail.com");
                    $oMail->addAddress($correo_estudiante);
                    $oMail->Subject = "Registro Exitoso de Estudiante - PractiSoft UFPS";
                    $oMail->msgHTML($head);
                    $response['state'] = "success";
                    $response['title'] = "Estudiante agregado correctamente";
                    if (!$oMail->send()) {
                        $response['title'] = $oMail->ErrorInfo;
                        $response['state'] = "error";
                    }
                } catch (Exception $e) {
                    $response['title'] = $e->getMessage();
                    $response['state'] = "error";
                }
            }
        }

        echo json_encode($response);
    }
} else if (isset($_FILES['input_archivo']['name'])) {
    $response = array();
    $id_grupo = $_POST['input_id_grupo'];
    $nombre_archivo = $_FILES['input_archivo']['name'];
    $formato_nombre = "Estudiantes_Practicas";
    $extension = strrchr($nombre_archivo, ".");
    $archivo = $formato_nombre . $extension;
    $location = $_SERVER['DOCUMENT_ROOT'] . '/PractiSoft/Documentos/' . $archivo;
    $tipo_archivo = $_FILES['input_archivo']['type'];
    if ($tipo_archivo != "text/plain") {
        $response['title'] = "Solo se permiten archivos de texto plano (TXT)";
        $response['state'] = "warning";
    } else {
        move_uploaded_file($_FILES['input_archivo']['tmp_name'], $location);
        $content = file($location);
        $cantidad_estudiantes_subidos = 0;
        unlink($location);
        $obj_estudiante_model = new EstudianteModel();
        $result = NULL;
        foreach ($content as $correo) {
            $correo_estudiante = str_replace(',', '', $correo);
            $result = stristr($correo_estudiante, '@ufps.edu.co');
            if ($result != false) {
                $correo_sin_espacios = trim($correo_estudiante);
                $rta = $obj_estudiante_model->insertarEstudiante($correo_sin_espacios, $id_grupo);
                if ($rta == 1) {
                    $cantidad_estudiantes_subidos++;

                    try {
                        $head = "<html><h3 style='text-align: center;'><span style='color: #D61117;'><img src='https://ingsistemas.cloud.ufps.edu.co/rsc/img/logo_vertical_ingsistemas_ht180.png' style='border-style: solid'; width='388' height='132' /></span></h3>
                <h1 style='text-align: center;'><span style='color: #D61117;'>PractiSoft - Sistema de Prácticas Empresariales</span></h1>
                <h3 style='text-align: center;'><strong>Mensaje de Registro en el Sistema</strong></h3>
                <p>El sistema PractiSoft de la UFPS le da la bienvenida. A partir de este momento, usted puede ingresar al <a href='https://practisoftufps.online/'>sistema</a>,
                iniciar sesión con su correo institucional, completar sus datos personales e iniciar con su proceso de prácticas empresariales de acuerdo con las indicaciones del docente.</p>";
                        $oMail = new PHPMailer();
                        $oMail->isSMTP();
                        $oMail->Host = "smtp.gmail.com";
                        $oMail->Port = 587;
                        $oMail->SMTPSecure = "tls";
                        $oMail->SMTPAuth = true;
                        $oMail->Username = "practisoftufps@gmail.com";
                        $oMail->Password = "practisoftufps2021@";
                        $oMail->setFrom("practisoftufps@gmail.com");
                        $oMail->addAddress($correo_sin_espacios);
                        $oMail->Subject = "Registro Estudiante - PractiSoft UFPS";
                        $oMail->msgHTML($head);
                        $response['state'] = "success";
                        $response['title'] = "Estudiante agregado correctamente";
                        if (!$oMail->send()) {
                            $response['title'] = $oMail->ErrorInfo;
                            $response['state'] = "error";
                        }
                    } catch (Exception $e) {
                        $response['title'] = $e->getMessage();
                        $response['state'] = "error";
                    }
                }
            }
        }
        if ($cantidad_estudiantes_subidos > 0) {
            $response['title'] = $cantidad_estudiantes_subidos . " estudiante(s) subido(s) correctamente";
            $response['state'] = "success";
        } else {
            $response['title'] = "No se subió ningun estudiante, porfavor revise el documento";
            $response['state'] = "error";
        }
    }
    echo json_encode($response);
}

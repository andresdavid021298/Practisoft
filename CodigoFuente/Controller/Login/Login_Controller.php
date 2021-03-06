<?php

require_once '../../Model/DAO/Estudiante_Model.php';
require_once '../../Model/DAO/Coordinador_Model.php';
require_once '../../Model/DAO/Director_Model.php';
// require_once '../../Model/DAO/Coordinador_Model.php';
// require_once '../../Model/DAO/Director_Model.php';
require_once '../../vendor/autoload.php';

// Configuración de Google
$clientID = '1008530545893-v4b9lpn6kuljnbb88odmebvlsmlha8t5.apps.googleusercontent.com';
$clientSecret = '3O6XV6hgt_cWDzYWFq-XQTQb';
$redirectUri = 'http://localhost/Practisoft/Controller/Login/Login_Controller.php';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // Obtener la información del perfil (Correo y Nombre)
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $name =  $google_account_info->name;
    $image = $google_account_info->picture;

    // Validar la extensión ufps.edu.co
    $extension = strrchr($email, "@");

    if ($extension != "@ufps.edu.co") {
        echo '<script type="text/javascript">alert("Debes ingresar con cuenta institucional");</script>';
        echo '<script type="text/javascript">window.location.href="../../index.php"</script>';
    } else {
        $estudiante = new EstudianteModel();
        $rta_estudiante = $estudiante->verificarExistenciaEstudiante($email);
        if (!is_null($rta_estudiante)) {
            session_start();
            $_SESSION['id_estudiante'] = $rta_estudiante['id_estudiante'];
            $_SESSION['nombre_estudiante'] = $name;
            $_SESSION['url_image'] = $image;
            echo '<script type="text/javascript">window.location.href="../../View/Student/index_student.php"</script>';
        } else {
            $coordinador = new CoordinadorModel();
            $rta_coordinador = $coordinador->buscarCoordinadorPorCorreo($email);
            $director = new DirectorModel();
            $rta_director = $director->buscarDirectorPorCorreo($email);
            if (is_null($rta_coordinador) && is_null($rta_director)) {
                echo '<script type="text/javascript">alert("Usuario no registrado con este correo");</script>';
                echo '<script type="text/javascript">window.location.href="../../index.php"</script>';
            } else {
                if (!is_null($rta_coordinador) && !is_null($rta_director)) {
                    session_start();
                    $ids = array();
                    $rta_coordinador['imagen'] = $image;
                    $rta_director['imagen'] = $image;
                    $ids[] = $rta_coordinador;
                    $ids[] = $rta_director;
                    $_SESSION['ids'] = $ids;
                    echo '<script type="text/javascript">window.location.href="../../View/escoger_rol.php"</script>';
                } else {
                    if (!is_null($rta_coordinador)) {
                        session_start();
                        $_SESSION['id_coordinador'] = $rta_coordinador['id_coordinador'];
                        $_SESSION['nombre_coordinador'] = $rta_coordinador['nombre_coordinador'];
                        $_SESSION['url_image'] = $image;
                        echo '<script type="text/javascript">window.location.href="../../View/Coordinator/index_coordinator.php"</script>';
                    }
                    if (!is_null($rta_director)) {
                        session_start();
                        $_SESSION['id_director'] = $rta_director['id_director'];
                        $_SESSION['nombre_director'] = $rta_director['nombre_director'];
                        $_SESSION['url_image'] = $image;
                        echo '<script type="text/javascript">window.location.href="../../View/Director/index_director.php"</script>';
                    }
                }
            }
        }
    }
}
if (isset($_POST['accion'])) {
    if ($_POST['accion'] == "escoger_rol") {
        $rol = $_POST['rol'];
        if ($rol == "director") {
            $response = array();
            session_start();
            session_destroy();
            $nombre_director = $_POST['nombre'];
            $id_director = $_POST['id'];
            $imagen_director = $_POST['imagen'];
            session_start();
            $_SESSION['id_director'] = $id_director;
            $_SESSION['nombre_director'] = $nombre_director;
            $_SESSION['url_image'] = $imagen_director;
            $response['state'] = "success";
            $response['title'] = "El rol escogido es director";
            $response['view'] = "Director/index_director.php";
            echo json_encode($response);
        } else if ($rol == "coordinador") {
            $response = array();
            session_start();
            session_destroy();
            $nombre_coordinador = $_POST['nombre'];
            $id_coordinador = $_POST['id'];
            $imagen_coordinador = $_POST['imagen'];
            session_start();
            $_SESSION['id_coordinador'] = $id_coordinador;
            $_SESSION['nombre_coordinador'] = $nombre_coordinador;
            $_SESSION['url_image'] = $imagen_coordinador;
            $response['state'] = "success";
            $response['title'] = "El rol escogido es coordinador";
            $response['view'] = "Coordinator/index_coordinator.php";
            echo json_encode($response);
        }
    }
}

<?php

require_once '../../Model/DAO/Estudiante_Model.php';
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

    // Validar la extensión ufps.edu.co
    $extension = strrchr($email, "@");

    if ($extension != "@ufps.edu.co") {
        echo '<script type="text/javascript">alert("Debes ingresar con cuenta institucional");</script>';
        echo '<script type="text/javascript">window.location.href="../../index.php"</script>';
    } else {
        $estudiante = new EstudianteModel();
        $rta = $estudiante->verificarExistenciaEstudiante($email);
        if ($rta == NULL) {
            echo '<script type="text/javascript">alert("Usuario no registrado con este correo");</script>';
            echo '<script type="text/javascript">window.location.href="../../index.php"</script>';
        } else {
            session_start();
            $_SESSION['id_estudiante'] = $rta['id_estudiante'];
            $_SESSION['nombre_estudiante'] = $rta['nombre_estudiante'];
            echo '<script type="text/javascript">window.location.href="../../View/Student/index_student.php"</script>';
        }
    }
}

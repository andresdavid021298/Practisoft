<?php
require_once '../../Controller/Restablecimiento_Clave/Restablecimiento_Clave_Controller.php';
$restablecimientoClave = buscarSolicitudRestablecimientoClave($_GET['id_empresa'], $_GET['token']);
if ($restablecimientoClave == NULL) {
    header("Location: ../../index.php");
}
if ($_GET['id_empresa'] == NULL || $_GET['token'] == NULL) {
    header("Location: ../../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Clave</title>
    <link rel="shortcut icon" href="../../Img/favicon_ingsistemas.ico">
    <link rel="stylesheet" href="../../css/style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../../node_modules/sweetalert2/dist/sweetalert2.min.css">
</head>

<body>
    <!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-xl-10 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body">
                        <center><img src="../../Img/logo_ingsistemas.png" width="300px" height="110px"></center>
                        <h5 class="text-center" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;"><strong>PRACTISOFT</strong></h5>
                        <form class="form-signin" method="POST" enctype="multipart/form-data">
                            <p style="text-align: center;"><em>Ingresa la nueva clave para el reestablecimiento de tu contraseña.</em></p>
                            <div class="form-label-group" onkeyup="validarClavesEnPerfil();">
                                <input type="password" id="inputClave1" name="inputClave1" class="form-control" placeholder="Nueva clave" required>
                                <label for="inputClave1">Nueva clave</label>
                            </div>
                            <div class="form-label-group" onkeyup="validarClavesEnPerfil();">
                                <input type="password" id="inputClave2" name="inputClave2" class="form-control" placeholder="Nueva clave" required>
                                <label for="inputClave2">Nueva clave</label>
                            </div>
                            <hr>
                            <button onclick="restablecerClave();" class="btn btn-lg btn-block text-uppercase" style="background-color: #D61117; color: white;" id="btn_cambiar_clave" type="button" name="btn_registrar_empresa">Restablecer</button>
                            <br>
                            <div class="row" style="text-align: center;">
                                <div class="col-12">
                                    <a class="text-center mt-2 medium" href="../../index.php">Iniciar Sesion</a>
                                </div>
                            </div>
                            <input id="id_empresa" type="hidden" name="id_empresa" value="<?php echo $_GET['id_empresa']; ?>">
                            <input id="token" type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
                        </form>
                        <hr class="my-4 ">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="../../js/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../../js/eventos.js"></script>
<script src="../../js/Company/alertas_empresa.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
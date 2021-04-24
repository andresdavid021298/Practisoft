<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="shortcut icon" href="Img/favicon_ingsistemas.ico">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body">
                        <center><img src="Img/logo_ingsistemas.png" width="350px" height="120px"></center>
                        <h5 class="text-center" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;"><strong>PRACTISOFT</strong></h5>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="email" id="inputEmail" class="form-control" placeholder="Correo Electronico" required autofocus>
                                <label for="inputEmail">Correo Electronico</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
                                <label for="inputPassword">Contraseña</label>
                            </div>
                            <button class="btn btn-l btn-block text-uppercase" style="background-color: #D61117; color: white;" type="button" onclick="alertaLogin()">Iniciar Sesion</button>
                            <br>
                            <div class="row">
                                <div class="col-sm">
                                    <a class="text-center mt-2 medium" href="View/Registro_Empresa.html">Registro de empresas</a>
                                </div>
                                <div class="col-sm">
                                    <a class="text-center mt-2 medium" href="View/Recuperar_clave.html">¿Olvidaste la contraseña?</a>
                                </div>
                            </div>
                            <hr class="my-4">
                            <button class="btn btn-google btn-block text-uppercase" type="submit" style="border: 2px solid #D61117"><i class="fab fa-google mr-2"></i>Inicia Sesion con tu cuenta universitaria</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/alertas_empresa.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
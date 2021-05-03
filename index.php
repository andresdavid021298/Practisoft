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
                                    <a class="text-center mt-2 medium" href="View/Company/Registro_Empresa.html">Registro de empresas</a>
                                </div>
                                <div class="col-sm">
                                    <a class="text-center mt-2 medium" href="View/Company/Recuperar_clave.html">¿Olvidaste la contraseña?</a>
                                </div>
                            </div>
                            <hr class="my-4">
                            <?php
                            require_once 'vendor/autoload.php';

                            // CONFIGURACION DE GOOGLE
                            $clientID = '1008530545893-v4b9lpn6kuljnbb88odmebvlsmlha8t5.apps.googleusercontent.com';
                            $clientSecret = '3O6XV6hgt_cWDzYWFq-XQTQb';
                            $redirectUri = 'http://localhost/Practisoft/Controller/Login/Login_Controller.php';

                            $client = new Google_Client();
                            $client->setClientId($clientID);
                            $client->setClientSecret($clientSecret);
                            $client->setRedirectUri($redirectUri);
                            $client->addScope("email");
                            $client->addScope("profile");

                            ?>
                            <center>
                                <a class="btn btn-outline-dark" href="<?php echo $client->createAuthUrl() ?>" role="button" style="text-transform:none">
                                    <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                                    Login with Google
                                </a>
                            </center>
                            <!-- <?php
                            if (isset($_GET['code'])) {
                                $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
                                $client->setAccessToken($token['access_token']);

                                // get profile info
                                $google_oauth = new Google_Service_Oauth2($client);
                                $google_account_info = $google_oauth->userinfo->get();
                                $email =  $google_account_info->email;
                                $name =  $google_account_info->name;

                                // Estos datos son los que obtenemos....	
                                echo $email . '<br>';
                                echo $name;
                            }
                            ?> -->
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
<script src="js/Company/alertas_empresa.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
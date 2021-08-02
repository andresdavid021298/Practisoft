<?php
session_start();
if ($_SESSION['ids'] == NULL) {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elección de Rol</title>
    <link rel="shortcut icon" href="../Img/favicon_ingsistemas.ico">
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
</head>

<body>
    <!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-xl-10 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body">
                        <center><img src="../Img/logo_ingsistemas.png" width="100%" height="180px"></center>
                        <h5 class="text-center" style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
                            <strong>PRACTISOFT</strong>
                        </h5>
                        <form class="form-signin" method="POST" enctype="multipart/form-data">
                            <br>
                            Escoja el rol con el que desea ingresar al sistema</h6>
                            <div class="form-group">
                                <select name="select_rol" id="select_rol" class="form-control">
                                    <option value="coordinador - <?php echo $_SESSION["ids"][0]['id_coordinador'] ?> - <?php echo $_SESSION["ids"][0]['nombre_coordinador'] ?> - <?php echo $_SESSION["ids"][0]['imagen'] ?>">Coordinador</option>
                                    <option value="director - <?php echo $_SESSION["ids"][1]['id_director'] ?> - <?php echo $_SESSION["ids"][1]['nombre_director'] ?> - <?php echo $_SESSION["ids"][1]['imagen'] ?>">Director</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <center>
                                    <button type="button" class="btn btn-primary" onclick="escogerRol()">Ingresar</button>
                                </center>
                            </div>
                        </form>
                        <hr class="my-4 ">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="../js/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/eventos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
<?php
session_start();
if ($_SESSION['id_estudiante'] == NULL) {

    header("Location: ../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PractiSoft</title>
    <link rel="shortcut icon" href="../../Img/favicon_ingsistemas.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div>
        <img src="../../Img/imagen_header.png" alt="Cargando Imagen..." width="100%" height="200px">
    </div>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion" style="background-color: #D61117;" id="accordionSidebar">

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" style="text-align: center;" href="index_student.php">
                    <span style="font-size: 20px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">INICIO</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGestionPracticantes" aria-expanded="true" aria-controls="collapseGestionPracticantes">
                    <i class="fas fa-users-cog"></i>
                    <span id="titulosSideBar">Mi Práctica</span>
                </a>
                <div id="collapseGestionPracticantes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="encuesta_inscripcion.php"> <i class="fas fa-file-alt"></i> Inscripción</a>
                        <a class="collapse-item" href="ver_empresa.php"><i class="fas fa-building"></i> Ver Empresa</a>
                        <a class="collapse-item" href="documento_carta_compromisoria.php"><i class="fas fa-file-signature"></i> C. Compromisoria</a>
                        <a class="collapse-item" href="plan_de_trabajo.php"><i class="fas fa-book"></i> Plan de Trabajo </a>
                        <a class="collapse-item" href="actividades_plan_trabajo.php"><i class="fas fa-tasks"></i> Mis Actividades </a>
                        <a class="collapse-item" href="documento_informe_avance.php"><i class="fas fa-clone"></i> Informe de Avance </a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-user-circle"></i>
                    <span id="titulosSideBar">Mi Perfil</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="perfil.php"><i class="fas fa-edit"></i> Ver Perfil</a>
                    </div>
                </div>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: #9D9C9C;">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i id="faBars" class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="imgRedonda" src="<?php echo $_SESSION['url_image'] ?>" alt="Imagen de Perfil">
                                <div>
                                    <span id="nombreUsuario">
                                        <b><?php echo $_SESSION['nombre_estudiante'] ?></b>
                                    </span>
                                </div>
                                <i class="fas fa-power-off" style="color: white;"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../../index.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <div class="container-fluid">
                    <center>
                        <h2>Mi Perfil</h2>
                    </center>
                    <br>
                    <?php

                    require_once "../../Controller/Estudiante/Estudiante_Controller.php";
                    $datos_estudiante = buscarEstudiante($_SESSION['id_estudiante']);
                    ?>
                    <form method="POST" action="../../Controller/Empresa/Empresa_Controller.php">
                        <div class="container">
                            <div class="row" style="justify-content: center;">
                                <div class="form-group">
                                    <center><label for="input_nombre">Nombre</label></center>
                                    <input type="text" class="form-control" id="input_nombre" disabled value="<?php echo $_SESSION['nombre_estudiante']; ?>">
                                </div>
                            </div>
                            <br><br>
                            <div class="row" style="justify-content: center;">
                                <div class="form-group mx-sm-3 mb-2">
                                    <center><label for="input_correo">Correo</label></center>
                                    <input type="email" class="form-control" id="input_correo" value="<?php echo $datos_estudiante['correo_estudiante']; ?>" disabled>
                                </div>
                            </div>
                            <br><br>
                            <div class="row" style="justify-content: center;">
                                <div class="form-group mx-sm-3 mb-2">
                                    <center><label for="input_codigo">Codigo</label>
                                        <input type="text" class="form-control" id="input_codigo" value="<?php echo $datos_estudiante['codigo_estudiante']; ?>" placeholder="Digite su codigo">
                                </div>
                            </div>
                            <br><br>
                            <div class="row" style="justify-content: center;">
                                <div class="form-group mx-sm-3 mb-2">
                                    <center><label for="input_celular">Numero de Telefono Movil</label></center>
                                    <input type="text" class="form-control" id="input_celular" value="<?php echo $datos_estudiante['celular_estudiante']; ?>" placeholder="Digite su celular">
                                </div>
                            </div>
                            <br><br>
                            <input type="hidden" id="input_id_estudiante" name="input_id_estudiante" value="<?php echo $_SESSION['id_estudiante']; ?>">
                            <div class="col text-center">
                                <button onclick="actualizarPerfil();" id="btn_editar_perfil" type="button" name="btn_editar_perfil" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Footer -->
            <footer>
                <div class="ufps-footer">
                    <h3>Universidad Francisco de Paula Santander</h3>
                    <p>Programa Ingeniería de Sistemas</p>
                    <p>PractiSoft 2021</p>
                    <p>Desarrollado por: Andres Ariza(adac021298@gmail.com) - Diego Navas(dieg9928.dn@gmail.com) - Jorge Mojica(jorgemojica32@gmail.com)</p>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>

    </div>

</body>
<script src="../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="../../js/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../../js/sb-admin-2.min.js"></script>
<script src="../../js/Student/alertas_estudiante.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
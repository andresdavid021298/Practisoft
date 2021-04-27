<?php
session_start();
if ($_SESSION['id_empresa'] == NULL) {

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
        <img src="../../Img/prueba1.jpg" alt="Cargando Imagen..." width="100%" height="200px">
    </div>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion" style="background-color: #D61117;" id="accordionSidebar">

            <!-- Sidebar - Brand -->

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" style="text-align: center;" href="#">
                    <span style="font-size: 20px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">MENU</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGestionPracticantes" aria-expanded="true" aria-controls="collapseGestionPracticantes">
                    <i class="fas fa-users-cog"></i>
                    <span>Gestion de Practicantes</span>
                </a>
                <div id="collapseGestionPracticantes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="solicitud_practicante.php"><i class="fas fa-plus"></i> Solicitud de Practicantes</a>
                        <a class="collapse-item" href="ver_practicantes.php"><i class="fas fa-user"></i> Ver Practicantes</a>
                        <a class="collapse-item" href="ver_actividades.php"><i class="fas fa-check-circle"></i> Ver Actividades</a>
                        <a class="collapse-item" href="encuesta_satisfaccion.php"><i class="fas fa-star-half-alt"></i> Encuesta de Satisfaccion</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-user-circle"></i>
                    <span>Perfil de Empresa</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="actualizar_perfil.php"><i class="fas fa-edit"></i> Actualizar Perfil</a>
                        <a class="collapse-item" href="cambiar_clave.php"><i class="fas fa-unlock"></i> Cambiar Clave</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Documentos -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDocumentos" aria-expanded="true" aria-controls="collapseDocumentos">
                    <i class="fas fa-print"></i>
                    <span>Documentos</span>
                </a>
                <div id="collapseDocumentos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="#"><i class="fas fa-file-alt"></i> Convenio</a>
                        <a class="collapse-item" href="#"><i class="fas fa-biohazard"></i> Protocolos Bioseguridad</a>
                        <a class="collapse-item" href="#"><i class="fas fa-file-contract"></i> Certificado de Existencia</a>
                        <a class="collapse-item" href="#"><i class="fas fa-id-card"></i> C.C Representante</a>
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
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span style="color: white;" class="mr-2 d-none d-lg-inline text-white-600 small"><b><?php echo $_SESSION['nombre_empresa'] ?></b></span>
                                <!-- <img class="img-profile rounded-circle" src="../../Img/arrow_icon.png"> -->
                                <img src="../../Img/arrow_icon.png" style="width: 20px; height: 20px;;" alt="Cargando Imagen..." width="100%" height="200px">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../../index.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Cerrar Sesion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <center>
                    <h2>Mi Perfil</h2>
                </center>
                <br>
                <?php
                require_once '../../Controller/Empresa/Empresa_Controller.php';
                $id_empresa = $_SESSION['id_empresa'];
                $datos_empresa = mostrarDatos($id_empresa);
                foreach ($datos_empresa as $datos) {
                ?>
                    <form method="POST" action="../../Controller/Empresa/Empresa_Controller.php" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Empresa</span>
                                        </div>
                                        <input value="<?php echo $datos['nombre_empresa']; ?>" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">NIT</span>
                                        </div>
                                        <input value="<?php echo $datos['nit_empresa']; ?>" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Sector</span>
                                        </div>
                                        <input id="inputSector" name="input_sector" value="<?php echo $datos['sector_empresa']; ?>" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Actividad</span>
                                        </div>
                                        <input name="input_actividad" value="<?php echo $datos['actividad_empresa']; ?>" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" readonly>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Correo</span>
                                        </div>
                                        <input id="inputCorreo" name="input_correo" value="<?php echo $datos['correo_empresa']; ?>" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Representante Legal</span>
                                        </div>
                                        <input id="inputRepresentante" name="input_representante_legal" value="<?php echo $datos['representante_legal']; ?>" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Dirección</span>
                                        </div>
                                        <input id="inputDireccion" name="input_direccion" value="<?php echo $datos['direccion_empresa']; ?>" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Ubicación</span>
                                        </div>
                                        <select id="select_municipio" class="form-control">
                                            <option value="<?php echo $datos['municipio_empresa']; ?>"><?php echo $datos['municipio_empresa']; ?></option>
                                            <option value="Cucuta">Cúcuta</option>
                                            <option value="Villa del Rosario">Villa del Rosario</option>
                                            <option value="Los Patios">Los Patios</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Tutor</span>
                                        </div>
                                        <input id="inputTutor" name="input_tutor" value="<?php echo $datos['tutor']; ?>" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Contacto</span>
                                        </div>
                                        <input id="inputContacto" name="input_celular" value="<?php echo $datos['celular_empresa']; ?>" type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <input type="hidden" id="id_empresa" name="id_empresa" value="<?php echo $id_empresa; ?>">
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="button" onclick="actualizarDatos()" name="btn_editar_perfil" class="btn btn-primary">Editar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php
                }
                ?>
            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer>
                <div class="ufps-footer">
                    <h3>Universidad Francisco de Paula Santander</h3>
                    <p>Programa Ingeniería de Sistemas</p>
                    <p>PractiSoft 2021</p>
                </div>
            </footer>
            <!-- End of Footer -->
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
<script src="../../js/sb-admin-2.min.js"></script>

</html>
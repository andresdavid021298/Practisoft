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

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" style="text-align: center;" href="#">
                    <span style="font-size: 20px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">MENU</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

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

                <div class="container-fluid">


                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <h1 class="h3 mb-0 text-gray-800">Solicitud de Practicantes</h1>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Agregar Nueva Solicitud</button>
                            </div>
                        </div>
                    </div>

                    <!--Modal-->


                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Solicitud de Practicantes</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="../../Controller/Solicitud/Solicitud_Controller.php" method="POST">
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Número de Practicantes:</label>
                                            <input type="text" class="form-control" name="numPracticantes" id="practicantes">
                                        </div>

                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Area Requerida:</label>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <!-- Default checked -->
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="areas[]" value="Mantenimiento de Hardware/Software" class="custom-control-input" id="check1">
                                                        <label class="custom-control-label" for="check1">Mantenimiento de Hardware / Software</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <!-- Default checked -->
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="areas[]" value="Capacitacion" class="custom-control-input" id="check2">
                                                        <label class="custom-control-label" for="check2">Capacitacion</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <!-- Default checked -->
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="areas[]" value="Desarrollo de Software" class="custom-control-input" id="check3">
                                                        <label class="custom-control-label" for="check3">Desarrollo de Software</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <!-- Default checked -->
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="areas[]" value="Servidores y Computacion en la nube" class="custom-control-input" id="check4">
                                                        <label class="custom-control-label" for="check4">Servidores y Computación en la Nube</label>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <!-- Default checked -->
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="areas[]" value="Mantenimiento y Administracion de Redes" class="custom-control-input" id="check5">
                                                        <label class="custom-control-label" for="check5">Mantenimiento y Administración de Redes</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <input type="hidden" name="id_empresa" id="id_empresa" value="<?php echo $_SESSION['id_empresa'] ?>">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col text-center">
                                                    <button type="button" onclick="agregarSolicitud()" class="btn btn-primary">Solicitar</button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Modal-->

                    <!-- Data Table -->


                    <table id="example" class="table table-striped table-bordered" style="width:100%">

                        <thead>
                            <tr>
                                <th>Numero de Practicantes</th>
                                <th>Area</th>
                                <th>Observaciones</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once '../../Controller/Solicitud/Solicitud_Controller.php';
                            $id_empresa = $_SESSION['id_empresa'];
                            $datos_solicitud = mostrarInformacion($id_empresa);
                            if (is_null($datos_solicitud)) {
                            ?>
                                <td colspan="4" style="color: #D61117;">
                                    <center><strong>NO POSEE SOLICITUDES DE PRACTICANTES EN EL SISTEMA</strong></center>
                                </td>
                                <?php
                            } else {

                                foreach ($datos_solicitud as $datos) {
                                ?>
                                    <tr>
                                        <td><?php echo $datos['numero_practicantes'] ?></td>
                                        <td><?php echo $datos['funciones'] ?></td>
                                        <td><?php echo $datos['observaciones_solicitud'] ?></td>
                                        <td><?php echo $datos['estado_solicitud'] ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Numero de Practicantes</th>
                                <th>Area</th>
                                <th>Observaciones</th>
                                <th>Estado</th>
                            </tr>
                        </tfoot>
                    </table>



                </div>

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
<script src="../../js/sb-admin-2.min.js"></script>
<script src="../../js/eventos.js"></script>
<script src="../../js/Company/alertas_empresa.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

</html>
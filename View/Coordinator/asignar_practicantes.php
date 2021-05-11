<?php
session_start();
if ($_SESSION['id_coordinador'] == NULL) {
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
                <a class="nav-link" style="text-align: center;" href="index_coordinator.php">
                    <span style="font-size: 20px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">MENU</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGestionPracticantes" aria-expanded="true" aria-controls="collapseGestionPracticantes">
                    <!-- <i class="fas fa-users-cog"></i> -->
                    <span>Gestion Practica</span>
                </a>
                <div id="collapseGestionPracticantes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="revision_solicitudes.php"><i class="fas fa-plus"></i> Revision de Solicitudes</a>
                        <a class="collapse-item" href="ver_practicantes.php"><i class="fas fa-users"></i> Ver Estudiantes</a>
                        <a class="collapse-item" href="asignar_practicantes.php"><i class="fas fa-user"></i> Asignar Estudiante</a>
                        <a class="collapse-item" href="ver_documentacion.php"><i class="fas fa-book"></i> Ver Documentacion</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <span>Empresas</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="ver_empresas.php"><i class="fas fa-building"></i> Ver Empresas</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Documentos -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDocumentos" aria-expanded="true" aria-controls="collapseDocumentos">
                    <span>Perfil</span>
                </a>
                <div id="collapseDocumentos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="perfil.php"><i class="fas fa-edit"></i></i> Mi Perfil</a>
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
                                <span style="color: white;" class="mr-2 d-none d-lg-inline text-white-600 small"><b><?php echo $_SESSION['nombre_coordinador'] ?></b></span>
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
                    <h2>Asignar Practicantes</h2>
                </center>
                <?php
                require_once "../../Controller/Estudiante/Estudiante_Controller.php";
                $lista_estudiantes = listarEstudiantes();
                if (is_null($lista_estudiantes)) {
                ?>
                    <h2 style="color: #D61117; text-align: center;">No hay estudiantes registrados en el semestre actual</h2>
                <?php
                } else {
                ?>
                    <div class="table-responsive">
                        <div class="container-fluid">
                            <table id="example" class="table table-striped table-bordered" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Nombre</center>
                                        </th>
                                        <th>
                                            <center>Area de Desarrollo de Software</center>
                                        </th>
                                        <th>
                                            <center>Area de Redes</center>
                                        </th>
                                        <th>
                                            <center>Area de Mantenimiento</center>
                                        </th>
                                        <th>
                                            <center>Area de Capacitacion</center>
                                        </th>
                                        <th>
                                            <center>Area de Servidores y Computacion en la Nube</center>
                                        </th>
                                        <th>
                                            <center>Opciones</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($lista_estudiantes as $estudiante) {
                                        if (is_null($estudiante['nombre_empresa'])) {
                                    ?><tr>
                                                <td>
                                                    <center><?php echo $estudiante['nombre_estudiante']; ?></center>
                                                </td>
                                                <?php
                                                require_once "../../Controller/Encuesta_Areas/Encuesta_Areas_Controller.php";
                                                $encuesta_estudiante = detallarEncuestaPorEstudiante($estudiante['id_estudiante']);
                                                if (is_null($encuesta_estudiante)) {
                                                ?>
                                                    <td colspan="6" style="color: #D61117;">
                                                        <center>NO PRESENTA ENCUESTA DE INSCRIPCION</center>
                                                    </td>
                                                <?php
                                                } else {
                                                ?>
                                                    <td>
                                                        <center><?php echo $encuesta_estudiante['area_desarrollo']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $encuesta_estudiante['area_redes']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $encuesta_estudiante['area_mantenimiento']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $encuesta_estudiante['area_capacitacion']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $encuesta_estudiante['area_servidores']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><a class="btn btn-primary" href="asignar_practicantes_con_empresa.php?id_estudiante=<?php echo $estudiante['id_estudiante']; ?>">Asignar</a></center>
                                                    </td>
                                            </tr>
                                <?php }
                                            }
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } ?>
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
                </div>
            </footer>
            <!-- End of Footer -->
        </div>

    </div>

</body>
<script src="../../js/jquery-3.6.0.min.js"></script>
<script src="../../js/sb-admin-2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

</html>
<?php
session_start();
if ($_SESSION['id_coordinador'] == NULL) {
    header("Location: ../../index.php");
} else if ($_GET['id_estudiante'] == NULL) {
    header("Location: asignar_practicantes.php");
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
                <a class="nav-link" style="text-align: center;" href="index_coordinator.php">
                    <span style="font-size: 20px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">INICIO</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGestionPracticantes" aria-expanded="true" aria-controls="collapseGestionPracticantes">
                    <i class="fas fa-users-cog"></i>
                    <span id="titulosSideBar">Gestión de Práctica</span>
                </a>
                <div id="collapseGestionPracticantes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="revision_solicitudes.php"><i class="fas fa-plus"></i> Revisión de Solicitudes</a>
                        <a class="collapse-item" href="grupos_coordinador.php"><i class="fas fa-users"></i> Mis Grupos</a>
                        <a class="collapse-item" href="grupos_coordinador_asignacion.php"><i class="fas fa-user"></i> Asignar Estudiantes</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-building"></i>
                    <span id="titulosSideBar">Empresas</span>
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
                    <i class="fas fa-user-circle"></i>
                    <span id="titulosSideBar">Mi Perfil</span>
                </a>
                <div id="collapseDocumentos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="perfil.php"><i class="fas fa-edit"></i></i> Ver Perfil</a>
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span style="color: white; font-size: 20px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;" class="mr-2 d-none d-lg-inline text-white-600 small"><b><?php echo $_SESSION['nombre_coordinador'] ?></b></span>
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
                <div style="padding-left: 10px;">
                    <a class="btn btn-primary" href="asignar_practicantes.php?id_grupo=<?php echo $_GET['id_grupo'] ?>"> <i class="fas fa-arrow-circle-left"></i> Volver</a>
                </div>
                <center>
                    <h2>Asignar Practicante</h2>
                </center>
                <?php
                require_once "../../Controller/Estudiante/Estudiante_Controller.php";
                $estudiante = buscarEstudiante($_GET['id_estudiante']);
                if (is_null($estudiante)) {
                ?>
                    <h2 style="color: #D61117; text-align: center;">Estudiante no registrado en el sistema</h2>
                    <?php
                } else {
                    require_once "../../Controller/Encuesta_Areas/Encuesta_Areas_Controller.php";
                    $buscar_encuesta = detallarEncuestaPorEstudiante($_GET['id_estudiante']);
                    if (is_null($buscar_encuesta)) {
                    ?>
                        <h2 style="color: #D61117; text-align: center;">No presenta encuesta de inscripción</h2>
                    <?php
                    } else {
                    ?>
                        <div class="container-fluid">
                            <div class="row">
                                <h5><strong>Estudiante: </strong><?php echo $estudiante['nombre_estudiante'] ?></h5>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalEncuesta"><i class="fas fa-eye"></i></button>
                            </div>
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%;">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>Nombre Empresa</center>
                                            </th>
                                            <th>
                                                <center>Número de Practicantes</center>
                                            </th>
                                            <th>
                                                <center>Áreas</center>
                                            </th>
                                            <th>
                                                <center>Opciones</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        require_once "../../Controller/Solicitud/Solicitud_Controller.php";
                                        $solicitudes_aprobadas = listaSolicitudEmpresasAprobadas();
                                        if (is_null($solicitudes_aprobadas)) {
                                        ?>
                                            <tr>
                                                <td colspan="4" style="color: #D61117; text-align: center;">El sistema no cuenta con solicitudes aprobadas</td>
                                            </tr>
                                            <?php
                                        } else {
                                            foreach ($solicitudes_aprobadas as $solicitud) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <center><?php echo $solicitud['nombre_empresa']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $solicitud['numero_practicantes']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $solicitud['funciones']; ?></center>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" id="id_grupo" value="<?php echo $_GET['id_grupo'] ?>">
                                                        <center><button class="btn btn-primary" onclick="vincularEstudianteConEmpresa(<?php echo $_GET['id_estudiante']; ?>,
                                                        <?php echo $solicitud['id_empresa']; ?>, <?php echo $solicitud['id_solicitud']; ?>)">Vincular</button></center>
                                                    </td>
                                                </tr>
                                        <?php }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>

            <!-- Modal para ver la encuesta de areas -->
            <div class="modal fade" id="modalEncuesta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#D61117;">
                            <h5 class="modal-title" id="exampleModalLabel" style="color: white;"><?php echo $estudiante['nombre_estudiante']; ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php
                            require_once "../../Controller/Encuesta_Areas/Encuesta_Areas_Controller.php";
                            $buscar_encuesta = detallarEncuestaPorEstudiante($_GET['id_estudiante']);
                            ?>
                            <div class="form-group row">
                                <label class="col-sm-9 col-form-label">Área de Desarrollo de Software: </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" value="<?php echo $buscar_encuesta['area_desarrollo']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-9 col-form-label">Área de Administración de Redes:</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" value="<?php echo $buscar_encuesta['area_redes']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-9 col-form-label">Área de Mantenimiento de Hardware/Software: </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" value="<?php echo $buscar_encuesta['area_mantenimiento']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-9 col-form-label">Área de Capacitación: </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" value="<?php echo $buscar_encuesta['area_capacitacion']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-9 col-form-label">Área de Servidores y Computación en la Nube: </label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" value="<?php echo $buscar_encuesta['area_servidores']; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Otro: </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?php echo $buscar_encuesta['otro']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../../js/jquery-3.6.0.min.js"></script>
<script src="../../js/sb-admin-2.min.js"></script>
<script src="../../js/Coordinator/alertas_coordinador.js"></script>
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
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
                <a class="nav-link" style="text-align: center;" href="#">
                    <span style="font-size: 20px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">INICIO</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGestionPracticantes" aria-expanded="true" aria-controls="collapseGestionPracticantes">
                    <i class="fas fa-users-cog"></i>
                    <span id="titulosSideBar">Gestion de Practicantes</span>
                </a>
                <div id="collapseGestionPracticantes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="solicitud_practicante.php"><i class="fas fa-plus"></i> Solicitud de Practicantes</a>
                        <a class="collapse-item" href="ver_practicantes.php"><i class="fas fa-user"></i> Ver Practicantes</a>
                        <a class="collapse-item" href="ver_actividades.php"><i class="fas fa-check-circle"></i> Ver Actividades</a>
                        <a class="collapse-item" href="ver_estudiantes_plan_trabajo.php"><i class="fas fa-book"></i> Plan de Trabajo </a>
                        <a class="collapse-item" href="encuesta_satisfaccion.php"><i class="fas fa-star-half-alt"></i> Encuesta de Satisfacción</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-user-circle"></i>
                    <span id="titulosSideBar">Perfil de Empresa</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="actualizar_perfil.php"><i class="fas fa-edit"></i> Actualizar Perfil</a>
                        <a class="collapse-item" href="cambiar_clave.php"><i class="fas fa-unlock"></i> Cambiar Clave</a>
                        <a class="collapse-item" href="ver_tutores.php"><i class="fas fa-user-shield"></i> Ver Tutores</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Documentos -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDocumentos" aria-expanded="true" aria-controls="collapseDocumentos">
                    <i class="fas fa-print"></i>
                    <span id="titulosSideBar">Documentos</span>
                </a>
                <div id="collapseDocumentos" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="documento_convenio.php"><i class="fas fa-file-alt"></i> Convenio</a>
                        <a class="collapse-item" href="documento_protocolos.php"><i class="fas fa-biohazard"></i> Protocolos Bioseguridad</a>
                        <a class="collapse-item" href="documento_certificado.php"><i class="fas fa-file-contract"></i> Certificado de Existencia</a>
                        <a class="collapse-item" href="documento_representante.php"><i class="fas fa-id-card"></i> C.C Representante</a></a>
                        <a class="collapse-item" href="documento_rut.php"><i class="fas fa-file-invoice"></i> RUT</a>
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
                        <i id="faBars" id="faBars" class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div>
                                    <span id="nombreUsuarioCompany">
                                        <b><?php echo $_SESSION['nombre_empresa'] ?></b>
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
                        <h2>Bienvenido <strong><?php echo $_SESSION['nombre_empresa']; ?></strong></h2>
                    </center>
                    <br>
                    <br>
                    <div class="row">

                        <?php
                        require_once '../../Controller/Estudiante/Estudiante_Controller.php';
                        $cantidad_estudiantes = cantidadDeEstudiantesPorEmpresa($_SESSION['id_empresa']);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4 zoom">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Practicantes Asignados</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cantidad_estudiantes ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        require_once '../../Controller/Solicitud/Solicitud_Controller.php';
                        $cantidad_solicitudes_aprobadas = cantidadSolicitudesAprobadas($_SESSION['id_empresa']);
                        if ($cantidad_solicitudes_aprobadas > 0) {
                        ?>
                            <div class="col-xl-3 col-md-6 mb-4 zoom">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Solicitudes Aprobadas</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cantidad_solicitudes_aprobadas ?></div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <?php
                        require_once '../../Controller/Solicitud/Solicitud_Controller.php';
                        $cantidad_solicitudes_en_espera = cantidadSolicitudesEnEspera($_SESSION['id_empresa']);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4 zoom">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Solicitudes en Espera</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cantidad_solicitudes_en_espera; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-pause-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        require_once "../../Controller/Convenio/Convenio_Controller.php";
                        require_once "../../Controller/DocumentosEmpresa/Documentos_Empresa_Controller.php";
                        $datos_convenio = mostrarConvenio($_SESSION['id_empresa']);
                        $documentos_empresa = listarDocumentosPorEmpresa($_SESSION['id_empresa']);
                        if (is_null($documentos_empresa) && is_null($datos_convenio)) {
                        ?>
                            <div class="col-xl-3 col-md-6 mb-4 zoom">
                                <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    Documentos
                                                </div>
                                                <div class="mb-0 font-weight-bold text-gray-800">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkConvenio" disabled>
                                                        <label class="form-check-label" for="checkConvenio">
                                                            Convenio
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkConvenio" disabled>
                                                        <label class="form-check-label" for="checkConvenio">
                                                            Protocolos Bio
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkConvenio" disabled>
                                                        <label class="form-check-label" for="checkConvenio">
                                                            Cert. Existencia
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkConvenio" disabled>
                                                        <label class="form-check-label" for="checkConvenio">
                                                            CC Representante
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkConvenio" disabled>
                                                        <label class="form-check-label" for="checkConvenio">
                                                            RUT
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else if (!is_null($documentos_empresa) && !in_array(NULL, $documentos_empresa) && !is_null($datos_convenio)) { ?>
                            <div class="col-xl-3 col-md-6 mb-4 zoom">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                    Documentos
                                                </div>
                                                <div class="mb-0 font-weight-bold text-gray-800">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkConvenio" checked disabled>
                                                        <label class="form-check-label" for="checkConvenio">
                                                            Convenio
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkConvenio" checked disabled>
                                                        <label class="form-check-label" for="checkConvenio">
                                                            Protocolos Bio
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkConvenio" checked disabled>
                                                        <label class="form-check-label" for="checkConvenio">
                                                            Cert. Existencia
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkConvenio" checked disabled>
                                                        <label class="form-check-label" for="checkConvenio">
                                                            CC Representante
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkConvenio" checked disabled>
                                                        <label class="form-check-label" for="checkConvenio">
                                                            RUT
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="col-xl-3 col-md-6 mb-4 zoom">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                    Documentos
                                                </div>
                                                <div class="mb-0 font-weight-bold text-gray-800">
                                                    <?php
                                                    if (is_null($datos_convenio)) {
                                                    ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="checkConvenio" disabled>
                                                            <label class="form-check-label" for="checkConvenio">
                                                                Convenio
                                                            </label>
                                                        </div>

                                                    <?php } else {
                                                    ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="checkConvenio" checked disabled>
                                                            <label class="form-check-label" for="checkConvenio">
                                                                Convenio
                                                            </label>
                                                        </div>
                                                    <?php }
                                                    if (is_null($documentos_empresa)) {
                                                    ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="checkConvenio" disabled>
                                                            <label class="form-check-label" for="checkConvenio">
                                                                Protocolos Bio
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="checkConvenio" disabled>
                                                            <label class="form-check-label" for="checkConvenio">
                                                                Cert. Existencia
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="checkConvenio" disabled>
                                                            <label class="form-check-label" for="checkConvenio">
                                                                CC Representante
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="checkConvenio" disabled>
                                                            <label class="form-check-label" for="checkConvenio">
                                                                RUT
                                                            </label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <?php
                                                        if (is_null($documentos_empresa['archivo_protocolos_bio'])) {
                                                        ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="checkConvenio" disabled>
                                                                <label class="form-check-label" for="checkConvenio">
                                                                    Protocolos Bio
                                                                </label>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="checkConvenio" disabled checked>
                                                                <label class="form-check-label" for="checkConvenio">
                                                                    Protocolos Bio
                                                                </label>
                                                            </div>
                                                        <?php } ?>
                                                        <?php
                                                        if (is_null($documentos_empresa['archivo_certificado_existencia'])) {
                                                        ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="checkConvenio" disabled>
                                                                <label class="form-check-label" for="checkConvenio">
                                                                    Cert. Existencia
                                                                </label>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="checkConvenio" disabled checked>
                                                                <label class="form-check-label" for="checkConvenio">
                                                                    Cert. Existencia
                                                                </label>
                                                            </div>
                                                        <?php } ?>
                                                        <?php
                                                        if (is_null($documentos_empresa['archivo_cc_representante'])) {
                                                        ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="checkConvenio" disabled>
                                                                <label class="form-check-label" for="checkConvenio">
                                                                    CC Representante
                                                                </label>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="checkConvenio" disabled checked>
                                                                <label class="form-check-label" for="checkConvenio">
                                                                    CC Representante
                                                                </label>
                                                            </div>
                                                        <?php } ?>
                                                        <?php
                                                        if (is_null($documentos_empresa['archivo_rut'])) {
                                                        ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="checkConvenio" disabled>
                                                                <label class="form-check-label" for="checkConvenio">
                                                                    RUT
                                                                </label>
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="checkConvenio" disabled checked>
                                                                <label class="form-check-label" for="checkConvenio">
                                                                    RUT
                                                                </label>
                                                            </div>
                                                    <?php }
                                                    } ?>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
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
<script src="../../js/jquery-3.6.0.min.js"></script>
<script src="../../js/sb-admin-2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
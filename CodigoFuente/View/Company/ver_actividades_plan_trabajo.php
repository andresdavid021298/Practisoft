<?php
session_start();
if ($_SESSION['id_empresa'] == NULL) {
    header("Location: ../../index.php");
} else {
    if (!isset($_GET['id_estudiante'])) {
        header("Location: ver_actividades.php");
    }
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
                <a class="nav-link" style="text-align: center;" href="index_company.php">
                    <span style="font-size: 20px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">INICIO</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGestionPracticantes" aria-expanded="true" aria-controls="collapseGestionPracticantes">
                    <i class="fas fa-users-cog"></i>
                    <span id="titulosSideBar">Gesti??n de Practicantes</span>
                </a>
                <div id="collapseGestionPracticantes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="solicitud_practicante.php"><i class="fas fa-plus"></i> Solicitud de Practicantes</a>
                        <a class="collapse-item" href="ver_practicantes.php"><i class="fas fa-user"></i> Ver Practicantes</a>
                        <a class="collapse-item" href="ver_actividades.php"><i class="fas fa-check-circle"></i> Ver Actividades</a>
                        <a class="collapse-item" href="ver_estudiantes_plan_trabajo.php"><i class="fas fa-book"></i> Plan de Trabajo </a>
                        <a class="collapse-item" href="encuesta_satisfaccion.php"><i class="fas fa-star-half-alt"></i> Encuesta de Satisfacci??n</a>
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
                        <a class="collapse-item" href="gestionar_documentacion.php"><i class="fas fa-file-pdf"></i> Gestionar Documentos</a>
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
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Cerrar Sesi??n
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <div style="padding-left: 10px;">
                    <a class="btn btn-primary" href="ver_actividades.php"><i class="fas fa-arrow-circle-left"></i> Volver</a>

                </div>
                <?php
                require_once "../../Controller/Estudiante/Estudiante_Controller.php";
                $info_estudiante = buscarEstudiante($_GET['id_estudiante']);
                if ($info_estudiante['id_empresa'] != $_SESSION['id_empresa']) {
                ?>
                    <center>
                        <h2><strong style="color: #D61117;">PRACTICANTE NO ASIGNADO</strong></h2>
                    </center>
                <?php
                } else {
                ?>
                    <center>
                        <h2 id="h2">Ver Actividades</h2>
                        <?php
                        require_once '../../Controller/Actividad/Actividad_Controller.php';
                        $numero_horas = verHorasPorEstudiante($_GET['id_estudiante']);

                        ?>
                        <h4 style="color: black;"><strong>N??mero de Horas Totales Aprobadas: </strong><?php echo $numero_horas; ?> / 320</h4>
                    </center>
                    <div class="container-fluid">
                        <h5 style="color: black;"><strong>Estudiante: </strong><?php echo $info_estudiante['nombre_estudiante']; ?></h5>
                    </div>
                    <br>
                    <div class="container-fluid">
                        <div class="table-responsive">
                            <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th id="th">Descripci??n</th>
                                        <th id="th">Horas Definidas</th>
                                        <th id="th">Horas Cumplidas</th>
                                        <th id="th">Subactividades</th>
                                        <th id="th">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once '../../Controller/Actividades_Plan_Trabajo/Actividades_Plan_Trabajo_Controller.php';
                                    $actividades_plan_trabajo = listarActividadesPlanTrabajoPorEstudianteAprobadas($_GET['id_estudiante']);
                                    if (is_null($actividades_plan_trabajo)) {
                                    ?>
                                        <td colspan="5" style="color: #D61117;">
                                            <center><strong>NO SE HA VALIDADO EL PLAN DE TRABAJO DE ESTE ESTUDIANTE</strong></center>
                                        </td>
                                        <?php
                                    } else {
                                        foreach ($actividades_plan_trabajo as $actividad) {
                                            $cantidad_actividades_en_espera = cantidadSubactividadesEnEspera($actividad['id_actividad_plan_trabajo']);
                                        ?>
                                            <tr>
                                                <td>
                                                    <center><?php echo $actividad['descripcion_actividad_plan_trabajo']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $actividad['numero_horas_actividad_plan_trabajo']; ?></center>
                                                </td>
                                                <?php
                                                require_once '../../Controller/Actividad/Actividad_Controller.php';
                                                $horas_estudiante = sumarHorasPorActividadPlanTrabajo($actividad['id_actividad_plan_trabajo']);
                                                ?>
                                                <td>
                                                    <center><?php echo $horas_estudiante; ?></center>
                                                </td>
                                                <td id="td">
                                                    <?php
                                                    if ($cantidad_actividades_en_espera > 0) { ?>
                                                        <img alt="GitHub followers badge" src="https://img.shields.io/badge/-Hay subactividades por revisar-yellow?style=for-the-badge">
                                                    <?php
                                                    } else { ?>
                                                        <img alt="GitHub followers badge" src="https://img.shields.io/badge/-No hay subactividades por revisar-green?style=for-the-badge">
                                                    <?php } ?>
                                                </td>
                                                <td id="td">
                                                    <center><a class="btn btn-primary" href="detalles_actividades.php?id_actividad=<?php echo $actividad['id_actividad_plan_trabajo']; ?>">Ver SubActividades <i class="fas fa-eye"></i></a></center>
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th id="th">Descripci??n</th>
                                        <th id="th">Horas Definidas</th>
                                        <th id="th">Horas Cumplidas</th>
                                        <th id="th">Subactividades</th>
                                        <th id="th">Opciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <br><br><br>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
            <footer>
                <div class="ufps-footer">
                    <h3>Universidad Francisco de Paula Santander</h3>
                    <p>Programa Ingenier??a de Sistemas</p>
                    <p>PractiSoft 2021</p>
                    <p>Desarrollado por: Andres Ariza(adac021298@gmail.com) - Diego Navas(dieg9928.dn@gmail.com) - Jorge Mojica(jorgemojica32@gmail.com)</p>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>

    </div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../../js/sb-admin-2.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabla').DataTable({
            "language": {
                "lengthMenu": 'Mostrar _MENU_ registros por p??gina',
                "zeroRecords": "Sin Registros",
                "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
</script>

</html>
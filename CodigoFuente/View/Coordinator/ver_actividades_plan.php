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
                    <span id="titulosSideBar">Gesti??n de Pr??ctica</span>
                </a>
                <div id="collapseGestionPracticantes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="revision_solicitudes.php"><i class="fas fa-plus"></i> Revisi??n de Solicitudes</a>
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
                        <a class="collapse-item" href="perfil.php"><i class="fas fa-edit"></i></i> Mi Perfil</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Informes -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInformes" aria-expanded="true" aria-controls="collapseInformes">
                    <i class="fas fa-signal"></i>
                    <span id="titulosSideBar">Informe Estad??stico</span>
                </a>
                <div id="collapseInformes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="informe_estadistico.php"><i class="fas fa-book"></i> Informe del Semestre</a>
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
                                <img class="imgRedonda" src="<?php echo $_SESSION['url_image'] ?>" alt="Imagen de Perfil">
                                <div>
                                    <span id="nombreUsuario">
                                        <b><?php echo $_SESSION['nombre_coordinador'] ?></b>
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
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <h2 id="h2">Actividades</h2>
                                
                            </div>
                        </div>
                    </div>

                    <!-- Componente Collapse para Presentar las Actividades y Subactividades de un plan de trabajo aprobado -->
                    <div id="accordion">

                        <?php
                        require_once '../../Controller/Actividades_Plan_Trabajo/Actividades_Plan_Trabajo_Controller.php';
                        require_once '../../Controller/Estudiante/Estudiante_Controller.php';
                        require_once '../../Controller/Actividad/Actividad_Controller.php';
                        $estudiante = buscarEstudiante($_GET['id_estudiante']);
                        $actividad_plan = listarActividadesPlanTrabajoPorEstudianteAprobadas($_GET['id_estudiante']);
                        $horas_aprobadas_estudiante = verHorasPorEstudiante($_GET['id_estudiante']);
                        ?>

                        <center><h4 style="color: black;">N??mero de Horas Totales Aprobadas: <?php echo $horas_aprobadas_estudiante; ?> / 320</h4></center><br>
                        <h5 style="color: black;"> <strong>Estudiante:</strong> <?php echo $estudiante['nombre_estudiante']; ?></h5><br>

                        <?php
                        if (is_null($actividad_plan)) {
                        ?>
                            <hr>
                            <h2 style="color: #D61117; text-align: center;">No Presenta Actividades Aprobadas</h2>
                            <hr>
                        <?php
                        } else {
                        ?>
                            <div class="card">
                                <?php
                                $cont = 0;
                                foreach ($actividad_plan as $actividades) {

                                ?>
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $cont ?>" aria-expanded="false" aria-controls="collapseOne">
                                                <?php
                                                echo $actividades['descripcion_actividad_plan_trabajo'];
                                                $cantidad_horas_plan_trabajo = $actividades['numero_horas_actividad_plan_trabajo'];
                                                ?>

                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse<?php echo $cont ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            <?php
                                            require_once '../../Controller/Actividad/Actividad_Controller.php';
                                            $subactividades = listarActividadesPorActividadPlanTrabajo($actividades['id_actividad_plan_trabajo']);
                                            if (is_null($subactividades)) {
                                            ?>
                                                <center><strong><h5 style="color: black;"><?php echo "Cantidad de horas aprobadas: 0/" . $cantidad_horas_plan_trabajo ?></h5></strong></center>
                                                <label>No Presenta Subactividades</label>
                                            <?php
                                            } else {
                                            ?>

                                                <?php
                                                $horas_aprobadas = sumarHorasPorActividadPlanTrabajo($actividades['id_actividad_plan_trabajo']);
                                                ?>


                                                <center><strong><h5 style="color: black;"><?php echo "Cantidad de horas aprobadas: " . $horas_aprobadas . "/" . $cantidad_horas_plan_trabajo ?></h5></strong></center>

                                                <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th id="th">Descripci??n</th>
                                                            <th id="th">Horas Dedicadas</th>
                                                            <th id="th">Estado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php


                                                        foreach ($subactividades as $subactividad) {
                                                        ?>
                                                            <tr>

                                                                <td id="td"><?php echo $subactividad['descripcion_actividad'] ?></td>
                                                                <td id="td"><?php echo $subactividad['horas_actividad'] ?></td>
                                                                <?php
                                                                if ($subactividad['estado_actividad'] == 'En Espera') {
                                                                ?>
                                                                    <td id="td">
                                                                        <img alt="GitHub followers badge" src="https://img.shields.io/badge/-<?php echo $subactividad['estado_actividad'] ?>-yellow?style=for-the-badge">
                                                                    </td>
                                                                <?php
                                                                } else if ($subactividad['estado_actividad'] == 'Aprobada') {
                                                                ?>
                                                                    <td id="td">
                                                                        <img alt="GitHub followers badge" src="https://img.shields.io/badge/-<?php echo $subactividad['estado_actividad'] ?>-green?style=for-the-badge">
                                                                    </td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td id="td">
                                                                        <img alt="GitHub followers badge" src="https://img.shields.io/badge/-<?php echo $subactividad['estado_actividad'] ?>-red?style=for-the-badge">
                                                                    </td>
                                                                <?php
                                                                }
                                                                ?>
                                                            </tr>
                                                        <?php
                                                        }

                                                        ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th id="th">Descripci??n</th>
                                                            <th id="th">Horas Dedicadas</th>
                                                            <th id="th">Estado</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>

                                <?php
                                    $cont++;
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- Fin de componente Collapse -->
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
                    <p>Programa Ingenier??a de Sistemas</p>
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
<script src="../../js/eventos.js"></script>
<script src="../../js/Coordinator/alertas_coordinador.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabla').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por p??gina",
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
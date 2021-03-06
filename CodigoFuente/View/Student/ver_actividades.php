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

            <!-- Nav Item - Mi Practica Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGestionPracticantes" aria-expanded="true" aria-controls="collapseGestionPracticantes">
                    <i class="fas fa-users-cog"></i>
                    <span id="titulosSideBar">Mi Pr??ctica</span>
                </a>
                <div id="collapseGestionPracticantes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="encuesta_inscripcion.php"> <i class="fas fa-file-alt"></i> Inscripci??n</a>
                        <a class="collapse-item" href="ver_empresa.php"><i class="fas fa-building"></i> Ver Empresa</a>
                        <a class="collapse-item" href="documento_carta_compromisoria.php"><i class="fas fa-file-signature"></i> C. Compromisoria</a>
                        <a class="collapse-item" href="plan_de_trabajo.php"><i class="fas fa-book"></i> Plan de Trabajo </a>
                        <a class="collapse-item" href="actividades_plan_trabajo.php"><i class="fas fa-tasks"></i> Mis Actividades </a>
                        <a class="collapse-item" href="documento_informe_avance.php"><i class="fas fa-clone"></i> Informe de Avance </a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Mi Perfil Menu -->
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

            <!-- Nav Item - Documentos -->

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
                                <h2 id="h2"">SubActividades</h2>
                                <br>
                            </div>
                        </div>
                    </div>
                    <?php
                    require_once '../../Controller/Actividades_Plan_Trabajo/Actividades_Plan_Trabajo_Controller.php';
                    if (isset($_GET['id_actividad'])) {
                        $info_actividad = buscarActividaPlanTrabajo($_GET['id_actividad']);
                        if ($info_actividad == NULL || $info_actividad['id_estudiante'] = !$_SESSION['id_estudiante']) {
                    ?>
                            <h2 style=" color: #D61117; text-align: center;">Esta Actividad NO Est?? Visible</h2>
                            <?php
                        } else {
                            ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <?php require_once '../../Controller/Actividad/Actividad_Controller.php'; ?>
                                            <h5 id="h2">Total de Horas Aprobadas: <?php echo sumarHorasPorActividadPlanTrabajo($_GET['id_actividad']); ?> / <?php echo $info_actividad['numero_horas_actividad_plan_trabajo'] ?></h5>
                                            <br>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Nueva SubActividad</button>
                                            <div style="display: inline-block;">
                                                <center>
                                                    <form action="crear_informe_subactividades.php" method="post">
                                                        <div>
                                                            <button type="submit" id="submit" name="import" class="btn btn-primary" style="background-color: #D61117; color: white;">Exportar PDF <i class="fas fa-file-pdf"></i></button>
                                                            <input name="id_actividad" type="hidden" value="<?php echo $_GET['id_actividad']; ?>">
                                                        </div>
                                                    </form>
                                                </center>
                                            </div>
                                            <br><br>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <!--Modal-->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color:#D61117;">
                                                <h3 class="modal-title" id="exampleModalLabel" style="color: white;">Agregar SubActividad</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="../../Controller/Actividad/Actividad_Controller.php" method="POST">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Fecha de Realizaci??n:</label>
                                                        <input type="date" class="form-control" name="fecha_realizacion" max="<?php echo date("Y-m-d"); ?>" id="fecha">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Horas Dedicadas:</label>
                                                        <input type="number" class="form-control" name="num_horas" id="horas">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="message-text" class="col-form-label">Descripcion:</label>
                                                        <input type="text" class="form-control" name="descripcion_actividad" id="descripcion">
                                                    </div>
                                                    <input type="hidden" name="id_actividad_plan_trabajo" id="id_actividad_plan_trabajo" value="<?php echo $_GET['id_actividad'] ?>">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col text-center">
                                                                <button type="button" onclick="agregarActividad()" class="btn btn-primary">Agregar</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Modal-->

                                <!-- Data Table -->

                                <div class="table-responsive">
                                    <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <td colspan="1">
                                                    <center><strong>Actividad:</strong></center>
                                                </td>
                                                <td colspan="5">
                                                    <center><strong><em><?php echo $info_actividad['descripcion_actividad_plan_trabajo']; ?></em></strong></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th id="th">Fecha</th>
                                                <th id="th">Descripci??n</th>
                                                <th id="th">N??mero de Horas</th>
                                                <th id="th">Estado</th>
                                                <th id="th">Observaciones</th>
                                                <th id="th">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once '../../Controller/Actividad/Actividad_Controller.php';
                                            $lista_actividad = listarActividadesPorActividadPlanTrabajo($_GET['id_actividad']);
                                            if (is_null($lista_actividad)) {
                                            ?>
                                                <td colspan="6" style="color: #D61117;">
                                                    <center><strong>NO POSEE SUBACTIVIDADES REGISTRADAS EN EL SISTEMA</strong></center>
                                                </td>
                                                <?php
                                            } else {

                                                foreach ($lista_actividad as $listado) {
                                                ?>
                                                    <tr>
                                                        <td id="td"><?php echo $listado['fecha_actividad'] ?></td>
                                                        <td id="td"><?php echo $listado['descripcion_actividad'] ?></td>
                                                        <td id="td"><?php echo $listado['horas_actividad'] ?></td>
                                                        <?php
                                                        if ($listado['estado_actividad'] == 'En Espera') {
                                                        ?>
                                                            <td id="td">
                                                                <img alt="GitHub followers badge" src="https://img.shields.io/badge/-<?php echo $listado['estado_actividad'] ?>-yellow?style=for-the-badge">
                                                            </td>
                                                        <?php
                                                        } else if ($listado['estado_actividad'] == 'Aprobada') {
                                                        ?>
                                                            <td id="td">
                                                                <img alt="GitHub followers badge" src="https://img.shields.io/badge/-<?php echo $listado['estado_actividad'] ?>-green?style=for-the-badge">
                                                            </td>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <td id="td">
                                                                <img alt="GitHub followers badge" src="https://img.shields.io/badge/-<?php echo $listado['estado_actividad'] ?>-red?style=for-the-badge">
                                                            </td>
                                                        <?php
                                                        }
                                                        ?>
                                                        <td id="td"><?php echo $listado['observaciones_actividad'] ?></td>
                                                        <td id="td">
                                                            <?php
                                                            if ($listado['estado_actividad'] == 'En Espera') {
                                                            ?>
                                                                <center><button class="btn btn-primary" data-toggle="modal" data-target="#modalActualizarActividad" data-fecha="<?php echo $listado['fecha_actividad'] ?>" data-horas="<?php echo $listado['horas_actividad'] ?>" data-descripcion="<?php echo $listado['descripcion_actividad'] ?>" data-actividad="<?php echo $listado['id_actividad'] ?>">Actualizar <i class="fas fa-sync-alt"></i></button></center>
                                                                <br>
                                                                <center><button class="btn btn-danger" onclick="eliminarActividad(<?php echo $listado['id_actividad'] ?>,<?php echo $_GET['id_actividad']; ?>)">Eliminar <i class="fas fa-trash-alt"></i></button></center>
                                                            <?php
                                                            } else if ($listado['estado_actividad'] == 'Reprobada') {
                                                            ?>
                                                                <center><button class="btn btn-primary" data-toggle="modal" data-target="#modalActualizarActividad" data-fecha="<?php echo $listado['fecha_actividad'] ?>" data-horas="<?php echo $listado['horas_actividad'] ?>" data-descripcion="<?php echo $listado['descripcion_actividad'] ?>" data-actividad="<?php echo $listado['id_actividad'] ?>">Actualizar <i class="fas fa-sync-alt"></i></button></center>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <center>
                                                                    <img alt="GitHub followers badge" src="https://img.shields.io/badge/-<?php echo 'No Disponible' ?>-gray?style=for-the-badge">
                                                                </center>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th id="th">Fecha</th>
                                                <th id="th">Descripci??n</th>
                                                <th id="th">N??mero de Horas</th>
                                                <th id="th">Estado</th>
                                                <th id="th">Observaciones</th>
                                                <th id="th">Opciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <br><br><br>
                                </div>

                            <?php }
                    } else { ?>
                            <h2 style="color: #D61117; text-align: center;">Informacion Erronea</h2>
                        <?php } ?>

                            </div>

                        </div>



                        <!-- inicio modal Actualizar Actividad -->


                        <div class="modal fade" id="modalActualizarActividad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color:#D61117;">
                                        <h3 class="modal-title" id="exampleModalLabel" style="color: white;">Actualizar SubActividad</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../../Controller/Actividad/Actividad_Controller.php" method="POST">



                                            <div class="form-group">
                                                <label for="recipient-name" class="col-form-label">Fecha:</label>
                                                <input type="date" class="form-control fecha_act" max="<?php echo date("Y-m-d"); ?>" id="fecha_input">
                                            </div>

                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Horas Dedicadas:</label>
                                                <input type="number" class="form-control numero_horas" name="num_horas" id="horas_input">
                                            </div>

                                            <div class="form-group">
                                                <label for="message-text" class="col-form-label">Descripcion:</label>
                                                <input type="text" class="form-control descripcion_act" name="descripcion_actividad" id="descripcion_input">
                                            </div>

                                            <input type="hidden" class="form-control id_act" name="id_actividad" id="id_input">
                                            <input type="hidden" class="form-control id_act" name="id_actividad_plan_trabajo" id="id_actividad_plan_trabajo" value="<?php echo $_GET['id_actividad']; ?>">

                                            <div class="container">
                                                <div class="row">
                                                    <div class="col text-center">
                                                        <button type="button" onclick="actualizarActividad()" class="btn btn-primary">Actualizar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- fin modal -->
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
<script src="../../js/Student/alertas_estudiante.js"></script>
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
<script>
    $('#modalActualizarActividad').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        //var recipient = button.data('whatever')
        var fecha = button.data('fecha') // Extract info from data-* attributes
        var num_horas = button.data('horas')
        var descripcion = button.data('descripcion')
        var id_actividad = button.data('actividad')
        var modal = $(this)
        //modal.find('.modal-title').text('Actividad: ' + fecha)
        //modal.find('.modal-body input').val(num_horas)
        modal.find('.fecha_act').val(fecha)
        modal.find('.numero_horas').val(num_horas)
        modal.find('.descripcion_act').val(descripcion)
        modal.find('.id_act').val(id_actividad)
    })
</script>

</html>
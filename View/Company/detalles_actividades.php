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
                <a class="nav-link" style="text-align: center;" href="index_company.php">
                    <span style="font-size: 20px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">INICIO</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGestionPracticantes" aria-expanded="true" aria-controls="collapseGestionPracticantes">
                    <i class="fas fa-users-cog"></i>
                    <span id="titulosSideBar">Gestión de Practicantes</span>
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
                        <a class="collapse-item" href="documento_representante.php"><i class="fas fa-id-card"></i> C.C Representante</a>
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
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Boton de ATRAS -->
                <div style="padding-left: 10px;">
                    <a class="btn btn-primary" href="ver_actividades_plan_trabajo.php"><i class="fas fa-arrow-circle-left"></i> Volver</a>
                </div>
                <?php
                require_once "../../Controller/Actividades_Plan_Trabajo/Actividades_Plan_Trabajo_Controller.php";
                $actividad_plan_trabajo = buscarActividaPlanTrabajo($_GET['id_actividad']);
                if ($actividad_plan_trabajo == NULL) {
                ?>
                    <h1 style="color: #D61117; text-align: center;">Actividad NO Visible</h1>
                    <?php
                } else {
                    require_once "../../Controller/Estudiante/Estudiante_Controller.php";
                    $estudiante = buscarEstudiante($actividad_plan_trabajo['id_estudiante']);
                    if ($estudiante['id_empresa'] != $_SESSION['id_empresa']) {
                    ?>
                        <h1 style="color: #D61117; text-align: center;">Que no perro</h1>
                    <?php
                    } else {
                    ?>
                        <center>
                            <h2>Ver SubActividades</h2>
                            <?php require_once '../../Controller/Actividad/Actividad_Controller.php'; ?>
                            <!-- <h5>Numero de Horas Aprobadas: <?php echo sumarHorasPorActividadPlanTrabajo($_GET['id_actividad']); ?> / <?php echo $actividad_plan_trabajo['numero_horas_actividad_plan_trabajo']; ?></h5> -->
                        </center>
                        <div class="container-fluid">
                            <h5><strong>Estudiante: </strong><?php echo $estudiante['nombre_estudiante'] ?></h5>
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <td colspan="1">
                                                <center><strong>Actividad:</strong></center>
                                            </td>
                                            <td colspan="5">
                                                <center><strong><em><?php echo $actividad_plan_trabajo['descripcion_actividad_plan_trabajo']; ?></em></strong></center>
                                            </td>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>Fecha</center>
                                            </th>
                                            <th>
                                                <center>Descripcion</center>
                                            </th>
                                            <th>
                                                <center>Horas</center>
                                            </th>
                                            <th>
                                                <center>Estado</center>
                                            </th>
                                            <th>
                                                <center>Opciones</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        require_once '../../Controller/Actividad/Actividad_Controller.php';
                                        $lista_de_actividades = listarActividadesPorActividadPlanTrabajo($_GET['id_actividad']);
                                        if (is_null($lista_de_actividades)) {
                                        ?>
                                            <td colspan="5" style="color: #D61117;">
                                                <center><strong>EL PRACTICANTE NO REGISTRA ACTIVIDADES</strong></center>
                                            </td>
                                            <?php
                                        } else {
                                            foreach ($lista_de_actividades as $actividad) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <center><?php echo $actividad['fecha_actividad']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $actividad['descripcion_actividad']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $actividad['horas_actividad']; ?></center>
                                                    </td>
                                                    <td>
                                                        <center><?php echo $actividad['estado_actividad']; ?></center>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($actividad['estado_actividad'] == "En Espera") { ?>
                                                            <center><button class="btn btn-success" onclick="validarActividad(<?php echo $actividad['id_actividad'] ?>,<?php echo $_GET['id_actividad'] ?>)">Validar</button></center>
                                                            <center style="margin-top: 15px;"><button class="btn btn-warning" data-toggle="modal" data-target="#modalRechazarActividad" data-whatever="<?php echo $actividad['descripcion_actividad']; ?>" data-example="<?php echo $actividad['id_actividad']; ?>">Rechazar</button></center>
                                                        <?php } else { ?>
                                                            <center>----------</center>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                        <?php }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
            <!-- End of Page Wrapper -->

            <!-- Modal rechazar actividad -->
            <div class="modal fade" id="modalRechazarActividad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #D61117">
                            <h3 class="modal-title" id="exampleModalLabel" style="color: white">Nombre Actividad</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <center>
                                <h5><?php echo $estudiante['nombre_estudiante']; ?></h5>
                            </center>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="textarea_observaciones">Observaciones</label>
                                    <textarea name="textarea_observaciones" style="width: 100%;" id="textarea_observaciones" rows="5"></textarea>
                                </div>
                                <input type="hidden" id="id_actividad">
                                <center><button type="button" onclick="rechazarActividad(<?php echo $_GET['id_actividad']; ?>)" class="btn btn-primary">Enviar</button></center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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
<script src="../../js/Company/alertas_empresa.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<!-- Script que ayuda para el contenido dinamico en el modal -->
<script>
    $('#modalRechazarActividad').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var id_actividad = button.data('example')
        var modal = $(this)
        modal.find('.modal-title').text('Actividad: ' + recipient)
        modal.find('.modal-body input').val(id_actividad)
    })
</script>

</html>
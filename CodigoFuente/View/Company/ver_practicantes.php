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
                <center>
                    <h2 id="h2">Ver Practicantes</h2>
                </center>
                <br>
                <div class="container-fluid">
                    <div class="table-responsive">
                        <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th id="th">
                                        Nombre
                                    </th>
                                    <th id="th">
                                        Correo Institucional
                                    </th>
                                    <th id="th">
                                        C??digo
                                    </th>
                                    <th id="th">
                                        Celular
                                    </th>
                                    <th id="th">
                                        Tutor
                                    </th>
                                    <th id="th">
                                        Opciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                require_once '../../Controller/Estudiante/Estudiante_Controller.php';
                                $lista_de_estudiantes = listarEstudiantesPorEmpresa($_SESSION['id_empresa']);
                                if (is_null($lista_de_estudiantes)) {
                                ?>
                                    <td colspan="6" style="color: #D61117;">
                                        <center><strong>NO TIENE PRACTICANTES ASIGNADOS</strong></center>
                                    </td>
                                    <?php
                                } else {
                                    foreach ($lista_de_estudiantes as $estudiante) {
                                    ?>
                                        <tr>
                                            <td id="td">
                                                <?php echo $estudiante['nombre_estudiante']; ?>
                                            </td>
                                            <td id="td">
                                                <?php echo $estudiante['correo_estudiante']; ?>
                                            </td>
                                            <td id="td">
                                                <?php echo $estudiante['codigo_estudiante']; ?>
                                            </td id="td">
                                            <td id="td">
                                                <?php echo $estudiante['celular_estudiante']; ?>
                                            </td>
                                            <td id="td">
                                                <?php
                                                if (!is_null($estudiante['nombre_tutor'])) {
                                                ?>
                                                    <?php echo $estudiante['nombre_tutor']; ?>
                                                <?php } else {
                                                ?>
                                                    <img alt="GitHub followers badge" src="https://img.shields.io/badge/-<?php echo 'Sin Tutor' ?>-gray?style=for-the-badge">
                                                <?php }    ?>
                                            </td>
                                            <td id="td">
                                                <?php if ($estudiante['id_tutor'] == NULL) {
                                                ?>
                                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAsignarTutor" data-estudiante="<?php echo $estudiante['id_estudiante'] ?>" data-nombre="<?php echo $estudiante['nombre_estudiante'] ?>">Asignar Tutor <i class="fas fa-user-shield"></i></button>

                                                <?php } else {
                                                ?>
                                                    <button class="btn btn-warning" data-toggle="modal" data-target="#modalAsignarTutor" data-estudiante="<?php echo $estudiante['id_estudiante'] ?>" data-nombre="<?php echo $estudiante['nombre_estudiante'] ?>">Cambiar Tutor <i class="fas fa-user-shield"></i></button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- inicio modal Asignar Tutor-->


                <div class="modal fade" id="modalAsignarTutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#D61117;">
                                <h3 class="modal-title" id="exampleModalLabel" style="color: white;">Asignar Tutor a Estudiante</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php
                                require_once '../../Controller/Tutor/Tutor_Controller.php';
                                $lista_de_tutores = mostrarDatosTutorEmpresa($_SESSION['id_empresa']);
                                if (is_null($lista_de_tutores)) {
                                ?>
                                    <h3>No tiene tutores agregados, por favor agregue <a href="ver_tutores.php">aqui</a></h3>
                                <?php } else {
                                ?>
                                    <form action="" method="POST">

                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Estudiante:</label>
                                            <input type="text" class="form-control nombre_est" name="nombre_estudiante" id="nombre_estudiante_tut" readonly>
                                        </div>

                                        <input type="hidden" class="form-control id_est" name="id_estudiante" id="id_estudiante_tut">

                                        <label for="message-text" class="col-form-label">Seleccione un Tutor:</label>
                                        <select id="id_tutor_est" class="form-control" aria-label="Default select example">
                                            <?php
                                            foreach ($lista_de_tutores as $listado) {
                                            ?>
                                                <option value="<?php echo $listado['id_tutor'] ?>"><?php echo $listado['nombre_tutor'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>


                                        <div class="container">
                                            <div class="row">
                                                <div class="col text-center">
                                                    <br>
                                                    <button type="button" onclick="asignarTutor()" class="btn btn-primary">Asignar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php } ?>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- fin modal -->

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
<script src="../../js/Company/alertas_empresa.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
<script>
    $('#modalAsignarTutor').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        //var recipient = button.data('whatever')
        var id_estudiante = button.data('estudiante')
        var nombre_estudiante = button.data('nombre')
        var modal = $(this)
        //modal.find('.modal-title').text('Actividad: ' + fecha)
        //modal.find('.modal-body input').val(num_horas)
        modal.find('.id_est').val(id_estudiante)
        modal.find('.nombre_est').val(nombre_estudiante)
    })
</script>

</html>
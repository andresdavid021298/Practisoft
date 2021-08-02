<?php
session_start();
if ($_SESSION['id_director'] == NULL) {
    header("Location: ../../index.php");
} else if (is_null($_GET['id_empresa'])) {
    header("Location: ver_empresas.php");
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
                <a class="nav-link" style="text-align: center;" href="index_director.php">
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
                        <a class="collapse-item" href="agregar_coordinador.php"><i class="fas fa-user-cog"></i> Agregar Coordinador</a>
                        <a class="collapse-item" href="semestre.php"><i class="fas fa-folder-open"></i> Semestre </a>
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
                        <a class="collapse-item" href="gestionar_documentos_semestre.php"><i class="fas fa-file-pdf"></i> Gestionar Documentos</a>
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
                    <span id="titulosSideBar">Informe Estadístico</span>
                </a>
                <div id="collapseInformes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="informe_estadistico.php"><i class="fas fa-book"></i> Informe del Semestre</a>
                        <a class="collapse-item" href="seleccionar_fecha_informe.php"><i class="fas fa-book"></i> Informe Histórico</a>
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
                        <i class="fa fa-bars" id="faBars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="imgRedonda" src="<?php echo $_SESSION['url_image'] ?>" alt="Imagen de Perfil">
                                <div>
                                    <span id="nombreUsuarioDirector">
                                        <b><?php echo $_SESSION['nombre_director'] ?></b>
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
                <div style="padding-left: 10px;">
                    <a class="btn btn-primary" href="ver_empresas.php"><i class="fas fa-arrow-circle-left"></i> Volver</a>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h2 id="h2" class="mb-0 text-gray-800">Documentación</h2>
                        </div>
                    </div>
                </div>
                <br>
                <?php
                require_once "../../Controller/Empresa/Empresa_Controller.php";
                require_once "../../Controller/DocumentosEmpresa/Documentos_Empresa_Controller.php";
                $listado_documentos = listarDocumentosHistorico();
                $empresa = mostrarDatos($_GET['id_empresa']);
                if (!$empresa[0]) {
                ?>
                    <br>
                    <center>
                        <h3 style="color: #D61117;">No existe esta empresa</h3>
                    </center>
                <?php } else {

                ?>
                    <div class="container-fluid">
                        <div class="table-responsive">
                            <table id="tabla" class="table table-striped table-bordered">
                                <thead>
                                    <tr>

                                        <td colspan="<?php echo count($listado_documentos) ?>">
                                            <center>
                                                <b><?php echo $empresa[0]['nombre_empresa']; ?>
                                                </b>
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <?php

                                        foreach ($listado_documentos as $lista) {
                                            $documento_con_piso = $lista['nombre_documento'];
                                            $documento_con_espacio = str_replace("_", " ", $documento_con_piso);
                                        ?>
                                            <th id="th"><?php echo $documento_con_espacio ?></th>
                                        <?php
                                        }
                                        ?>
                                        <th id="th">Convenio</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    require_once "../../Controller/DocumentosEmpresa/Documentos_Empresa_Controller.php";
                                    $documentos_empresa = listarDocumentosPorEmpresa($_GET['id_empresa']);

                                    if (is_null($documentos_empresa)) {
                                    ?>
                                        <tr>
                                            <td style="color: #D61117; text-align: center;" colspan="<?php count($listado_documentos) + 1; ?>"><strong>Sin Documentación</strong></td>
                                        </tr>
                                    <?php
                                    } else {
                                    ?>
                                        <tr>
                                            <?php

                                            foreach ($listado_documentos as $lista) {
                                                $documento_con_piso = $lista['nombre_documento'];
                                            ?>

                                                <?php
                                                if (is_null($documentos_empresa[$documento_con_piso])) {
                                                ?>
                                                    <td id="td">
                                                        <img alt="GitHub followers badge" src="https://img.shields.io/badge/-<?php echo 'Sin Documento' ?>-gray?style=for-the-badge">
                                                    </td>
                                                <?php
                                                } else {

                                                ?>
                                                    <td>
                                                        <center>
                                                            <a target="_blank" href="../../Documentos/<?php echo $documentos_empresa[$documento_con_piso]; ?>"><img src="../../Img/pdf.svg.png" style="width: 45px; height: 50px;" /></a>
                                                        </center><br>
                                                        <center><?php echo $documentos_empresa[$documento_con_piso]; ?></center>
                                                    </td>
                                            <?php
                                                }
                                                
                                            }
                                            ?>
                                            <?php
                                            if (is_null($documentos_empresa['nombre_archivo'])) {
                                            ?>
                                                <td id="td">
                                                    <img alt="GitHub followers badge" src="https://img.shields.io/badge/-<?php echo 'Sin Documento' ?>-gray?style=for-the-badge">
                                                </td>
                                            <?php
                                            } else {

                                            ?>
                                                <td>
                                                    <center>
                                                        <a target="_blank" href="../../Documentos/Convenios/<?php echo $documentos_empresa['nombre_archivo']; ?>"><img src="../../Img/pdf.svg.png" style="width: 45px; height: 50px;" /></a>
                                                    </center><br>
                                                    <center><?php echo $documentos_empresa['nombre_archivo']; ?></center>
                                                </td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
            <!-- End of Topbar -->

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
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tabla').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
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
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

            <!-- Nav Item - Gestion de Practicantes -->
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
                    <h2 id="h2">Mis Documentos</h2>
                </center>
                <br>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col text-center">
                            <?php
                            require_once "../../Controller/DocumentosEmpresa/Documentos_Empresa_Controller.php";
                            $nombres_columnas = verDocumentosBD();
                            $listado_documentos = listarDocumentosHistoricoActivos();
                            ?>
                            <center>
                                <strong>
                                    <p style="color: black;">Seleccione el documento que desea cargar en el sistema</p>
                                </strong>
                                <select class="form-control col-3" aria-label="Default select example" id="id_documento_option">
                                    <?php

                                    foreach ($listado_documentos as $lista) {
                                        $documento_con_piso = $lista['nombre_documento'];
                                        $documento_con_espacio = str_replace("_", " ", $documento_con_piso);
                                    ?>
                                        <option value="<?php echo $documento_con_piso ?>"><?php echo $documento_con_espacio ?></option>
                                    <?php } ?>

                                </select>
                            </center>
                            <br>
                            <img src="https://cdn.pixabay.com/photo/2017/06/10/07/24/note-2389227_960_720.png" style="width: 200px; height: 200px;" /><br>
                            <br>
                            <label class="custom-file-upload">
                                <input type="file" id="input_archivo_documentos" name="input_archivo_documentos" onchange="obtenerNombre()" />
                                <i class="fas fa-upload"></i>
                                Escoger Archivo
                            </label>
                            <label id="mensaje_label">El Archivo seleccionado es:</label>
                            <button onclick="subirDocumento();" id="btn_subir_doc" type="button" value="Enviar" name="btn_subir_doc" class="btn btn-primary">Cargar</button>
                            <input id="nombre_empresa" type="hidden" name="nombre_empresa" value="<?php echo $_SESSION['nombre_empresa']; ?>">
                            <input id="id_empresa" type="hidden" name="id_empresa" value="<?php echo $_SESSION['id_empresa']; ?>">
                            <br><br>
                            <center>
                                <div id="cargando" style="display:none;">
                                    <img width="200" src="https://upload.wikimedia.org/wikipedia/commons/b/b1/Loading_icon.gif" />
                                    <p>
                                        Cargando Documento...
                                    </p>
                                </div>
                            </center>
                            <br>
                            <b>
                                <p style="color: black;">La aplicaci??n web Practisoft garantiza la protecci??n de los datos personales <br> suministrados los cuales ser??n ??nica y exclusivamente con prop??sito acad??mico.</p>
                            </b>
                        </div>
                    </div>
                    <br>
                
                    <div class="table-responsive">
                        <table id="tabla" class="table table-striped table-bordered">
                            <thead>
                                <tr>

                                    <?php

                                    foreach ($listado_documentos as $lista) {
                                        $documento_con_piso = $lista['nombre_documento'];
                                        $documento_con_espacio = str_replace("_", " ", $documento_con_piso);
                                    ?>
                                        <th id="th"><?php echo $documento_con_espacio; ?></th>
                                    <?php } ?>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                require_once "../../Controller/DocumentosEmpresa/Documentos_Empresa_Controller.php";
                                $documentos_empresa = listarDocumentosPorEmpresa($_SESSION['id_empresa']);

                                if (is_null($documentos_empresa)) {
                                ?>

                                    <td style="color: #D61117; text-align: center;" colspan="<?php count($listado_documentos) + 1; ?>"><strong>Sin Documentaci??n</strong></td>

                                <?php
                                } else {
                                ?>
                                    <tr>
                                        <?php
                                        foreach ($listado_documentos as $lista) {
                                            $documento_con_piso = $lista['nombre_documento'];
                                            if (is_null($documentos_empresa[$documento_con_piso])) {
                                        ?>
                                                <td id="td">
                                                    <img alt="GitHub followers badge" src="https://img.shields.io/badge/-<?php echo 'Sin Documento' ?>-gray?style=for-the-badge">
                                                </td>
                                            <?php
                                            } else {
                                            ?>
                                                <td id="td">
                                                    <center>
                                                        <a target="_blank" href="../../Documentos/<?php echo $documentos_empresa[$documento_con_piso]; ?>"><img src="../../Img/pdf.svg.png" style="width: 45px; height: 50px;" /></a>
                                                    </center><br>
                                                    <?php echo $documentos_empresa[$documento_con_piso]; ?>
                                                </td>
                                        <?php
                                            }
                                        }
                                        ?>
                                        
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <br><br><br>
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
<script src="../../js/Company/alertas_empresa.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
    function obtenerNombre() {
        documento = document.getElementById('input_archivo_documentos').files[0];
        nombre_documento = documento['name'];
        label = document.getElementById("mensaje_label");
        label.textContent = nombre_documento;
    }
</script>

</html>
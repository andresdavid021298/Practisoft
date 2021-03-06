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

<body id="page-top" onload="sumatoriaNumeroHorasActividadesPlanTrabajo();">
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

            <!-- Nav Item - Pages Collapse Menu -->
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
                        <a class="collapse-item" href="documento_informe_avance.php"><i class="fas fa-clone"></i> Informes </a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
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
                <div class="container-fluid" onkeyup="sumatoriaNumeroHorasActividadesPlanTrabajo()">
                    <center>
                        <h2 id="h2">Plan de Trabajo</h2>
                    </center>
                    <br>
                    <div>
                        <span style="text-align: center; font-weight: bold;">
                            <h5 id="sumatoria">Sumatoria de horas: </h5>
                        </span>
                    </div>
                    <br>
                    <!-- Valida si esta asignada a una empresa -->
                    <?php
                    require_once "../../Controller/Empresa/Empresa_Controller.php";
                    $empresa_estudiante = mostrarEmpresaAsignadaEstudiante($_SESSION['id_estudiante']);
                    if (is_null($empresa_estudiante)) {
                    ?>
                        <center><strong style="color:#D61117">NO POSEE EMPRESA ASIGNADA EN EL SISTEMA</strong></center>
                        <?php
                    } else {
                        require_once "../../Controller/Actividades_Plan_Trabajo/Actividades_Plan_Trabajo_Controller.php";
                        $lista_actividades = listarActividadesPlanTrabajoPorEstudiante($_SESSION['id_estudiante']);
                        if (is_null($lista_actividades)) {
                        ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <center>
                                            <form name="frmProduct" method="post" action="">
                                                <div id="outer">
                                                    <div id="header">
                                                        <div class="float-left">N??</div>
                                                        <div class="float-left col-heading">Descripci??n</div>
                                                        <div class="float-left col-heading2">N??mero de Horas</div>
                                                    </div>
                                                    <div id="productos">
                                                        <div class="lista-producto float-clear" style="clear:both;">
                                                            <ul class="list-group">
                                                                <li id="plan" class="list-group-item">
                                                                    <div class="float-left"><input type="checkbox" name="item_index[]" /></div>
                                                                    <div class="float-left"><textarea class="form-control plan_trabajo" name="pro_nombre[]" cols="40" rows="2"></textarea></div>
                                                                    <div class="float-left"><input class="form-control plan_trabajo numero_horas" type="number" style="height: 60px;" max="320" min="0" name="pro_precio[]" /></div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <p style="color:black">* Seleccione el check de los campos que desea borrar</p>
                                                    <div class="btn-action float-clear">
                                                        <input class="btn btn-success" type="button" name="agregar_registros" value="Agregar Mas" onclick="AgregarMas();" />
                                                        <input class="btn" style="background-color: #D61117; color: white;" type="button" name="borrar_registros" value="Borrar Campos(*)" onclick="BorrarRegistro();" />
                                                    </div>
                                                    <div style="position: relative;">
                                                        <input class="btn btn-primary" name="guardar" value="Guardar Plan de Trabajo" onclick="agregarPlanTrabajo(<?php echo $_SESSION['id_estudiante']; ?>);" />
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </form>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        <?php } else {
                        ?>
                            <br>
                            <?php
                            if ($lista_actividades[0]['estado'] == "Rechazada") {
                            ?>
                                <div class="p-2 bg-danger">
                                    <center><strong class="text-white">Plan de Trabajo Rechazado</strong></center>
                                </div>
                                <br>
                            <?php
                            }
                            ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <center>
                                            <form name="frmProduct" method="post" action="">
                                                <div id="outer" class="table-responsive">
                                                    <div id="header">
                                                        <div class="float-left">N??</div>
                                                        <div class="float-left col-heading"> Descripci??n</div>
                                                        <div class="float-left col-heading2">N??mero de Horas</div>
                                                    </div>
                                                    <div id="productos">
                                                        <?php foreach ($lista_actividades as $actividad) { ?>
                                                            <div class="lista-producto float-clear" style="clear:both;">
                                                                <ul class="list-group">
                                                                    <li id="plan" class="list-group-item">
                                                                        <div class="float-left"><input type="checkbox" name="item_index[]" /></div>
                                                                        <div class="float-left"><textarea class="form-control plan_trabajo" name="pro_nombre[]" cols="40" rows="2"><?php echo $actividad['descripcion_actividad_plan_trabajo']; ?></textarea></div>
                                                                        <div class="float-left"><input class="form-control plan_trabajo numero_horas" type="number" max="320" min="0" style="height: 60px;" name="pro_precio[]" value="<?php echo $actividad['numero_horas_actividad_plan_trabajo']; ?>" /></div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <br>
                                                    <div class="btn-action float-clear">
                                                        <p style="color:black">* Seleccione el check de los campos que desea borrar</p>
                                                        <input class="btn btn-success" type="button" name="agregar_registros" value="Agregar Mas" onclick="AgregarMas();" />
                                                        <input class="btn btn-danger" style="background-color: #D61117; color: white;" type="button" name="borrar_registros" value="Borrar Campos(*)" onclick="BorrarRegistro();" />
                                                    </div>
                                                    <div style="position: relative;">
                                                        <input class="btn btn-primary" type="button" name="guardar" onclick="actualizarPlanTrabajo(<?php echo $_SESSION['id_estudiante'] ?>)" value="Actualizar Plan de Trabajo" />
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </form>
                                        </center>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } ?>
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
<script src="../../js/Student//alertas_estudiante.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Valida si un estudiante ya hizo un plan de trabajo -->
<?php
require_once "../../Controller/Actividades_Plan_Trabajo/Actividades_Plan_Trabajo_Controller.php";
$lista = listarActividadesPlanTrabajoPorEstudiante($_SESSION['id_estudiante']);

// Sino, valida si tiene actividades del plan de trabajo
if (!is_null($lista)) {
    $estado_plan_trabajo = $lista[0]['estado'];
?>
    <!--valida si estan aprobadas -->
    <?php if ($estado_plan_trabajo == "Aprobada") {
    ?>
        <script>
            swal.fire({
                icon: "info",
                title: "Su plan de trabajo ya est?? aprobado"
            }).then(() => {
                window.location = "index_student.php";
            })
        </script>
    <?php
    } else if ($estado_plan_trabajo == "Rechazada") {
        $observacion = $lista[0]['observacion'];
        echo
        "
        <script>
            swal.fire({
                icon: 'warning',
                title: 'Plan de Trabajo Rechazado',
                text: 'Observaciones: " . $observacion . "',
                footer: 'Por favor actualize el plan de trabajo y vuelva a enviarlo'
           })
        </script>
        ";
    }
    ?>
<?php
}
?>

</html>
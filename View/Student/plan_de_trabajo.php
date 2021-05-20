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

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGestionPracticantes" aria-expanded="true" aria-controls="collapseGestionPracticantes">
                    <i class="fas fa-users-cog"></i>
                    <span id="titulosSideBar">Mi Práctica</span>
                </a>
                <div id="collapseGestionPracticantes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opciones:</h6>
                        <a class="collapse-item" href="encuesta_inscripcion.php"> <i class="fas fa-file-alt"></i> Inscripción</a>
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
                                <span style="color: white; font-size: 20px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;" class="mr-2 d-none d-lg-inline text-white-600 small">
                                    <b><?php echo $_SESSION['nombre_estudiante'] ?></b>
                                </span>

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
                        <h2>Plan de Trabajo</h2>
                    </center>
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
                            <form name="suma" method="POST" onkeyup="sumatoria()">
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <label>Cantidad de horas por plan de trabajo acumuladas: </label>
                                            <input type="number" class="sinBorde" name="resultado" style="width: 53px;" disabled>
                                            <label>/320</label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row" id="primer_row">

                                    <div class="form-group col-md-8" id="actividad_estatica">
                                        <label for="exampleFormControlInput1">Nueva Actividad</label>
                                        <textarea class="form-control form-control-lg" id="actividad" rows="1"></textarea>
                                    </div>
                                    <div class="form-group col-md-4" id="numero_horas_estatica">
                                        <label for="exampleFormControlInput1">Número de Horas</label>
                                        <input type="number" class="form-control form-control-lg" id="numero_horas" name="numHoras" min="1" max="320">
                                    </div>
                                </div>
                                <input type="hidden" name="input_id_estudiante" id="input_id_estudiante" value="<?php echo $_SESSION['id_estudiante']; ?>">

                                <div onclick="sumatoria()">
                                    <button onclick="agregarActividadesDinamicamente()" type="button" class="btn btn-primary">Agregar Actividad</button>
                                    <button onclick="eliminarActividadesDinamicamente()" type="button" class="btn btn-primary">Eliminar Actividad</button>
                                </div>

                                <div class="text-center">
                                    <br>
                                    <input type="button" value="Guardar" class="btn btn-primary" onclick="agregarPlanDeTrabajo()">
                                </div>
                            </form>
                        <?php } else {
                        ?>
                            <div class="col text-center">
                                <button type="button" class="btn btn-primary" onclick="eliminarActividadesPlanTrabajoPorEdicion(<?php echo $_SESSION['id_estudiante']; ?>);">Realizar Nuevo Plan de Trabajo</button>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Número de Actividad</th>
                                                <th>Descripción</th>
                                                <th>Número de Horas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $cont = 1;
                                            foreach ($lista_actividades as $actividad) {
                                            ?>
                                                <tr>
                                                    <td>Actividad <?php echo $cont; ?></td>
                                                    <td><?php echo $actividad['descripcion_actividad_plan_trabajo']; ?></td>
                                                    <td><?php echo $actividad['numero_horas_actividad_plan_trabajo']; ?></td>
                                                </tr>
                                            <?php
                                                $cont++;
                                            } ?>
                                        </tbody>
                                    </table>
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
<script src="../../js/eventos.js"></script>
<script src="../../js/Student//alertas_estudiante.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    //Función que realiza la suma de las actividades del plan de trabajo
    function sumatoria() {
        var inputs_actividades = document.getElementsByClassName("form-control form-control-lg");
        var arreglo_actividades = [];
        var longitud = inputs_actividades.length;
        var cantidad_horas = 0;
        for (let index = 0; index < longitud; index++) {
            arreglo_actividades.push(inputs_actividades[index].value)
            if (index % 2 != 0) {
                cantidad_horas = cantidad_horas + parseInt(inputs_actividades[index].value);
                document.suma.resultado.value = cantidad_horas;
            }
        }
    }
</script>

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
                title: "Su plan de trabajo ya esta aprobado"
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
                footer: 'Se eliminaran las actividades previas'
           }).then(() => {
            eliminarActividadesPlanTrabajo(" . $_SESSION['id_estudiante'] . ")
        })
        </script>
        ";
    }
    ?>
<?php
}
?>

</html>
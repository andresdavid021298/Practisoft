<?php
require_once '../../Controller/Actividades_Plan_Trabajo/Actividades_Plan_Trabajo_Controller.php';
require_once '../../Controller/Actividad/Actividad_Controller.php';
$id_estudiante = $_GET['id_estudiante'];
$obj_actividad_model = listarActividadesPlanTrabajoPorEstudiante($id_estudiante);
$obj_actividad_model_encabezado = generarEncabezadoInformeDeActividades($id_estudiante);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Informe</title>
	<link rel="shortcut icon" href="../../Img/favicon_ingsistemas.ico">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

	<!-- Custom fonts for this template-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<!-- <link href="../../css/sb-admin-2.min.css" rel="stylesheet"> -->
</head>
<em>
	<h1 style="text-align: center;">Informe de Actividades del Plan de Trabajo</h1>
</em>

<body>
	<table border="1" align="center" cellspacing="0" cellpadding="5">
		<tr align="center" bgcolor="#D61117">
			<td colspan="3" style="color: white;"><b>ACTIVIDADES Y SUBACTIVIDADES <br>
					PRACTICA EMPRESARIAL</b></td>
		</tr>
		<tr>
			<td colspan="1"><b>EMPRESA: </b><?php echo $obj_actividad_model_encabezado['nombre_empresa']; ?></td>
			<td colspan="2"><b>TUTOR EMPRESARIAL: </b><?php echo $obj_actividad_model_encabezado['nombre_tutor']; ?></td>
		</tr>
		<tr>
			<td colspan="1"><b>CODIGO: </b><?php echo $obj_actividad_model_encabezado['codigo_estudiante']; ?></td>
			<td colspan="2"><b>ESTUDIANTE: </b><?php echo $obj_actividad_model_encabezado['nombre_estudiante']; ?></td>
		</tr>
		<?php
		foreach ($obj_actividad_model as $rowActividad) {
			require_once '../../Controller/Actividad/Actividad_Controller.php';
		?>
			<tr>
				<td colspan="1" style="text-align: center;"><b><?php echo $rowActividad['descripcion_actividad_plan_trabajo']; ?></b></td>
				<td colspan="1" style="text-align: center;"><b>Horas aprobadas: <?php echo sumarHorasPorActividadPlanTrabajo($rowActividad['id_actividad_plan_trabajo']); ?> / <?php echo $rowActividad['numero_horas_actividad_plan_trabajo']; ?></b></td>
				<td colspan="1" style="text-align: center;"><b>Estado</b></td>
				<?php
				$obj_subactividad_model = listarActividadesPorActividadPlanTrabajo($rowActividad['id_actividad_plan_trabajo']);
				if ($obj_subactividad_model == NULL) {
				?>
			<tr>
				<td colspan="3" style="text-align: center; color: #D61117;"><b>No tiene subactividades asociadas</b></td>
			</tr>
			<?php
				} else {
					foreach ($obj_subactividad_model as $rowSubactividad) {
			?>
				</tr>
				<tr>
					<td colspan="1" style="text-align: center;"><?php echo $rowSubactividad['descripcion_actividad']; ?></td>
					<td colspan="1" style="text-align: center;"><?php echo $rowSubactividad['horas_actividad']; ?></td>
					<td colspan="1" style="text-align: center;"><?php echo $rowSubactividad['estado_actividad']; ?></td>
		<?php
					}
				}
			}
		?>
				</tr>
	</table>
</body>

</html>
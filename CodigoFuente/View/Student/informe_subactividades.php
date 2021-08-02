<?php
require_once '../../Controller/Actividad/Actividad_Controller.php';
$id_actividad = $_GET['id_actividad'];
$obj_actividad_model = generarInformeDeSubactividades($id_actividad);
$obj_actividad_model_encabezado = generarEncabezadoInformeDeSubactividades($id_actividad);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Informe</title>
	<link rel="shortcut icon" href="../../Img/favicon_ingsistemas.ico">
</head>
<em>
	<h1 style="text-align: center;">Informe de Subactividades</h1>
</em>

<body>
	<table border="1" align="center" cellspacing="0" cellpadding="5">
		<tr align="center" bgcolor="#D61117">
			<td colspan="5" style="color: white;"><b>REGISTRO DE ACTIVIDADES SEMANALES <br>
					PRACTICA EMPRESARIAL</b></td>
		</tr>
		<?php
		if ($obj_actividad_model_encabezado == NULL) {
		?>
			<tr>
				<td colspan="5" style="text-align: center; color: #D61117;"><b>Sin Datos</b></td>
			</tr>
		<?php
		} else {
		?>
			<tr>
				<td colspan="2"><b>EMPRESA: </b><?php echo $obj_actividad_model_encabezado['nombre_empresa']; ?></td>
				<td colspan="3"><b>TUTOR EMPRESARIAL: </b><?php echo $obj_actividad_model_encabezado['nombre_tutor']; ?></td>
			</tr>
			<tr>
				<td colspan="1"><b>CODIGO: </b><?php echo $obj_actividad_model_encabezado['codigo_estudiante']; ?></td>
				<td colspan="4"><b>ESTUDIANTE: </b><?php echo $obj_actividad_model_encabezado['nombre_estudiante']; ?></td>
			</tr>
			<tr>
				<td colspan="5"><b>ACTIVIDAD MACRO:</b> <?php echo $obj_actividad_model_encabezado['descripcion_actividad_plan_trabajo']; ?></td>
			</tr>
		<?php
		}
		?>
		<tr>
			<th>
				Fecha
			</th>
			<th>
				Descripcion
			</th>
			<th>
				Horas
			</th>
			<th>
				Estado
			</th>
			<th>
				Observaciones
			</th>
		</tr>
		<?php
		if ($obj_actividad_model == NULL) {
		?>
			<tr>
				<td colspan="5" style="text-align: center; color: #D61117;"><b>No tiene subactividades asociadas</b></td>
			</tr>
			<?php
		} else {
			foreach ($obj_actividad_model as $row) {
			?>
				<tr align="center">
					<td>
						<?php echo $row['fecha_actividad']; ?>
					</td>
					<td>
						<?php echo $row['descripcion_actividad']; ?>
					</td>
					<td>
						<?php echo $row['horas_actividad']; ?>
					</td>
					<td>
						<?php echo $row['estado_actividad']; ?>
					</td>
					<td>
						<?php echo $row['observaciones_actividad']; ?>
					</td>
			<?php
			}
		}
			?>
				</tr>
	</table>
</body>

</html>
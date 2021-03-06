<?php
require_once '../../Controller/Estudiante/Estudiante_Controller.php';
require_once '../../Controller/Grupo/Grupo_Controller.php';
$obj_estudiante_model = listarEstudiantesPorGrupo($_GET['id_grupo']);
$buscarGrupo = buscarGrupo($_GET['id_grupo']);
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
	<h1 style="text-align: center;">Informe de Estudiantes</h1>
</em>

<body>
	<table border="1" align="center" cellspacing="0" cellpadding="5">
		<tr align="center" bgcolor="#D61117">
			<td colspan="6" style="color: white;"><b>ESTUDIANTES <?php $buscarGrupo['nombre_grupo'] ?><br>
					PRACTICA EMPRESARIAL</b></td>
		</tr>
		<tr>
			<th>
				Nombre
			</th>
			<th>
				Código
			</th>
			<th>
				Correo
			</th>
			<th>
				Celular
			</th>
			<th>
				Empresa
			</th>
			<th>
				Tutor
			</th>
		</tr>
		<?php
		if ($obj_estudiante_model == NULL) {
		?>
			<tr>
				<td colspan="6" style="text-align: center; color: #D61117;"><b>No hay estudiantes asociados</b></td>
			</tr>
			<?php
		} else {
			foreach ($obj_estudiante_model as $row) {
			?>
				<tr align="center">
					<td>
						<?php echo $row['nombre_estudiante']; ?>
					</td>
					<td>
						<?php echo $row['codigo_estudiante']; ?>
					</td>
					<td>
						<?php echo $row['correo_estudiante']; ?>
					</td>
					<td>
						<?php echo $row['celular_estudiante']; ?>
					</td>
					<td>
						<?php echo $row['nombre_empresa']; ?>
					</td>
					<td>
						<?php echo $row['nombre_tutor'];?>
					</td>
			<?php
			}
		}
			?>
				</tr>
	</table>
</body>

</html>
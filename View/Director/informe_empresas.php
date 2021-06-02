<?php
session_start();
if ($_SESSION['id_coordinador'] == NULL) {
    header("Location: ../../index.php");
}
require_once '../../Controller/Empresa/Empresa_Controller.php';
$obj_empresa_model = generarInformeDeEmpresas();
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
	<h1 style="text-align: center;">Informe de Empresas</h1>
</em>

<body>
	<table border="1" align="center" cellspacing="0" cellpadding="5">
		<tr align="center" bgcolor="#D61117">
			<td colspan="9" style="color: white;"><b>EMPRESAS <br>
					PRACTICA EMPRESARIAL</b></td>
		</tr>
		<tr>
			<th>
				Nombre
			</th>
			<th>
				Representante Legal
			</th>
			<th>
				NIT
			</th>
			<th>
				Dirección
			</th>
			<th>
				Municipio
			</th>
			<th>
				Correo
			</th>
			<th>
				Celular
			</th>
			<th>
				Sector
			</th>
			<th>
				Actividad
			</th>
		</tr>
		<?php
		if ($obj_empresa_model == NULL) {
		?>
			<tr>
				<td colspan="9" style="text-align: center; color: #D61117;"><b>No hay empresas asociadas</b></td>
			</tr>
			<?php
		} else {
			foreach ($obj_empresa_model as $row) {
			?>
				<tr align="center">
					<td>
						<?php echo $row['nombre_empresa']; ?>
					</td>
					<td>
						<?php echo $row['representante_legal']; ?>
					</td>
					<td>
						<?php echo $row['nit_empresa']; ?>
					</td>
					<td>
						<?php echo $row['direccion_empresa']; ?>
					</td>
					<td>
						<?php echo $row['municipio_empresa']; ?>
					</td>
					<td>
						<?php echo $row['correo_empresa']; ?>
					</td>
					<td>
						<?php echo $row['celular_empresa']; ?>
					</td>
					<td>
						<?php echo $row['sector_empresa']; ?>
					</td>
					<td>
						<?php echo $row['actividad_empresa']; ?>
					</td>
			<?php
			}
		}
			?>
				</tr>
	</table>
</body>

</html>
<?php

header("Location: informe_empresas.xlsx");

require_once '../../Controller/Empresa/Empresa_Controller.php';
$obj_empresa_model = generarInformeDeEmpresas();

require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

?>
<!DOCTYPE html>
<html>

<head>
  <title>PractiSoft</title>
  <link rel="shortcut icon" href="../../Img/favicon_ingsistemas.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
</head>

<body>
  <div class="container">
    <div class="table-responsive">
      <form>
        <table class="table table-striped table-bordered" id="table_content">
          <tr>
            <th><?php $sheet->setCellValue('A1', 'Nombre')->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true); ?></th>
            <th><?php $sheet->setCellValue('B1', 'Representante Legal')->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true); ?></th>
            <th><?php $sheet->setCellValue('C1', 'NIT')->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true); ?></th>
            <th><?php $sheet->setCellValue('D1', 'Dirección')->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true); ?></th>
            <th><?php $sheet->setCellValue('E1', 'Municipio')->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true); ?></th>
            <th><?php $sheet->setCellValue('F1', 'Correo')->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true); ?></th>
            <th><?php $sheet->setCellValue('G1', 'Celular')->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true); ?></th>
            <th><?php $sheet->setCellValue('H1', 'Sector')->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true); ?></th>
            <th><?php $sheet->setCellValue('I1', 'Actividad')->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true); ?></th>
            <th><?php $sheet->setCellValue('J1', 'Fecha de Registro')->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true); ?></th>
          </tr>
          <?php
          $cont = 2;
          $A = 'A';
          $B = 'B';
          $C = 'C';
          $D = 'D';
          $E = 'E';
          $F = 'F';
          $G = 'G';
          $H = 'H';
          $I = 'I';
          $J = 'J';
          foreach ($obj_empresa_model as $row) {
            $celdaA1 = $A . $cont;
            $celdaB1 = $B . $cont;
            $celdaC1 = $C . $cont;
            $celdaD1 = $D . $cont;
            $celdaE1 = $E . $cont;
            $celdaF1 = $F . $cont;
            $celdaG1 = $G . $cont;
            $celdaH1 = $H . $cont;
            $celdaI1 = $I . $cont;
            $celdaJ1 = $J . $cont;
          ?>
            <tr style="text-align: center;">
              <td>
                <?php
                $sheet->setCellValue($celdaA1, $row['nombre_empresa'])->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true);
                $cont++;
                ?>
              </td>
              <td>
                <?php
                $sheet->setCellValue($celdaB1, $row['representante_legal'])->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true);
                ?>
              </td>
              <td>
                <?php echo $row['nit_empresa'];
                $sheet->setCellValue($celdaC1, $row['nit_empresa'])->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true);
                ?>
              </td>
              <td>
                <?php echo $row['direccion_empresa'];
                $sheet->setCellValue($celdaD1, $row['direccion_empresa'])->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true);
                ?>
              </td>
              <td>
                <?php echo $row['municipio_empresa'];
                $sheet->setCellValue($celdaE1, $row['municipio_empresa'])->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true);
                ?>
              </td>
              <td>
                <?php echo $row['correo_empresa'];
                $sheet->setCellValue($celdaF1, $row['correo_empresa'])->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true);
                ?>
              </td>
              <td>
                <?php echo $row['celular_empresa'];
                $sheet->setCellValue($celdaG1, $row['celular_empresa'])->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true);
                ?>
              </td>
              <td>
                <?php echo $row['sector_empresa'];
                $sheet->setCellValue($celdaH1, $row['sector_empresa'])->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true);
                ?>
              </td>
              <td>
                <?php echo $row['actividad_empresa'];
                $sheet->setCellValue($celdaI1, $row['actividad_empresa'])->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true);
                ?>
              </td>
              <td>
                <?php echo date("d-m-Y", strtotime($row['fecha_registro']));
                $sheet->setCellValue($celdaJ1, date("d-m-Y", strtotime($row['fecha_registro'])))->getColumnDimension($sheet->getHighestColumn())->setAutoSize(true);
                ?>
              </td>
            </tr>
          <?php
          }
          $writer = new Xlsx($spreadsheet);
          $writer->save('informe_empresas.xlsx');
          ?>
        </table>
        <input type="hidden" name="file_content" id="file_content" />
      </form>
      <br />
      <br />
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</body>

</html>
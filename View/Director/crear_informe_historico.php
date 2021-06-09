<?php
require_once '../../Controller/Empresa/Empresa_Controller.php';
require_once '../../Controller/Solicitud/Solicitud_Controller.php';
require_once '../../Controller/Historico/Historico_Controller.php';
$fecha_inicio = $_GET['fecha_inicio'];
$fecha_fin = $_GET['fecha_fin'];
$obj_empresa_actividad = verCantidadEmpresasSegunActividadHistorico($fecha_inicio, $fecha_fin);
$obj_empresa_sector = verCantidadEmpresasSegunSectorHistorico($fecha_inicio, $fecha_fin);
$obj_solicitud = cantidadSolicitudesPorEmpresaYFecha($fecha_inicio, $fecha_fin);
$obj_historico_capacitacion = cantidadAreasCapacitacionPorEmpresaYFecha($fecha_inicio, $fecha_fin);
$obj_historico_desarrollo = cantidadAreasDesarrolloDeSoftwarePorEmpresaYFecha($fecha_inicio, $fecha_fin);
$obj_historico_mantenimiento = cantidadAreasMantenimientoPorEmpresaYFecha($fecha_inicio, $fecha_fin);
$obj_historico_servidores = cantidadAreasServidoresPorEmpresaYFecha($fecha_inicio, $fecha_fin);
$obj_historico_redes = cantidadAreasRedesPorEmpresaYFecha($fecha_inicio, $fecha_fin);
?>
<!-- Custom styles for this template-->
<link href="../../css/sb-admin-2.min.css" rel="stylesheet">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Actividad Económica de la Empresa', 'Cantidad de Empresas'],
      <?php
      foreach ($obj_empresa_actividad as $empresa) {
        echo "['" . $empresa['actividad_empresa'] . "', " . $empresa['cantidad_empresa'] .  "],";
      }
      ?>
    ]);

    var options = {
      title: 'Gráfico Circular - Cantidad de Empresas Según la Actividad Económica'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechartEmpresaActividad'));

    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Sector de la Empresa', 'Cantidad de Empresas'],
      <?php
      foreach ($obj_empresa_sector as $empresa) {
        echo "['" . $empresa['sector_empresa'] . "', " . $empresa['cantidad_empresa'] .  "],";
      }
      ?>
    ]);

    var options = {
      title: 'Diagrama de Barras - Cantidad de Empresas Según el Sector',
      vAxis: {
        format: '0'
      }
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('piechartEmpresaSector'));

    chart.draw(data, options);
  }
</script>

<script type="text/javascript">
  google.charts.load("current", {
    packages: ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Element', 'Density'],
      <?php
      foreach ($obj_solicitud as $solicitud) {
        echo "['" . $solicitud['nombre_empresa'] . "', " . $solicitud['cantidad_solicitudes'] .  "],";
      }
      ?>
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
      {
        calc: "stringify",
        sourceColumn: 1,
        type: "string",
        role: "annotation",
      }
    ]);

    var options = {
      title: "Gráfico Circular - Cantidad de Solicitudes por Empresa",
      is3D: true,
      vAxis: {
        format: '0'
      },
    };
    var chart = new google.visualization.PieChart(document.getElementById("columnchart_values"));
    chart.draw(view, options);
  }
</script>

<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      <?php
      foreach ($obj_historico_mantenimiento as $historico_mantenimiento) {
      ?>['Área', 'Cantidad'],
        ['Mantenimiento de Hardware / Software', <?php echo $historico_mantenimiento['funciones'] ?>],
      <?php }
      foreach ($obj_historico_capacitacion as $historico_capacitacion) {
      ?>['Capacitación', <?php echo $historico_capacitacion['funciones'] ?>],
      <?php }
      foreach ($obj_historico_desarrollo as $historico_desarrollo) {
      ?>['Desarrollo de Software', <?php echo $historico_desarrollo['funciones'] ?>],
      <?php }
      foreach ($obj_historico_servidores as $historico_servidores) {
      ?>['Servidores y Computación en la Nube', <?php echo $historico_servidores['funciones'] ?>],
      <?php }
      foreach ($obj_historico_redes as $historico_redes) {
      ?>['Administración de Redes', <?php echo $historico_redes['funciones'] ?>],
      <?php }
      ?>
    ]);

    var options = {
      title: 'Gráfico de Dona - Áreas Más Solicitadas por las Empresas',
      pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));

    chart.draw(data, options);
  }
</script>

<div class="container">
  <div class="row">
    <div class="col text-center">
      <br><br>
      <h1 id="h2">Informe Estadístico</h1>
      <br><br><br>
      <center>
        <div id="piechartEmpresaActividad"></div>
      </center>
      <br><br><br>
      <center>
        <div id="piechartEmpresaSector"></div>
      </center>
      <br><br><br>
      <center>
        <div id="columnchart_values"></div>
      </center>
      <br><br><br><br>
      <center>
        <div id="donutchart"></div>
      </center>
    </div>
  </div>
</div>